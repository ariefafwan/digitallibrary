<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Sistem Informasi Kepegawaian Kantor Pos</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/cover/">

    <link href="{{ asset ('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset ('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset ('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset ('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="favicon/site.webmanifest">

    <script src="https://kit.fontawesome.com/35770c1bfd.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="{{ asset ('css/cover.css') }}" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <img class="float-md-start" style="width: 10%" src="img/logo.png">
      <h3 class="float-md-start mb-0">SIMPEG Kantor Pos</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="#">Home</a>
        <a class="nav-link fw-bold py-1 px-0" href="{{ route('login') }}">Login</a>
        <a class="nav-link fw-bold py-1 px-0" href="{{ route('register') }}">Register</a>
      </nav>
    </div>
  </header>

  <main class="px-1">
    <h1>Tentang Kami</h1>
    <p class="lead mb-3">Ini Adalah Sistem Informasi Kepegawaian Kantor Pos</p>
    </p>

    <div class="row">
      <div class="mt-3 justify-content-center float-md-start">
        <img class="bd-placeholder-img rounded-circle mb-4" src="img/pos-aja.png" alt="PosAja!" width="20%" style="height: 100%; border-radius: 5px;">
        <div class="row justify-content-center float-md-end mt-2">
          <a href="https://play.google.com/store/apps/details?id=com.posindonesia.cob&amp;hl=en&amp;gl=US" target="_blank" rel="nofollow"><img src="img/play.png" style="width: 100px"></a>
          <a href="https://apps.apple.com/id/app/qposin-aja/id1545882949" target="_blank" rel="nofollow"><img src="img/app.png" style="width: 100px"></a>
        </div>
      </div>
      <div class="mt-3 justify-content-center">
        <img class="bd-placeholder-img rounded-circle mb-4" src="img/pospay.png" alt="PosAja!" width="20%" style="height: 100%; border-radius: 5px;">
        <div class="row justify-content-center float-md-end mt-2">
          <a href="https://play.google.com/store/apps/details?id=com.posindonesia.giropos&amp;hl=en&amp;gl=US" target="_blank" rel="nofollow"><img src="img/play.png" style="width: 100px"></a>
          <a href="https://apps.apple.com/id/app/pospay/id1542001621" target="_blank" rel="nofollow"><img src="img/app.png" style="width: 100px"></a>
        </div>
      </div>
    </div>
    <!-- /.row -->

  </main>

  <footer class="mt-auto text-white-50">
    <div class="copyright">
      &copy; Copyright <strong><span>2023</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>    
    <div class="social-media">
      <p>
          <a href="https://www.facebook.com/posindonesia/">
            <i class="fab fa-facebook-square"></i> 
          </a>
          <a href="https://www.instagram.com/posindonesia.ig/?hl=en">
            <i class="fab fa-instagram"></i> 
          </a>
          <a href="https://twitter.com/posindonesia">
            <i class="fab fa-twitter-square"></i> 
          </a>
          <a href="https://www.tiktok.com/@posindonesia_official?">
            <i class="fab fa-tiktok"></i> 
          </a>
          <a href="https://www.youtube.com/c/PosIndonesiajuara">
            <i class="fab fa-youtube"></i> 
          </a>
      </p>
    </div>
  </footer>
  
</div>

</body>
</html>