<x-dash-layout>
    <x-slot name="title_page">Create Post</x-slot>
    <div class="bg-white container py-5 mx-3 d-flex justify-content-center ">
        <div class="col-lg-11">
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

            <form action="" method="POST" enctype="multipart/form-data" novalidate>
                @method("post")
                @csrf
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Title Post</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}"
                            required placeholder="minimal judul 8 karakter ...">
                        @error('title')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="category_id">
                            @foreach ($category as $ct)
                                <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror

                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="formFile" class="col-sm-2 col-form-label">Hero image</label>

                    <div class="col-sm-10">

                        <img src="" style="max-height: 200px;object-fit: contain"
                            class="w-100 img-fluid img-thumbnail hero">
                        <input name="hero" data-target="hero" class="form-control input-show upload-img" type="file"
                            id="formFile" required>
                        <span class="text-scaledown">(Gunakan gambar yang persegi panjang)</span>
                        @error('hero')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                        <textarea name="content" id="content" class="form-control summernote" id="floatingTextarea">
                        {{ old('content') }}
                        </textarea>
                        @error('content')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="formFile" class="col-sm-2 col-form-label">Thumnail</label>
                    <div class="col-sm-10">
                        <img style="max-height: 200px;object-fit: contain"
                            class="w-100 img-fluid img-thumbnail thumbnail" src="">
                        <input name="thumbnail" data-target="thumbnail" class="form-control input-show upload-img"
                            type="file" id="formFile" required>
                        @error('thumbnail')
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
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ],
            });
        </script>
    @endpush
</x-dash-layout>
