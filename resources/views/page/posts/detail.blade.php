<x-m-layout-v2>

    <div class="mt-r img-size-responsif">

        <div class="p-5 px-0 mb-4 rounded-3 z-99 text-white" style="z-index: 88;position: relative;">
            <div class="container py-5 d-flex flex-column align-items-center bg-lapis">
                <div class="h1 fw-bold text-white shadow-sm"><i class="fas fa-newspaper"></i> {{ $post->title }}</div>

                @if ($post->is_active === 1)
                    <span class="text-success">[<i class="fas fa-check-square"></i>Disetujui]</span>
                @else
                    <span class="text-danger">[<i class="fas fa-clock"></i> Menunggu persetujuan]</span>


                @endif
                <div class="d-flex gap-2 mt-2">
                    @foreach ($kategory as $kt)
                        <a href="{{ route('show-posts', ['category' => $kt->id]) }}"
                            class="btn btn-primary {{ Request::get('category') == $kt->id ? 'active' : '' }}"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $kt->name }}">


                            @switch($kt->name)
                                @case(" Informasi")
                                    <i class="fas fa-info"></i>
                                @break
                                @case(" Teknologi")
                                    <i class="fas fa-robot"></i>
                                @break
                                @case(" Berita harian")
                                    <i class="fas fa-book-open"></i>
                                @break
                                @case(" Ceritaku")
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
                        <h2 class="blog-post-title">{{ $post->title }}</h2>

                    </div>
                    <img style="max-height: 300px;object-fit: cover;width: 100%;object-position: center"
                        src="{{ asset("storage/$post->thumbnail") }}" alt="" class="img-thumbnail">

                    <p class="blog-post-meta">Genbi, <span class="text-danger">{{ $post->created_at }}</span> by <a
                            href="{{ route('users-search', [$post->user->name]) }}">{{ $post->user->name }}</a></p>

                </article>
                <article class="blog-post content">
                    {!! $post->content !!}
                </article>
                <div class="row mb-2">
                    <div class="col-12">
                        Post lainnya dari <span class="text-info">{{ $post->user->name }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    @forelse ($post->user->posts as $userPost)
                        {{-- {{ dd($userPost->thumbnail) }} --}}
                        <div class="col-lg-4">
                            <div class="card">
                                <img src="{{ asset("storage/$userPost->thumbnail") }}" class="card-img-top"
                                    alt="...">
                                <div class="card-header">
                                    {{ $userPost->title }}
                                </div>
                                <div class="card-body text-center">
                                    <a href="{{ route('detail-posts', $userPost->slug) }}"
                                        class="btn btn-primary">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>

            </div>

        </div>

    </main>

</x-m-layout-v2>
