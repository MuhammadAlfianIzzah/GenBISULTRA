<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6167588362026240"
        crossorigin="anonymous"></script>
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="description" content="GenBI SULTRA">
    <meta name="keywords" content="GenBI SULTRA, genbi sulawesi tenggara, GenBI"> --}}
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <meta name="author" content="alfianizzah, fahrul">
    <link rel="shortcut icon" href="{{ asset('img/genbisultra.ico') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenBI Sultra</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/owlcarousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owlcarousel/owl.theme.default.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    @stack("style")
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- <script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
    </script> --}}
</head>

<body>
    <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-6167588362026240" data-ad-slot="5578121626"
        data-auto-format="rspv" data-full-width="">
        <div overflow=""></div>
    </amp-ad>
    @include('components.main.narbar-v2')
    <div style="margin-top: 100px">
        {{ $slot }}
    </div>

    <footer class="text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a target="_blank" class="btn btn-outline-light btn-floating m-1"
                    href="https://web.facebook.com/genbi.sultra" role="button"><i class="fab fa-facebook-f"></i></a>


                <!-- Twitter -->
                <a target="_blank" class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/genbisultra"
                    role="button"><i class="fab fa-twitter"></i></a>

                {{-- <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-google"></i></a> --}}

                <!-- Instagram -->
                <a target="_blank" class="btn btn-outline-light btn-floating m-1"
                    href="https://www.instagram.com/genbisultra/?hl=id" role="button"><i class="fab fa-instagram"></i>
                </a>
                <a target="_blank" class="btn btn-outline-light btn-floating m-1"
                    href="https://www.youtube.com/channel/UCaRR_wos33dQCJsWhwAuxgg" role="button"><i
                        class="fab fa-youtube"></i></a>
                {{-- <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a> --}}

                <!-- Github -->
                <a target="_blank" class="btn btn-outline-light btn-floating m-1"
                    href="https://github.com/MuhammadAlfianIzzah" role="button"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
        <hr>

        <div class="container">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-md-0">
                    <h3 class="text-uppercase">Tentang Kami</h3>
                    <p>
                        <i class="fa fa-map-marker"></i>
                        Alamat: Jl. Haluoleo, Mokoau, Kec. Kambu, Kota Kendari, Sulawesi Tenggara 93231
                    </p>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-md-0">
                    <h3 class="text-uppercase">Kontak</h3>
                    <p>
                        <i class="fa fa-envelope"></i>
                        genbi.sultra@gmail.com
                    </p>
                    <p class="badge bg-primary">

                        <i class="fas fa-user-secret"></i>
                        Author Website
                    </p>

                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-md-0">
                    <h3 class="text-uppercase">Support Kami</h3>
                    <p class="badge bg-success">
                        <i class="fas fa-hands-helping"></i>
                        Saweria
                    </p>

                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->


        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            ?? 2021 GenBI SulTra. All rights reserved.
        </div>
        <!-- Copyright -->
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/jquery.js') }}"></script>


    <script src="{{ asset('js/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('js/animation.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

    @stack("script")

</body>

</html>
