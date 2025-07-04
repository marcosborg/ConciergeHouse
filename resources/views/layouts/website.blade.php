<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Kelly Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="/website/assets/img/favicon.png" rel="icon">
    <link href="/website/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/website/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/website/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/website/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/website/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/website/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/website/assets/css/main.css" rel="stylesheet">

    @yield('styles')

</head>

<body class="index-page">

    <x-navmenu />

    <main class="main">

        @yield('content')

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">Concierge House</strong> <span>All Rights Reserved<br></span></p>
            </div>
            <div class="social-links d-flex justify-content-center">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="credits">
                Created by <a href="https://netlook.pt/">Netlook</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/website/assets/vendor/php-email-form/validate.js"></script>
    <script src="/website/assets/vendor/aos/aos.js"></script>
    <script src="/website/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="/website/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/website/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/website/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/website/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/website/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="/website/assets/js/main.js"></script>

    @yield('scripts')

</body>

</html>
