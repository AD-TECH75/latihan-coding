<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} &bullet; Makna-Consulting</title>
    <link rel="shortcut icon" href="{{ asset('images/logo/maknaLogo.png')}}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <!-- nav -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-opacity-75">
            <!-- ./content-fluid -->
            <div class="container-fluid">
                <!-- ./navbar brand / logo -->
                <a class="navbar-brand ms-2" href="/">
                    <img src="{{ asset('images/logo/maknaLogo.png')}}" alt="Logo" height="30"
                        class="d-inline-block align-text-top">
                    makna consulting
                </a>
                <!-- ./navbar brand / logo -->
                <!-- ./humberger button for mobile device -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- ./humberger button for mobile device -->
                <!-- ./content -->
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active text-capitalize animated-link mx-1" href="/">home</a>
                        <a class="nav-link active text-capitalize animated-link mx-1" href="/reference">reference</a>
                        <a class="nav-link active text-capitalize animated-link mx-1" href="/reference">testimonial</a>
                        <a class="nav-link active text-capitalize animated-link mx-1" href="/about">about us</a>
                        <a class="nav-link active text-capitalize animated-link mx-1" href="/contact">contact</a>
                        <div>
                            <a class="btn btn-warning text-capitalize d-none d-md-none d-lg-block" href="#">
                                konsultasi gratis
                            </a>
                            <a class="nav-link active text-capitalize d-md-block d-lg-none" href="#">
                                konsultasi gratis
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ./content -->
            </div>
            <!-- ./content-fluid -->
        </nav>
        <!-- nav -->
    </header>

    <!-- main -->
    <main>
        {{ $slot }}
    </main>
    <!-- main -->

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="https://www.google.com/search?q=makna+consulting&ie=UTF-8" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <div class="d-lg-flex">
                            <img src="{{ asset('images/logo/maknaLogo.png') }}" alt="logo" height="30px"
                                class="mb-sm-2">
                            <h6 class="text-uppercase fw-bold mb-4 justify-content-center">makna consulting</h6>
                        </div>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">social media</h6>
                        <p><i class="fa fa-envelope me-2"></i><a href="mailto:makna.team@gmail.com"
                                class="text-reset text-capitalize">gmail</a></p>
                        <p><i class="fa-brands fa-tiktok me-2"></i><a href="#!"
                                class="text-reset text-capitalize">TikTok</a></p>
                        <p><i class="fa-brands fa-instagram me-2"></i><a href="#!"
                                class="text-reset text-capitalize">instagram</a></p>
                        <p><i class="fa-brands fa-facebook me-2"></i><a href="#!"
                                class="text-reset text-capitalize">facebook</a></p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Page</h6>
                        <p><a href="/reference" class="text-reset text-capitalize">reference</a></p>
                        <p><a href="/testimonial" class="text-reset text-capitalize">testimonial</a></p>
                        <p><a href="/about" class="text-reset text-capitalize">about</a></p>
                        <p><a href="/contact" class="text-reset text-capitalize">contact</a></p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fa-solid fa-building me-3"></i> Karah Agung X/4 Surabaya</p>
                        <p><i class="fas fa-envelope me-3"></i>makna.team@gmail.com</p>
                        <p><i class="fas fa-phone me-3"></i>+62 813 3175 5314</p>
                        <p><i class="fa-solid fa-earth-asia me-3"></i>Jawa Timur, Indonesia</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="#">ManusiaCoding.code</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>

</html>