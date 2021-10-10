<x-dash-layout>
    <x-slot name="title_page">
        Jenis Kegiatan GenBI
    </x-slot>
    <div class="bg-white container py-3 mx-3 d-flex justify-content-center row">
        <form action="" method="POST">
            @csrf
            @method("PATCH")
            <div class="modal-header">
                <h5 class="modal-title" id="create_devisiLabel"> <i class="fas fa-pen"></i> Edit Jenis Kegiatan</h5>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Jenis Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') ?? $typeActivity->nama ?? '' }}">


                    @error('nama')
                    <div class="form-text text-danger">{{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Update Devisi</button>
            </div>


        </form>


    </div>


</x-dash-layout>
