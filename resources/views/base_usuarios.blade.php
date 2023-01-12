<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap" />
          </svg>
        </a>
        

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php?controller=login&action=verSeccion" class="nav-link px-2 text-white">Secciones</a></li>
          <li><a href="index.php?controller=login&action=verUsuarios" class="nav-link px-2 text-white">Ver usuarios</a></li>
          <li><a href="index.php?controller=login&action=crear" class="nav-link px-2 text-white">Añadir</a></li>
        </ul>

        <form class="col-1 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <p>Bienvenido/a: <?php session_start(); echo $_SESSION["usuario"] ?></p>
        <p>Hora log: <?php echo date('H:i:s') ?></p>
        </form>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <a href="index.php?controller=login&action=logout" class="btn btn-primary" role="button">Logout</a>
        </form>
      </div>
    </div>
  </header>

    <!-- base que esta prensente en casi todo nuestro proyecto y muestra las extensiones que hemos creado en otras vistas -->

  @yield('mostrarUsuarios')
 
  <style>
  footer {
        position: fixed;
        top: 72%;
        width: 100%;
        height: 50px;
    }
    p {
      margin: 0;
    }
</style>
<footer>
  <section style="background-color: #ada4a4">
  
    <!-- Grid column -->
    <div class="col-md-6 col-lg-7 text-center text-md-right">

      <!-- Facebook -->
      <a class="fb-ic">
        <i class="fab fa-facebook-f white-text mr-4"> </i>
      </a>
      <!-- Twitter -->
      <a class="tw-ic">
        <i class="fab fa-twitter white-text mr-4"> </i>
      </a>
      <!-- Google +-->
      <a class="gplus-ic">
        <i class="fab fa-google-plus-g white-text mr-4"> </i>
      </a>
      <!--Linkedin -->
      <a class="li-ic">
        <i class="fab fa-linkedin-in white-text mr-4"> </i>
      </a>
      <!--Instagram-->
      <a class="ins-ic">
        <i class="fab fa-instagram white-text"> </i>
      </a>

    </div>
    <!-- Grid column -->

    </div>
    <!-- Grid row-->

    </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

      <!-- Grid row -->
      <div class="row mt-3">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">Company name</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
            consectetur
            adipisicing elit.</p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Products</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">MDBootstrap</a>
          </p>
          <p>
            <a href="#!">MDWordPress</a>
          </p>
          <p>
            <a href="#!">BrandFlow</a>
          </p>
          <p>
            <a href="#!">Bootstrap Angular</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Useful links</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">Your Account</a>
          </p>
          <p>
            <a href="#!">Become an Affiliate</a>
          </p>
          <p>
            <a href="#!">Shipping Rates</a>
          </p>
          <p>
            <a href="#!">Help</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fas fa-home mr-3"></i> New York, NY 10012, US
          </p>
          <p>
            <i class="fas fa-envelope mr-3"></i> info@example.com
          </p>
          <p>
            <i class="fas fa-phone mr-3"></i> + 01 234 567 88
          </p>
          <p>
            <i class="fas fa-print mr-3"></i> + 01 234 567 89
          </p>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2022 Copyright:
      <a href="https://github.com/JesusFernandez1/2DDAW/commits/master/CursoPHP/AProyecto"> Construccion</a>
    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->
  </section>
  <!--Section: Live preview-->
  </section>
</body>

</html>