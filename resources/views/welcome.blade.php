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
    @push('script')
        <script>
            $('.post-carousel').owlCarousel({
                // items: 2,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        margin: 20,
                        loop: false
                    }
                }
            });
        </script>
    @endpush
    <!-- heroes -->
    <div class="container-fluid heroes-parent"
        style="background-attachment: fixed;background-image: url({{ asset('img/welcome/sikola-dilao.jpg') }}">


        <div class="container heroes">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1 class="text-white" style="transform: scale(.8)">Selamat Datang <br> di Website <br> GenBI
                        SulTra</h1>
                </div>
                {{-- <div class=" d-md-block col-md-6">
                    <div class="h-100 p-2 text-dark rounded-3" style="background: rgba( 255, 255, 255, 0.65 );
                    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
                    backdrop-filter: blur( 4px );
                    -webkit-backdrop-filter: blur( 4px );
                    border-radius: 10px;
                    border: 1px solid rgba( 255, 255, 255, 0.18 );">
                        <div class="p-5" style="border: 2px dashed red">
                            <div class="h2">
                                <i class="fas fa-virus"></i> Data Covid 19 SULTRA
                            </div>
                            <p class="text-muted">Update terakhir (
                                {{ \Carbon\Carbon::parse($dataCovid->last_date)->diffForHumans() }})

                            </p>
                            <hr>
                            @foreach ($dataCovid->list_data as $data)

                                @if ($data->key === 'SULAWESI TENGGARA')

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="h6 text-dark">Total Kasus</div>
                                            {{ $data->jumlah_kasus }} <i class="fas fa-restroom  text-muted"></i>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 text-danger"><i class="far fa-dizzy"></i> Meninggal </div>
                                            {{ $data->jumlah_meninggal }} <i class="fas fa-restroom  text-muted"></i>
                                        </div>
                                        <div class="col-4 ">
                                            <div class="h6 text-primary"><i class="fas fa-heart"></i> Sembuh</div>
                                            {{ $data->jumlah_sembuh }} <i class="fas fa-restroom  text-muted"></i>
                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div> --}}
                <div class="d-md-block col-md-6" style="z-index: 888" style="background: rgba(255, 6, 6, 1);
                box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
                backdrop-filter: blur( 9.5px );
                -webkit-backdrop-filter: blur( 9.5px );
                border-radius: 10px;
                border: 1px solid rgba( 255, 255, 255, 0.18 );">
                    <div class="card" style="background: rgba( 255, 255, 255, .6 );
                    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
                    backdrop-filter: blur( 4px );
                    -webkit-backdrop-filter: blur( 4px );
                    border-radius: 10px;
                    border: 1px solid rgba( 255, 255, 255, 0.18 );">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong class="text-danger">NEW!</strong> Aplikasi buatan GenBI
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <img src="{{ asset('img/APP.png') }}" class="card-img-top" alt="appgenbisultra"
                            style="transform: scale(.8)">
                        <div class="card-body text-center">
                            <a href="{{ route('aplikasi') }}" class="w-100 btn btn-light text-bold">Go to App</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- departement -->
    {{-- <div class="container-fluid devisi">
        <h2 class="text-center">Departement <br> GenBI SulTra</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="devisi-seeder" class="owl-carousel">
                        @foreach ($devisi as $dv)
                            <div class="post-slide">
                                <div class="card-header">
                                    <img style="max-height: 200px;object-fit: contain"
                                        src="{{ asset('img/welcome/devisi.png') }}" alt="">
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <div>Departement <br>{{ $dv->nama }}</div>
                                    </h3>
                                    <p class="post-description">{{ $dv->deskripsi }}</p>
                                    <a href="{{ route('show-kegiatan', ['devisi' => $dv->id]) }}"
                                        class="read-more">See All Activity</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid devisi">
        <h2 class="text-center">
            <a class="nav-link link-light" href="{{ route('show-kegiatan') }}">Kegiatan Kami</a>
        </h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="devisi-seeder" class="post-carousel owl-carousel">
                        @foreach ($kegiatan as $kg)
                            <div class="card">
                                <?php
                                $filter = preg_replace('/<img[^>]+>/', '', $kg->body);
                                $filterh1 = strip_tags($filter);
                                ?>
                                <img style="max-height: 300px;object-fit: cover"
                                    src="{{ asset("storage/$kg->thumbnail") }}" class="card-img-top"
                                    alt="{{ $kg->slug }}">
                                <div class="card-body">
                                    <h3 class="text-muted">{{ $kg->nama }}</h3>
                                    <p class="card-text">{!! Str::limit($filterh1, 70, '...') !!}</p>
                                    <a href="{{ route('detail-kegiatan', $kg->slug) }}"
                                        class="btn btn-outline-dark">Baca
                                        selengkapnya</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /departement --}}

    <!-- blog -->
    <div class="container-fluid blog">
        <div class="title">
            <h2 class="text-center">Blog <br> GenBI SulTra</h2>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="news-slider" class="owl-carousel post-carousel">
                        @foreach ($posts as $post)
                            <div class="post-slide">
                                <div class="post-img">
                                    <img style="max-height: 200px;object-fit: cover"
                                        src="{{ asset("storage/$post->thumbnail") }}" alt="">
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="{{ route('detail-brain', [$post->slug]) }}">{{ $post->title }}</a>

                                    </h3>
                                    <?php
                                    $filter = preg_replace('/<img[^>]+>/', '', $post->content);
                                    $filterh1 = strip_tags($filter);
                                    ?>

                                    <p class="post-description">{!! Str::limit($filterh1, 180, '...') !!}</p>

                                    <span class="post-date"><i
                                            class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</span>

                                    <a href="{{ route('detail-posts', [$post->slug]) }}" class="read-more">Baca
                                        selengkapnya</a>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>


    </div>
    {{-- /blog --}}
    <!-- testimoni -->
    <div class="container testimoni">
        <div class="row row-testimoni align-items-center">
            <div class="col">
                <h2 class="text-left">Apa kata mereka <br>tentang GenBI?</h2>
            </div>
            <div class="col-12 col-md-7">
                <div class="testimoni-anggota">
                    <div class="owl-carousel testimoni-carousel owl-theme">
                        <div class="item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="img-profile-container">
                                        <img src="{{ asset('img/alfianizzah.png') }}" alt="alfianizzah">


                                    </div>
                                    <h5 class="card-title text-center mt-3">Alfianizzah</h5>
                                    <h6 class="text-center">The Consultant</h6>
                                    <p class="card-text text-center mt-3">"GenBI? A place to start something amazing
                                        "
                                    </p>
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
                                    <h5 class="card-title text-center mt-3">Yessy Yuniarti</h5>
                                    <h6 class="text-center">The Initiator</h6>
                                    <p class="card-text text-center mt-3">"Some quick example text to build on the card
                                        title Some quick example text to build on the card title Some quick example text
                                        to build on the card title"</p>
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
                                        <img src="{{ asset('img/mirad.png') }}" alt="mirad">


                                    </div>
                                    <h5 class="card-title text-center mt-3">Muh. Risky MR </h5>
                                    <h6 class="text-center">Wise Leader</h6>
                                    <p class="card-text text-center mt-3">"GenBI merupakan wadah bagi saya dalam
                                        mengembangkan potensi diri, Saya sangat bersyukur dapat menjadi bagian di
                                        dalamnya. Banyak hal baik dan hebat dalam dalam diri saya berawal dan ditemukan
                                        di sini."</p>
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
    {{-- /testimoni --}}
    <!-- tagar -->
    <div class="container-fluid tagar"
        style="background-attachment: fixed;background-image: url({{ asset('img/welcome/sikola-dilao.jpg') }})">
        <div class="container">
            <h2>#ENERGIUNTUKNEGERI <br> #SOSOITO</h2>
        </div>
    </div>


</x-m-layout-v2>
