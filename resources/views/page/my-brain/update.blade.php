<x-dash-layout>
    <style>
        .blockquote {
            border-left: 4px solid red;
            padding-left: 1rem;
        }
    </style>

    <x-slot name="title_page">Update <span class="badge badge-info">~{{ $posts->title }}~</span></x-slot>


    <div class="bg-white container py-3 mx-3 d-flex justify-content-center">
        <div class="col-lg-10">
            @if ($message = Session::get('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                        <use xlink:href="#info-fill" />
                    </svg>
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Page Heading -->

            <form action="" method="POST" enctype="multipart/form-data">
                @method('PUT')

                @csrf
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Title Post</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" required
                            value="{{ old('title') ?? ($posts->title ?? '') }}">

                        @error('title')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror

                    </div>

                </div>
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="category">

                            <option value="karyaku"
                                {{ old('category', $posts->category) == 'karyaku' ? 'selected' : '' }}>Karyaku
                            </option>

                            <option value="my teori"
                                {{ old('category', $posts->category) == 'my teori' ? 'selected' : '' }}>My teori
                            </option>
                        </select>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                        <textarea name="content" id="content" class="form-control summernote" id="floatingTextarea">
                        {{ old('content') ?? ($posts->content ?? '') }}
                        </textarea>
                        @error('content')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="formFile" class="col-sm-2 col-form-label">Thumnail</label>
                    <div class="col-sm-10">
                        <img onerror="this.onerror=null;this.src='img/notfound.png';"
                            style="max-height: 200px;object-fit: contain" src="{{ asset("storage/$posts->thumbnail") }}"
                            class="w-100 img-fluid img-thumbnail thumbnail">
                        <input name="thumbnail" data-target="thumbnail" class="form-control input-show upload-img"
                            type="file" id="formFile">
                        @error('thumbnail')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="formFile" class="col-sm-2 col-form-label">Hero</label>
                    <div class="col-sm-10">
                        <img onerror="this.onerror=null;this.src='img/notfound.png';"
                            style="max-height: 200px;object-fit: contain" src="{{ asset("storage/$posts->hero") }}"
                            class="w-100 img-fluid img-hero hero">
                        <input name="hero" data-target="hero" class="form-control input-show upload-img"
                            type="file" id="formFile">
                        @error('hero')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn w-100" style="background-color: #3d5af1;color: white">Share
                    Post</button>
            </form>

        </div>
    </div>
    @push('script')
        <script>
            $('.summernote').summernote({
                tabsize: 2,
                height: 180,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    //['fontname', ['fontname']],
                    // ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'hr']], // Removed 'picture' button
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ],
            });
        </script>
    @endpush
</x-dash-layout>
