<x-dash-layout>
    <x-slot name="title_page">
        komsat GenBI
    </x-slot>
    <div class="bg-white container py-3 mx-3 d-flex justify-content-center row">
        <form enctype="multipart/form-data" action="" method="POST">
            @csrf
            @method("PATCH")
            <div class="modal-header">
                <h5 class="modal-title"> <i class="fas fa-pen"></i> Edit komsat</h5>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama komsat</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="{{ old('nama') ?? ($komisat->nama ?? '') }}">

                    @error('nama')
                        <div class="form-text text-danger">{{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="mb-3 row">
                    <label for="formFile" class="form-label">logo image</label>


                    <img style="max-height: 200px;object-fit: contain" class="w-100 img-fluid img-thumbnail logo"
                        src="{{ asset("storage/$komisat->logo") }}">
                    <input name="logo" class="form-control input-show upload-img" data-target="logo" type="file"
                        id="formFile">
                    <small class="text-small text-warning">(Gunakan gambar yang persegi panjang)</small>

                    @error('logo')
                        <div class="text-danger text-small">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">keterangan</label>

                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                        value="{{ old('keterangan') ?? ($komisat->keterangan ?? '') }}">
                    @error('keterangan')
                        <div class="form-text text-danger">{{ $message }}
                        </div>
                    @enderror

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Update komsat</button>
            </div>


        </form>


    </div>


</x-dash-layout>
