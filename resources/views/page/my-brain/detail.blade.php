<x-m-layout-v2>
    <style>
        .parent {
            margin-top: 80px;
            min-height: 300px;
            position: relative;
        }

        .parent::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("https://images.unsplash.com/photo-1626565292554-481de666d8b9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80");

            filter: grayscale(100%) opacity(.4);

        }

        .jumbotron {
            position: relative !important;
            z-index: 9;
        }

    </style>
    <div class="mb-4 bg-light rounded-3">
        <div class="mt-r img-size-responsif" style="background-image: url({{asset("img/header.jpg")}});background-attachment: fixed;">
            <div class="p-5 px-0 mb-4 rounded-3 z-99 text-white" style="z-index: 88;position: relative;">
                <div class="container mb-3 py-5 d-flex flex-column align-items-center bg-lapis">
                    <div class="h1 fw-normal text-center text-success shadow-sm">{{$post->title}} <i class="fas fa-feather"></i></div>



                    <h6 class="text-white">Lihat Post lainnya</h6>
                    <div class="d-flex gap-2 mt-2">
                        <a href="{{ route('my-brain',["category"=>"buku tahunan"]) }}" class="btn btn-primary btn-lg fs-6 shadow-sm">
                            <i class="fas fa-book-reader"></i> Buku Tahunan GenBI</a>
                        <a href="{{ route('my-brain',["category"=>"my teori"]) }}" class="btn btn-primary btn-lg fs-6 shadow-sm">My teori</a>
                    </div>
                </div>
            </div>
            <div class="s-layer"></div>

        </div>
    </div>



    <main class="container mt-4">
        <div class="row g-2">
            <div class="col-md-9 col-12 overflow-hidden">
                <div class="container">
                    <div class="d-flex justify-content-between align-content-center">
                        <h2 class="blog-post-title">{{$post->title}}</h2>
                        @if($post->approval === "accept")
                        <span class="text-success">[<i class="fas fa-check-square"></i>Disetujui]</span>
                        @else
                        <span class="text-danger">[<i class="fas fa-clock"></i> Menunggu persetujuan]</span>
                        @endif
                    </div>

                    <p class="blog-post-meta">Genbi, <span class="text-danger">{{$post->created_at}}</span> by <a href="#">{{$post->user->name}}</a></p>

                </div>
                <article class="blog-post content">
                    {!!$post->content!!}
                </article>
                <nav class="blog-pagination mt-3" aria-label="Pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                </nav>

            </div>
            <div class="col-md-3 col-sm-12 mt-n2">
                <div class="position-sticky" style="top: 5rem;">
                    <div class="p-4 mb-3 bg-light rounded">
                        @php
                        $foto = $post->user->profile->foto_profile?? "";
                        @endphp
                        <div class="h4 py-2" style="border-bottom: 2px solid black">About penulis</div>
                        <h6 class="text-info">
                            <img src="{{ asset("storage/$foto" ) }}" alt="" width="32" height="32" class="rounded-circle me-2">
                            <a style="text-decoration: none" class="h6 text-dark" href="{{ route('users-search', [$post->user->name]) }}">
                                {{$post->user->name}}
                            </a>

                        </h6>
                        {{-- <p>{{$post->user->name}}</p> --}}
                        <p class="mb-0">"{{$post->user->profile->headline??"nothing"}}"</p>

                    </div>
                </div>
            </div>
        </div>

    </main>

</x-m-layout-v2>
