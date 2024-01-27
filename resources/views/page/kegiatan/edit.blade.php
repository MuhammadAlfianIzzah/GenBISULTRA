<x-dash-layout>


    <x-slot name="title_page">Buat Kegiatan</x-slot>
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
                    <label for="nama" class="col-sm-2 col-form-label">Judul Kegiatan</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="{{ old('nama') ?? ($activity->nama ?? '') }}" required>
                        @error('nama')
                            <div class=" text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">

                    <label for="activity_date" class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                    <div class="col-sm-10">
                        <input type="date" value="{{ old('activity_date') ?? ($activity->activity_date ?? '') }}"
                            name="activity_date" class="form-control" id="activity_date" required>
                        @error('activity_date')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="devisi" class="col-sm-2 col-form-label">Devisi/Departemen</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="devisi" id="devisi">
                            @foreach ($devisi as $dv)
                                <option value="{{ $dv->id }}"
                                    {{ old('devisi', $activity->devisi_id) == $dv->id ? 'selected' : '' }}>
                                    {{ $dv->nama }}</option>
                            @endforeach
                        </select>
                        @error('devisi')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="TA_id" class="col-sm-2 col-form-label">Type Kegiatan</label>
                    <div class="col-sm-10">
                        <select id="TA_id" class="form-select" aria-label="Default select example" name="TA_id">
                            @foreach ($type_act as $ta)
                                <option value="{{ $ta->id }}"
                                    {{ old('TA_id', $activity->TA_id) == $ta->id ? 'selected' : '' }}>
                                    {{ $ta->nama }}</option>
                            @endforeach
                        </select>
                        @error('TA_id')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail Kegiatan</label>
                    <div class="col-sm-10">
                        <input name="thumbnail" class="form-control input-show" type="file" id="thumbnail">
                        <span class="text-small text-info">(Gunakan gambar yang persegi panjang)</span>
                        @error('thumbnail')
                            <div class="text-danger text-small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="hero" class="col-sm-2 col-form-label">Hero/Baliho Kegiatan</label>
                    <div class="col-sm-10">
                        <input name="hero" class="form-control input-show" type="file" id="hero">
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
                        {{ old('body') ?? ($activity->body ?? '') }}
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
                    ['insert', ['link', 'hr']], // Removed 'picture' button
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ],
            });
        </script>
    @endpush
</x-dash-layout>
