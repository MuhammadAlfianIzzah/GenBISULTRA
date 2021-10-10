<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="GenBI SULTRA">
    <meta name="keywords" content="GenBI SULTRA, genbi sulawesi tenggara, GenBI">

    <meta name="author" content="alfianizzah, fahrul">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenBI Sultra</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('css/owlcarousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owlcarousel/owl.theme.default.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body>
    @include('components.main.narbar-v2')
    {{$slot}}
    <footer>
        <div class="container">
            <div class="row pt-5 pb-5">
                <div class="col-12 col-md-4">
                    <h3>Tentang Kami</h3>

                    <p><i class="fa fa-map-marker"></i> Jl. Perintis Kemerdekaan No.KM.10, Tamalanrea Indah, Kec. Tamalanrea, Kota Makassar, Sulawesi Selatan 90245</p>
                    <p><i class="fa fa-envelope"></i> genbi.sultra@gmail.com</p>
                    <div class="sosmed">
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></i></a>
                        <a href="#"><i class="fa fa-spotify"></i></a>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <h3>Kontak</h3>
                    <a class="text-light btn btn-dark mb-2" href="{{ route('author'  ) }}" style="text-decoration: none">Author/Pembuat Website</a>
                    <a class="text-light btn btn-dark" href="{{ route('author'  ) }}" style="text-decoration: none">Open Donasi/saweria</a>
                </div>

                {{-- <div class="col-12 col-md-4">
                    <h3>Hubungi Kami</h3>

                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama" aria-label="Nama">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control me-3" placeholder="Email" aria-label="Email">
                            <input type="text" class="form-control" placeholder="Telepon" aria-label="Telepon">
                        </div>
                        <div class="input-group mb-3">
                            <textarea class="form-control" placeholder="Pesan" aria-label="With textarea"></textarea>
                        </div>

                        <div class="btn btn-sm btn-send">Kirim Pesan</div>
                    </form>
                </div> --}}
            </div>

            <hr />

            <p class="copyrigth">© 2021 GenBI SulTra. All rights reserved.</p>
        </div>
    </footer>
    <script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>


    <script src="{{ asset('js/jquery.js') }}"></script>


    <script src="{{ asset('js/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('js/animation.js') }}"></script>
    @stack("script")

</body>
</html>
