<x-m-layout-v2>

    <div class="mt-r img-size-responsif">

        <div class="p-5 px-0 mb-4 rounded-3 z-99 text-white" style="z-index: 88;position: relative;">
            <div class="container py-5 d-flex flex-column align-items-center bg-lapis">
                <div class="h2 fw-bold text-success shadow-sm"><i class="fas fa-newspaper"></i> {{$post->title}}</div>

                {{-- <div class=" h5 text-dark">Kategory post</div> --}}
                <div class="d-flex gap-2 mt-2">
                    @foreach ($kategory as $kt )
                    <a href="{{ route('show-posts', ["category"=>$kt->id]) }}" class="btn btn-primary {{Request::get("category") == $kt->id? "active":""}}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$kt->name}}">


                        @switch($kt->name)
                        @case("Informasi")
                        <i class="fas fa-info"></i>
                        @break
                        @case("Teknologi")
                        <i class="fas fa-robot"></i>
                        @break
                        @case("Berita harian")
                        <i class="fas fa-book-open"></i>
                        @break
                        @case("Ceritaku")
                        <i class="fas fa-running"></i>

                        @break
                        @default
                        <i class="fas fa-feather-alt"></i>

                        @endswitch
                    </a>

                    @endforeach


                </div>
            </div>
        </div>
        <div class="s-layer"></div>

    </div>


    <main class="container">
        <div class="row g-5 justify-content-center">
            <div class="col-md-11 col-12 overflow-hidden">
                <article class="blog-post">
                    <div class="d-flex justify-content-between align-content-center">
                        <h2 class="blog-post-title">{{$post->title}}</h2>
                        @if($post->is_active === 1)
                        <span class="text-success">[<i class="fas fa-check-square"></i>Disetujui]</span>
                        @else
                        <span class="text-danger">[<i class="fas fa-clock"></i> Menunggu persetujuan]</span>


                        @endif
                    </div>


                    <p class="blog-post-meta">Genbi, <span class="text-danger">{{$post->created_at}}</span> by <a href="{{ route('users-search', [$post->user->name]) }}">{{$post->user->name}}</a></p>

                </article>
                <article class="blog-post content">
                    {!!$post->content!!}
                </article>
                <nav class="blog-pagination mt-3" aria-label="Pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                </nav>

            </div>

        </div>

    </main>


    </x-main-layout>
