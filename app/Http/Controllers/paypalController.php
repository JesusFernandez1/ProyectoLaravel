<?php

namespace App\Http\Controllers;

use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\customer;
use App\Models\fee;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;


class paypalController extends Controller
{
    private $apiContext;
    // private $amount;
    // private $currency;

    public function __construct()
    {

        // $this->amount=$amount;
        // $this->currency=$currency;

        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }
    public function payWithPayPal($id)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');


        $cliente = fee::where('id', $id)->first()->customers_id;
        $moneda_cliente = customer::where('id', $cliente)->first()->moneda;
        $importe = fee::where('id', $id)->first()->importe;
        
        $converted = Currency::convert()->from('EUR')->to($moneda_cliente)->amount($importe)->round(2)->get();

        $amount = new Amount();
        $amount->setTotal($converted);
        $amount->setCurrency($moneda_cliente);

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Pago de cuota mensual');

        $callbackUrl = url('/paypal/status/' . $id);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }
    public function payPalStatus(Request $request, $id)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/paypal/failed')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            fee::where('id', $id)->update(['pagada' =>  'Si', 'fecha_pago' => date('Y-m-d\TH:i')]);
            return redirect(route('pagofinalizado'))->with(compact('status'));
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect(route('pagofinalizado'))->with(compact('status'));
    }

    public function pagoCorrecto()
    {
        return redirect()->route('clientes.index');
    }

}
