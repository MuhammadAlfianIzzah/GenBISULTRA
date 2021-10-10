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
    <div class="bg-white container py-3 mx-3 row">
        <div class="container row d-flex justify-content-center py-4">
            <h1 class="text-danger text-center mb-4">Lengkapi data 🥳</h1>
            <div class="col-8">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="">
                        @error('nama')
                        <div class="text-danger text-small">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto_profile" class="form-label">Foto Profile</label>
                        <input name="foto_profile" class="form-control input-show" type="file" id="foto_profile" required="">
                        <span class="text-scaledown">(Gunakan gambar yang persegi panjang)</span>
                        @error('foto_profile')
                        <div class="text-danger text-small">{{$message}}</div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="biodata" class="form-label">Biodata ~ (Ceritakan tentang diri anda)</label>
                        <textarea name="biodata" id="biodata" class="form-control summernote">
                        {{old("biodata")}}
                        </textarea>
                        @error('biodata')
                        <div class="text-danger text-small">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hero" class="form-label">Background Profile</label>
                        <input name="hero" class="form-control input-show" type="file" id="hero" required="">
                        <span class="text-scaledown">(Gunakan gambar yang persegi panjang)</span>
                        @error('hero')
                        <div class="text-danger text-small">{{$message}}</div>
                        @enderror

                    </div>
                    <div class="btn-group text-center w-100">
                        <button type="submit" class="btn btn-info">Simpan data</button>
                    </div>

                </form>
            </div>


        </div>

    </div> @push("script")
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
