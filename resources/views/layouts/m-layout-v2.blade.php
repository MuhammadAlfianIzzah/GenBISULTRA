<!DOCTYPE html>
<html lang="en">

<head>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('css/owlcarousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owlcarousel/owl.theme.default.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
    </script>
</head>

<body>
    <amp-auto-ads type="adsense" data-ad-client="ca-pub-6167588362026240">
    </amp-auto-ads>
    @include('components.main.narbar-v2')
    {{ $slot }}
    {{-- <footer>

        <div class="row">
            <h3 class="text-center py-4 px-2">Tentang Kami</h3>

            <div class="col-12 col-md-4 border">
                <p class="py-2">
                    <i class="fa fa-map-marker"></i>
                    Alamat: Jl. Haluoleo, Mokoau, Kec. Kambu, Kota Kendari, Sulawesi Tenggara 93231
                </p>
                <p>
                    <i class="fa fa-envelope"></i>
                    genbi.sultra@gmail.com
                </p>
            </div>
            <div class="col-md-4">
                <div class="sosmed">
                    <a href="#" style="width: 200px !important;height: 200px !important;background-color: red;border-radius: 50%">a</a>
                    <a href="#"><i class="fab fa-spotify"></i></a>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <h3 class="py-2">Kontak</h3>
                <a class="text-light btn btn-dark mb-2" href="{{ route('author'  ) }}" style="text-decoration: none">Author/Pembuat Website</a>
    <a class="text-light btn btn-dark" href="{{ route('author'  ) }}" style="text-decoration: none">Open Donasi/saweria</a>
    </div>
    </div>

    <p class="copyrigth">© 2021 GenBI SulTra. All rights reserved.</p>

    </footer> --}}
    <footer class="text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-facebook-f"></i></a>


                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-github"></i></a>
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
            © 2021 GenBI SulTra. All rights reserved.
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/jquery.js') }}"></script>


    <script src="{{ asset('js/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('js/animation.js') }}"></script>
    {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7825104123996480"
        crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
    @stack("script")

</body>

</html>
