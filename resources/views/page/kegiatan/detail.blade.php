<x-m-layout-v2>

    <div class="mt-r img-size-responsif" style="background-image: url({{asset("storage/$post->hero")}})">

        <div class="p-5 mb-4 rounded-3 z-99 text-white" style="z-index: 88;position: relative;">
            <div class="container py-5 d-flex flex-column align-items-center bg-lapis">
                <h1 class="display-5 fw-bold">{{$post->nama}}</h1>

                <h4 class="text-dark">Lihat post kegiatan lainnya</h4>
                <div class="d-flex gap-2 mt-2">
                    @foreach ($kategory as $kt)
                    <a href="{{ route('show-kegiatan', ['category'=>$kt->id]) }}" class="btn btn-primary btn-lg fs-6 shadow-sm">{{$kt->nama}}</a>
                    @endforeach
                    @foreach ($devisi as $dv)
                    <a href="{{ route('show-kegiatan', ['devisi'=>$dv->id]) }}" class="btn btn-primary btn-lg fs-6 shadow-sm">{{$dv->nama}}</a>
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
                        <h2 class="blog-post-title">{{$post->nama}}</h2>
                        @if($post->is_active === 1)
                        <span class="text-success">[<i class="fas fa-check-square"></i>Disetujui]</span>
                        @else
                        <span class="text-danger">[<i class="fas fa-clock"></i> Menunggu persetujuan]</span>


                        @endif
                    </div>


                    <p class="blog-post-meta">Genbi, <span class="text-danger">{{$post->created_at}}</span> by <a href="#">{{$post->user->name}}</a></p>
                </article>
                <article class="blog-post content">
                    {!!$post->body!!}
                </article>
                {{-- <nav class="blog-pagination mt-3" aria-label="Pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                </nav> --}}

            </div>

        </div>
    </main>
</x-m-layout-v2>
