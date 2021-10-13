<x-dash-layout>
    <h1>Daftar GenBI</h1>
    <div class="bg-white container py-3 mx-3 row">
        <form action="" method="POST">
            @method("post")
            @csrf
            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="text" class="form-control" id="nim" name="nim">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor Handphone</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp">
            </div>
            <div class="mb-3">
                <label for="foto_pengenal" class="form-label">Foto pengenal</label>
                <input class="form-control" name="foto_pengenal" type="file" id="foto_pengenal">
            </div>
            <div class="mb-3">
                <label for="fakultas" class="form-label">Fakultas</label>
                <input type="text" class="form-control" id="fakultas" name="fakultas">
            </div>
            <div class="mb-3 row gap-2">
                <div class="col-md">
                    <label for="tanggal_masuk" class="form-label">tanggal_masuk</label>
                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                </div>
                <div class="col-md">
                    <label for="tanggal_keluar" class="form-label">Tanggal selesai</label>
                    <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar">
                </div>
            </div>
            <div class="mb-3">
                <label for="komisariat" class="form-label">Komisariat</label>
                <input type="text" class="form-control" id="komisariat" name="komisariat">
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan">
            </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input type="text" class="form-control" id="angkatan" name="angkatan">
            </div>
            <div class="mb-3">
                <label for="pembina" class="form-label">Pembina saat wawancara penerimaan</label>
                <input type="text" class="form-control" id="pembina" name="pembina">
            </div>
            <button type="submit" class="btn btn-primary">Daftar </button>
        </form>


    </div>
</x-dash-layout>
