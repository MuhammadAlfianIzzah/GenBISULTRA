<x-m-layout-v2>

    <div class="mt-r img-size-responsif" style="background-image: url({{ asset("storage/$post->hero") }})">

        <div class="p-5 px-0 mb-4 rounded-3 z-99 text-white" style="z-index: 88;position: relative;">
            <div class="container py-5 d-flex flex-column align-items-center bg-lapis">
                <h1 class="display-5 fw-bold">{{ $post->nama }}</h1>

                {{-- <h4 class="text-dark">Lihat post kegiatan lainnya</h4> --}}
                {{-- <div class="d-flex gap-2 mt-2">

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

                </div> --}}

            </div>
        </div>
        <div class="s-layer"></div>

    </div>


    <main class="container">
        <div class="row g-5 justify-content-center">
            <div class="col-md-11 col-12 overflow-hidden">
                <article class="blog-post">
                    {{-- <div class="d-flex justify-content-between align-content-center">
                        <h2 class="blog-post-title">{{$post->nama}}</h2>
                        @if ($post->is_active === 1)
                        <span class="text-success">[<i class="fas fa-check-square"></i>Disetujui]</span>
                        @else
                        <span class="text-danger">[<i class="fas fa-clock"></i> Menunggu persetujuan]</span>
                        @endif
                    </div> --}}
                    <div class="alert alert-primary" role="alert">
                        GenBI SULTRA, <span class="text-danger">{{ $post->created_at }}</span> by <a
                            href="{{ route('users-search', $post->user->name) }}">{{ $post->user->name }}</a>
                    </div>

                </article>
                <article class="blog-post content">
                    {!! $post->body !!}
                </article>


            </div>

        </div>
    </main>
</x-m-layout-v2>
