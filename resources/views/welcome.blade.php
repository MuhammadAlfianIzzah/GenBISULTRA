<x-m-layout-v2>
    <style>
        .post-slide {
            background: #fff;
            margin: 20px 15px 20px;
            border-radius: 15px;
            padding-top: 1px;
            box-shadow: 0px 14px 22px -9px #bbcbd8;
        }

        .post-slide .post-img {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            margin: -12px 15px 8px 15px;
            margin-left: -10px;
        }

        .post-slide .post-img img {
            width: 100%;
            height: auto;
            transform: scale(1, 1);
            transition: transform 0.2s linear;
        }

        .post-slide:hover .post-img img {
            transform: scale(1.1, 1.1);
        }

        .post-slide .over-layer {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            background: linear-gradient(-45deg, rgba(6, 190, 244, 0.75) 0%, rgba(45, 112, 253, 0.6) 100%);
            transition: all 0.50s linear;
        }

        .post-slide:hover .over-layer {
            opacity: 1;
            text-decoration: none;
        }

        .post-slide .over-layer i {
            position: relative;
            top: 45%;
            text-align: center;
            display: block;
            color: #fff;
            font-size: 25px;
        }

        .post-slide .post-content {
            background: #fff;
            padding: 2px 20px 40px;
            border-radius: 15px;
        }

        .post-slide .post-title a {
            font-size: 15px;
            font-weight: bold;
            color: #333;
            display: inline-block;
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
        }

        .post-slide .post-title a:hover {
            text-decoration: none;
            color: #3498db;
        }

        .post-slide .post-description {
            line-height: 24px;
            color: #808080;
            margin-bottom: 25px;
        }

        .post-slide .post-date {
            color: #a9a9a9;
            font-size: 14px;
        }

        .post-slide .post-date i {
            font-size: 20px;
            margin-right: 8px;
            color: #CFDACE;
        }

        .post-slide .read-more {
            padding: 7px 20px;
            float: right;
            font-size: 12px;
            background: #2196F3;
            color: #ffffff;
            box-shadow: 0px 10px 20px -10px #1376c5;
            border-radius: 25px;
            text-transform: uppercase;
        }

        .post-slide .read-more:hover {
            background: #3498db;
            text-decoration: none;
            color: #fff;
        }

        .owl-controls .owl-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .owl-controls .owl-buttons .owl-prev {
            background: #fff;
            position: absolute;
            top: -13%;
            left: 15px;
            padding: 0 18px 0 15px;
            border-radius: 50px;
            box-shadow: 3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }

        .owl-controls .owl-buttons .owl-next {
            background: #fff;
            position: absolute;
            top: -13%;
            right: 15px;
            padding: 0 15px 0 18px;
            border-radius: 50px;
            box-shadow: -3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }

        .owl-controls .owl-buttons .owl-prev:after,
        .owl-controls .owl-buttons .owl-next:after {
            content: "\f104";
            font-family: FontAwesome;
            color: #333;
            font-size: 30px;
        }

        .owl-controls .owl-buttons .owl-next:after {
            content: "\f105";
        }

        @media only screen and (max-width:1280px) {
            .post-slide .post-content {
                padding: 0px 15px 25px 15px;
            }
        }

    </style>
    <!-- heroes -->
    <div class="container-fluid heroes-parent" style="background-image: url({{asset("img/welcome/sikola-dilao.png")}}">


        <div class="container heroes">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>Selamat Datang <br> di Website <br> GenBI SulTra</h1>
                </div>
                <div class="d-none d-md-block col-md-6">
                </div>
            </div>
        </div>
    </div>
    <!-- devisi -->
    <div class="container-fluid devisi">
        <h2 class="text-center">Devisi <br> GenBI SulTra</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="devisi-seeder" class="owl-carousel">
                        @foreach ($devisi as $dv)
                        <div class="post-slide">
                            <div class="card-header">
                                <img style="max-height: 200px;object-fit: contain" src="{{ asset('img/welcome/devisi.png') }}" alt="">
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <div>Departement <br>{{$dv->nama}}</div>
                                </h3>
                                <p class="post-description">{{$dv->deskripsi}}</p>
                                <a href="{{ route('show-kegiatan', ['devisi'=>$dv->id]) }}" class="read-more">See All Activity</a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="container">
            <div class="owl-carousel devisi-carousel owl-theme">
                @foreach ($devisi as $dv)
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <div class="logo-devisi">
                                <img src="{{ asset('img/welcome/devisi.png') }}" alt="">
    </div>
    <h5 class="card-title">Devisi <br>{{$dv->nama}}</h5>
    <p class="card-text">{{$dv->deskripsi}}</p>
    <a class="btn btn-primary" href="{{ route('show-kegiatan', ['devisi'=>$dv->id]) }}">See All activity</a>

    </div>
    </div>
    </div>
    @endforeach

    </div>
    </div> --}}
    </div>
    <!-- testimoni -->
    <div class="container testimoni">
        <div class="row row-testimoni align-items-center">
            <div class="col">
                <h2 class="text-left">Testimoni <br>Setelah Gabung di GenBI?</h2>
            </div>
            <div class="col-12 col-md-7">
                <div class="testimoni-anggota">
                    <div class="owl-carousel testimoni-carousel owl-theme">
                        <div class="item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="img-profile-container">
                                        <img src="{{ asset('img/welcome/img-profile.png') }}" alt="">


                                    </div>
                                    <h5 class="card-title text-center mt-3">Lorem</h5>
                                    <p class="card-text text-center mt-3">"Some quick example text to build on the card title Some quick example text to build on the card title Some quick example text to build on the card title"</p>
                                    <div class="row">
                                        <i class="fa fa-quote-right text-center"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="img-profile-container">
                                        <img src="{{ asset('img/welcome/img-profile.png') }}" alt="">


                                    </div>
                                    <h5 class="card-title text-center mt-3">Ipsum</h5>
                                    <p class="card-text text-center mt-3">"Some quick example text to build on the card title Some quick example text to build on the card title Some quick example text to build on the card title"</p>
                                    <div class="row">
                                        <i class="fa fa-quote-right text-center"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="img-profile-container">
                                        <img src="{{ asset('img/welcome/img-profile.png') }}" alt="">


                                    </div>
                                    <h5 class="card-title text-center mt-3">Dolor</h5>
                                    <p class="card-text text-center mt-3">"Some quick example text to build on the card title Some quick example text to build on the card title Some quick example text to build on the card title"</p>
                                    <div class="row">
                                        <i class="fa fa-quote-right text-center"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog -->
    <div class="container-fluid blog">
        <div class="title">
            <h2 class="text-center">Blog <br> GenBI SulTra</h2>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="news-slider" class="owl-carousel">
                        @foreach ($posts as $post )


                        <div class="post-slide">
                            <div class="post-img">
                                <img style="max-height: 200px;object-fit: cover" src="{{ asset("storage/$post->thumbnail") }}" alt="">
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet.</a>
                                </h3>
                                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                                <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                <a href="{{ route('detail-brain', [$post->title]) }}" class="read-more">read more</a>

                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- tagar -->
    <div class="container-fluid tagar" style="background-image: url({{asset("img/welcome/sikola-dilao.png")}})">
        <div class="container">
            <h2>#ENERGIUNTUKNEGERI <br> #SOSOITO</h2>
        </div>
    </div>


</x-m-layout-v2>
