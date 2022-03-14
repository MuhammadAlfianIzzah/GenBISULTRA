<x-m-layout-v2>
    <div class="mt-r img-size-responsif">

        <div class="p-5 px-0 mb-4 rounded-3 z-99 text-white" style="z-index: 88;position: relative;">
            <div class="container py-5 d-flex flex-column align-items-center bg-lapis">
                <h1 class="display-5 fw-bold">Informasi Beasiswa</h1>
                <p class="col-md-8 text-center">Yuk Lihat informasi terbaru mengenai beasiswa Bank Indonesia untuk
                    Universitas di Sulawesi Tenggara</p>

            </div>
        </div>

        <div class="s-layer"></div>

    </div>
    <div class="bg-white container">

        <article class="blog-post full content">
            {!! $posts[0]->content !!}
        </article>

    </div>
    <div class="container">
        <div class="row mb-2 mt-4 h6">
            <div class="col-12">
                Post lainnya dari
            </div>
        </div>
        <div class="row mb-3">
            @forelse ($posts as $post)
                {{-- {{ dd($userPost->thumbnail) }} --}}
                <div class="col-lg-4">
                    <div class="card">
                        <img src="{{ asset("storage/$post->thumbnail") }}" class="card-img-top" alt="...">
                        <div class="card-header">
                            {{ $post->title }}
                        </div>
                        <div class="card-body text-center">
                            <a href="{{ route('detail-posts', $post->slug) }}" class="btn btn-primary">Baca
                                selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</x-m-layout-v2>
