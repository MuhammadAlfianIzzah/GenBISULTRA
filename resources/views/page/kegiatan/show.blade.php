<x-m-layout-v2>
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

        .jumbotron {
            position: relative;
        }

        .bg-jumbotron {
            filter: blur(2px);
            position: absolute;
            filter: opacity(.2);
            background-size: cover;
            height: 100%;
            top: 0;
            left: 0;
            width: 100%;
            z-index: -1;
        }

        .bg-jumbotron::after {
            content: "";
            filter: opacity(.2);
            position: absolute;
            height: 100%;
            background-color: #212d3b;

            top: 0;
            left: 0;
            width: 100%;

        }

    </style>


    <main style="margin-top: 40px">
        {{-- {{dd($posts[0]->hero)}} --}}
        <div class="mt-r img-size-responsif">

            <div class="p-5 px-0 mb-4 rounded-3 z-99 text-white" style="z-index: 88;position: relative;">
                <div class="container py-5 d-flex flex-column align-items-center bg-lapis">
                    <h1 class="display-5 fw-bold">Kegiatan GenBI</h1>
                    <p class="col-md-8 text-center">Yuk lihat lihat apa apa saja kegiatan GenBI yang telah dilakukan, anda juga dapat menfilter kegiatan berdasarkan departemen GenBI</p>
                    {{-- <h4 class="text-dark">Filter Post</h4> --}}
                    <div class="d-flex gap-2 mt-2">

                        @foreach ($devisi as $dv)
                        <a href="{{ route('show-kegiatan', ["devisi"=>$dv->id]) }}" class="btn btn-primary {{Request::get("category") == $dv->id? "active":""}}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$dv->nama}}">
                            @switch($dv->nama)
                            @case("Kesehatan")
                            <i class="fas fa-heartbeat"></i>
                            @break
                            @case("Kominfo")
                            <i class="fas fa-user-secret"></i>
                            @break
                            @case("Lingkungan Hidup")
                            <i class="fas fa-tree"></i>
                            @break
                            @case("Pendidikan")
                            <i class="fas fa-book-reader"></i>
                            @break
                            @case("Kewirausahaan")
                            <i class="fas fa-hand-holding-usd"></i>
                            @break
                            @default
                            <i class="fas fa-smile-wink"></i>
                            @endswitch
                        </a>

                        @endforeach

                    </div>

                </div>
            </div>

            <div class="s-layer"></div>

        </div>

        <div class="album py-4 bg-light">
            <div class="container">
                <form class="input-group" method="GET">
                    <input type="text" class="form-control shadow-sm" placeholder="Search for..." name="search">
                    <select name="category" class="shadow-sm border border-primary small px-3" style="outline: none">
                        <option selected disabled>Kategory: </option>
                        @foreach ($kategory as $kt)
                        <option value="{{$kt->id}}">{{$kt->nama}}</option>
                        @endforeach
                    </select>
                    <select name="devisi" class="shadow-sm border border-primary small px-3" style="outline: none">
                        <option selected disabled>Departemen: </option>
                        @foreach ($devisi as $dv)
                        <option value="{{$dv->id}}">{{$dv->nama}}</option>
                        @endforeach
                    </select>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search fa-fw"></i> Search</button>
                    </span>
                </form>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @forelse ($posts as $post)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="hightlight">{{$post->devisi->nama}} ~ {{$post->typeActivity->nama}}</div>


                            <figure class="figure">
                                <img style="max-height: 200px;width: 100%; object-fit: cover" src="{{ asset("storage/$post->thumbnail") }}" class="figure-img img-fluid rounded" alt="...">

                                <figcaption class="figure-caption text-end">{{$post->slug}}</figcaption>
                            </figure>

                            <div class="card-body">
                                <?php 
                        $filter =preg_replace("/<img[^>]+>/", "", $post->body);
                            $filterh1= strip_tags($filter);
                         ?>
                                <h4>{{$post->nama}}</h4>
                                <p class="card-text">{!! Str::limit($filterh1,200,'...')!!}</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('detail-kegiatan',["$post->slug"]) }}" type="button" class="btn btn-sm btn-outline-secondary">Continue reading</a>
                                    </div>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>

                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-warning w-100 d-flex align-items-center justify-content-center shadown mt-4" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <div>
                            Posts kosong
                        </div>
                    </div>

                    @endforelse


                </div>
            </div>
        </div>

    </main>
    @push('script')

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            this.addEventListener('hide.bs.tooltip', function() {
                new bootstrap.Tooltip(tooltipTriggerEl)
            })
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

    </script>
    @endpush

</x-m-layout-v2>
