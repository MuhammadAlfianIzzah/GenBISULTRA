<x-m-layout-v2>
    <!-- heroes -->
    <div class="container-fluid heroes-parent" style="background-image: url({{asset("img/welcome/sikola-dilao.jpg")}}">


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

        <div class="container">
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
        </div>
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

        <div class="container">
            <div class="owl-carousel blog-carousel owl-theme">
                @foreach ($posts as $post)
                <div class="item">
                    <div class="card h-100" style="overflow: hidden">
                        <div class="card-header bg-white" style="border-top: 2px dashed salmon">
                            <img style="max-height: 200px;object-fit: contain" src="{{ asset("storage/$post->thumbnail") }}" class="card-img-top" alt="...">

                        </div>
                        <div class="card-body" style="min-height: 200px">
                            <?php 
                        $filter =preg_replace("/<img[^>]+>/", "", $post->content);
                            $filterh1= strip_tags($filter);
                         ?>
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text ">{!! Str::limit($filterh1,200,'...')!!}</p>
                            <a style="text-align: right" href="{{ route('detail-brain', [$post->slug]) }}">Readmore</a>


                        </div>

                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- tagar -->
    <div class="container-fluid tagar" style="background-image: url({{asset("img/welcome/sikola-dilao.jpg")}})">
        <div class="container">
            <h2>#ENERGIUNTUKNEGERI <br> #SOSOITO</h2>
        </div>
    </div>


</x-m-layout-v2>
