<x-m-layout-v2>

    <style>
        .card-brain {
            transition: all 900ms ease-out;
        }

        .card-brain:hover,
        .card-brain:focus {
            box-shadow: 0 0 4px #1f4287 !important;

            transform: translateX(5px);
        }

    </style>

    <div class="mb-4 bg-light rounded-3">
        <div class="mt-r img-size-responsif"
            style="background-image: url({{ asset('img/header.jpg') }});background-attachment: fixed;">
            <div class="p-5 px-0 mb-4 rounded-3 z-99 text-white" style="z-index: 88;position: relative;">
                <div class="container py-5 d-flex flex-column align-items-center bg-lapis">
                    <h1 class="display-5 fw-normal"><i class="fas fa-brain"></i> My brain </h1>
                    <p class="col-md-8 mt-2 fs-6 text-center">My Brain adalah halaman yang berisikan artikel mengenai
                        karyaku GenBI dan berikan Teori seputar kritik atau penelitian</p>
                    {{-- <h4 class="text-white">Kategory :</h4> --}}
                    <div class="d-flex gap-2 mt-2">
                        <a href="{{ route('my-brain', ['category' => 'karyaku']) }}"
                            class="btn btn-primary btn-lg fs-6 shadow-sm">
                            <i class="fas fa-book-reader"></i> Karyaku</a>
                        <a href="{{ route('my-brain', ['category' => 'my teori']) }}"
                            class="btn btn-primary btn-lg fs-6 shadow-sm">My teori</a>
                    </div>
                </div>
            </div>
            <div class="s-layer"></div>

        </div>
    </div>


    <div class="container">
        <div class="mb-2">
            <form class="input-group" method="GET">
                <input type="text" class="form-control shadow-sm" placeholder="Search for..." name="search">
                <select name="category" class="shadow-sm border border-primary small px-3" style="outline: none">
                    <option selected disabled>Kategory: </option>
                    <option value="karyaku">karyaku</option>
                    <option value="my teori">My teori</option>
                </select>

                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search fa-fw"></i> Search</button>
                </span>


            </form>
        </div>


        <div class="row row-cols-1 row-cols-md-3 g-4">

            @forelse ($posts as $post)

                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative card-brain">
                        <div
                            class="col p-4 d-flex flex-column position-static align-content-center justify-content-center gap-1">
                            <strong class="d-inline-block mb-2 text-primary">🌶️{{ $post->category }}</strong>
                            <h3 class="mb-0">{{ $post->title }}</h3>
                            <div class="mb-1 text-muted">
                                {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</div>

                            <?php
                            $filter = preg_replace('/<img[^>]+>/', '', $post->content);
                            $filterh1 = strip_tags($filter);
                            ?>

                            <p class="card-text mb-auto">{!! Str::limit($filterh1, 200, '...') !!}</p>

                            <a href="/my-brain/{{ $post->slug }}" class="stretched-link">Continue reading</a>

                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" style="height: 250px;object-fit: contain;width: 200px"
                                src="{{ asset("storage/$post->thumbnail") }}" alt="{{ $post->title }}">
                        </div>
                    </div>
                </div>

            @empty
                <div class="w-100  justify-content-center alert alert-warning d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        Post Kosong
                    </div>
                </div>


            @endforelse

        </div>

    </div>

    </x-main-layout>
