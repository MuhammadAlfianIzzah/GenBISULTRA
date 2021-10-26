<x-dash-layout>
    <h1>{{ $cek ? 'Kartu Anggota' : 'Daftar GenBI' }}</h1>
    <div class="bg-white container py-3 mx-3 row">
        @if (!$cek)
            <form action="" method="POST" enctype="multipart/form-data">
                @method("post")
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">nama</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="nama" disabled>
                    @error('nama')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="text" class="form-control" id="nim" name="nim">
                    @error('nim')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor Handphone</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                    @error('no_hp')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto_pengenal" class="form-label">Foto pengenal</label>
                    <input name="foto_pengenal" class="form-control input-show" type="file" id="foto_pengenal">
                    @error('foto_pengenal')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row gap-2">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="fakultas" class="form-label">Fakultas</label>
                            <input type="text" class="form-control" id="fakultas" name="fakultas">
                            @error('fakultas')
                                <div class="text-small text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan">
                            @error('jurusan')
                                <div class="text-small text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3 row gap-2">
                    <div class="col-md">
                        <label for="tanggal_masuk" class="form-label">tanggal_masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                        @error('tanggal_masuk')
                            <div class="text-small text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md">
                        <label for="tanggal_keluar" class="form-label">Tanggal selesai</label>
                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar">
                        @error('tanggal_keluar')
                            <div class="text-small text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="angkatan" class="form-label">Angkatan</label>
                    <input type="text" class="form-control" id="angkatan" name="angkatan">
                    @error('angkatan')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pembina" class="form-label">Pembina saat wawancara penerimaan</label>
                    <input type="text" class="form-control" id="pembina" name="pembina">
                    @error('pembina')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Daftar </button>
            </form>
        @else
            <div class="col-lg-8">
                <div class="card h-100">
                    <img style="max-height: 200px;object-fit: contain"
                        src='{{ asset("storage/$pB->foto_pengenal") }}' class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pB->nim }} | {{ $pB->jurusan }}</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                            to
                            additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer text-center">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-warning">Edit</button>
                            <button type="button" class="btn btn-primary">Gabung Departemen</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-dash-layout>
