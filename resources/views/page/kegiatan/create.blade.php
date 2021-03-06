<x-dash-layout>


    <x-slot name="title_page">Buat Kegiatan</x-slot>
    <div class="bg-white container py-3 mx-3 d-flex justify-content-center">
        <div class="col-lg-10">

            <!-- Page Heading -->

            <form action="" method="POST" enctype="multipart/form-data">
                @method("post")
                @csrf
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Judul Kegiatan</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}"
                            required>
                        @error('nama')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">

                    <label for="activity_date" class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                    <div class="col-sm-10">
                        <input type="date" value="{{ old('activity_date') }}" name="activity_date"
                            class="form-control" id="activity_date" required>
                        @error('activity_date')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="created_at" class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                    <div class="col-sm-10">
                        <input type="date" value="{{ old('date2', date('Y-m-d')) }}" name="created_at"
                            class="form-control" id="created_at" required>
                        @error('created_at')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="devisi" class="col-sm-2 col-form-label">Devisi/Departemen</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="devisi" id="devisi">
                            @foreach ($devisi as $dv)
                                <option value="{{ $dv->id }}">{{ $dv->nama }}</option>
                            @endforeach
                        </select>
                        @error('devisi')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="type_kegiatan" class="col-sm-2 col-form-label">Type Kegiatan</label>

                    <div class="col-sm-10">
                        <select id="type_kegiatan" class="form-select" aria-label="Default select example"
                            name="type_kegiatan">

                            @foreach ($type_act as $ta)
                                <option value="{{ $ta->id }}">{{ $ta->nama }}</option>
                            @endforeach
                        </select>
                        @error('type_kegiatan')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail Kegiatan</label>

                    <div class="col-sm-10">
                        <input name="thumbnail" class="form-control input-show" type="file" id="thumbnail" required>
                        <span class="text-small text-info">(Gunakan gambar yang persegi panjang)</span>

                        @error('thumbnail')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="hero" class="col-sm-2 col-form-label">Hero/Baliho Kegiatan</label>

                    <div class="col-sm-10">
                        <input name="hero" class="form-control input-show" type="file" id="hero" required>
                        <span class="text-small text-info">(Gunakan gambar yang persegi panjang)</span>

                        @error('hero')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="mb-3 row">
                    <label for="body" class="col-sm-2 col-form-label">Deskripsi singkat</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="body" class="form-control summernote" id="floatingTextarea">
                        {{ old('body') }}
                        </textarea>
                        @error('body')
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
