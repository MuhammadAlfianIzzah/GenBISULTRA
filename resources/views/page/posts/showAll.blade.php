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


    <main class="mt-5">

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Album example</h1>
                    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                    <p>
                        <a href="#" class="btn btn-primary my-2">Main call to action</a>
                        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @forelse ($posts as $post)
                    <div class="col">
                        <div class="card shadow-sm">
                            {{-- <figure class="figure bd-placeholder-img card-img-top" style="width: 100%;height: 255px">
                                <img src="{{ asset("storage/$post->thumbnail") }}" class="border figure-img img-fluid rounded" alt="...">
                            </figure> --}}
                            <figure class="figure">
                                <img src="{{ asset("storage/$post->thumbnail") }}" class="figure-img img-fluid rounded" alt="...">

                                <figcaption class="figure-caption text-end">{{$post->slug}}</figcaption>
                            </figure>

                            <div class="card-body">
                                <?php 
                        $filter =preg_replace("/<img[^>]+>/", "", $post->content);
                            $filterh1= strip_tags($filter);
                         ?>

                                <p class="card-text">{!! Str::limit($filterh1,200,'...')!!}</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('detail-posts',["$post->slug"]) }}" type="button" class="btn btn-sm btn-outline-secondary">Continue reading</a>

                                    </div>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>

                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    post kosong
                    @endforelse


                </div>
            </div>
        </div>

    </main>

</x-m-layout-v2>
