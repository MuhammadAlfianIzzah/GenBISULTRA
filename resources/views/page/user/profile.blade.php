<x-dash-layout>
    <style>
        .avatar {
            border: 0.3rem solid rgba(#fff, 0.3);
            /* margin-top: -6rem;
            margin-bottom: 1rem;
            max-width: 9rem; */
            margin-top: -6rem;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid white;
            width: 100px;
            height: 100px;
        }

    </style>

    {{-- {{dd($profile->foto_profile)}} --}}
    <div class="bg-white container py-3 mx-3 row">
        <div class="container">
            @if(empty($profile))
            <div class="text-center">
                Silahkan <a href="{{ route('set-profile') }}" class="text-warning">lengkapi</a> data terlebih dahulu
            </div>
            @else
            <div class="row">
                <div class="col-12 col-sm-7 col-md-12 col-lg-8">
                    <div class="card card-profile">
                        <img class="card-img-top" style="max-height: 200px;object-fit: cover" src="{{ secure_asset("storage") ."/".$profile->hero}}" alt="Bologna">

                        <div class="card-body text-center">
                            <img class="avatar" src="{{ secure_asset("storage") ."/".$profile->foto_profile}}" alt="Bologna">


                            <div class="card-title h4">{{$profile->nama}}</div>
                            <div class="h6 card-subtitle mb-2 text-muted">
                                {{$profile->user->email}}
                            </div>
                            <div class="card-text h5 text-primary px-3 py-2">
                                "{{$profile->headline}}"
                            </div>
                            <div class="card-text">
                                <div class="container text-left">
                                    {!!$profile->biodata!!}
                                </div>
                            </div>
                            {{-- <a href="#" class="btn btn-info">Follow</a>
                            <a href="#" class="btn btn-outline-info">Message</a> --}}
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProfile">
                                Edit
                            </button>
                            <button class="btn btn-primary">Share</button>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-5 col-lg-4 col-md-12">
                    <h4 style="border-left: 4px solid salmon;padding-left: .4rem">User posts</h4>
                    <hr>
                    @forelse ($posts as $post)
                    <div class="card mb-2 border-0" style="border-top: 4px solid rgb(145, 145, 250) !important">
                        <img style="max-height: 120px;object-fit: cover" src="{{ secure_asset("storage/$post->thumbnail") }}" class="card-img-top" alt="...">

                        <?php 
                        $filter =preg_replace("/<img[^>]+>/", "", $post->content);
                            $filterh1= strip_tags($filter);
                         ?>

                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{!! Str::limit($filterh1,200,'...')!!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('detail-posts',["$post->slug"]) }}" type="button" class="btn btn-sm btn-outline-secondary">Continue reading</a>
                                </div>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                            </div>

                        </div>
                    </div>
                    @empty
                    no posts
                    @endforelse

                </div>


            </div>
            @endif


        </div>

    </div><!-- Modal -->
    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @method("patch")
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') ?? $profile->nama ?? '' }}">

                            @error('nama')
                            <div class="text-danger text-small">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="form-floating mb-2">
                            <textarea class="form-control" name="headline" style="height: 100px">{{ old('headline') ?? $profile->headline ?? '' }}
                            </textarea>
                            <label for="floatingTextarea2">Headline</label>
                        </div>

                        <div class="mb-3">
                            <label for="foto_profile" class="form-label">Foto Profile</label>
                            <input name="foto_profile" class="form-control input-show" type="file" id="foto_profile">
                            {{-- <img style="width: 100px" src="{{ secure_asset("storage/$profile->foto_profile")}}" class="rounded d-block mt-2 img-thumbnail" alt="..."> --}}
                            @error('foto_profile')
                            <div class="text-danger text-small">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="biodata" class="form-label">Biodata ~ (Ceritakan tentang diri anda)</label>
                            <textarea name="biodata" id="biodata" class="form-control summernote">
                            {{ old('biodata') ?? $profile->biodata ?? '' }}

                            </textarea>
                            @error('biodata')
                            <div class="text-danger text-small">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="hero" class="form-label">Background Profile</label>
                            <input name="hero" class="form-control input-show" type="file" id="hero">
                            <span class="text-scaledown">(Gunakan gambar yang persegi panjang)</span>
                            @error('hero')
                            <div class="text-danger text-small">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="btn-group text-center w-100">
                            <button type="submit" class="btn btn-primary">Simpan data</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    @push("script")
    <script>
        $('.summernote').summernote({
            tabsize: 2
            , height: 180
            , toolbar: [
                ['style', ['style']]
                , ['font', ['bold', 'italic', 'underline', 'clear']],
                // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                //['fontname', ['fontname']],
                // ['fontsize', ['fontsize']],
                ['color', ['color']]
                , ['para', ['ul', 'ol', 'paragraph']]
                , ['height', ['height']]
                , ['table', ['table']]
                , ['insert', ['link', 'picture', 'hr']]
                , ['view', ['fullscreen', 'codeview']]
                , ['help', ['help']]
            ]
        , });

    </script>
    @endpush

</x-dash-layout>
