<x-dash-layout>
    <h1>Edit</h1>
    <div class="bg-white container py-3 mx-3 row">
        <form action="" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">username</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="nama" disabled>
                @error('nama')
                    <div class="text-small text-danger form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="text" value="{{ old('nim') ?? ($penerimaBeasiswa->nim ?? '') }}" class="form-control"
                    id="nim" name="nim">
                @error('nim')
                    <div class="text-small text-danger form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor Handphone</label>
                <input type="text" value="{{ old('no_hp') ?? ($penerimaBeasiswa->no_hp ?? '') }}"
                    class="form-control" id="no_hp" name="no_hp">
                @error('no_hp')
                    <div class="text-small text-danger form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto_pengenal" class="form-label">Foto pengenal</label>
                <img onerror="this.onerror=null;this.src='img/notfound.png';"
                    style="max-height: 200px;object-fit: contain"
                    src="{{ asset("storage/$penerimaBeasiswa->foto_pengenal") }}"
                    class="w-100 img-fluid img-thumbnail thumbnail">
                <input name="foto_pengenal" class="form-control input-show upload-img" data-target="thumbnail"
                    type="file" id="foto_pengenal">
                @error('foto_pengenal')
                    <div class="text-small text-danger form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 row gap-2">
                <div class="col-md">
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <input type="text" value="{{ old('fakultas') ?? ($penerimaBeasiswa->fakultas ?? '') }}"
                            class="form-control" id="fakultas" name="fakultas">
                        @error('fakultas')
                            <div class="text-small text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md">
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" value="{{ old('jurusan') ?? ($penerimaBeasiswa->jurusan ?? '') }}"
                            class="form-control" id="jurusan" name="jurusan">
                        @error('jurusan')
                            <div class="text-small text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3 row gap-2">
                <div class="col-md">
                    <label for="tanggal_masuk" class="form-label">tanggal_masuk</label>
                    <input type="date" value="{{ old('tanggal_masuk') ?? ($penerimaBeasiswa->tanggal_masuk ?? '') }}"
                        class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                    @error('tanggal_masuk')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md">
                    <label for="tanggal_keluar" class="form-label">Tanggal selesai</label>
                    <input type="date"
                        value="{{ old('tanggal_keluar') ?? ($penerimaBeasiswa->tanggal_keluar ?? '') }}"
                        class="form-control" id="tanggal_keluar" name="tanggal_keluar">
                    @error('tanggal_keluar')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input type="text" value="{{ old('angkatan') ?? ($penerimaBeasiswa->angkatan ?? '') }}"
                    class="form-control" id="angkatan" name="angkatan">
                @error('angkatan')
                    <div class="text-small text-danger form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembina" class="form-label">Pembina saat wawancara penerimaan</label>
                <input type="text" value="{{ old('pembina') ?? ($penerimaBeasiswa->pembina ?? '') }}"
                    class="form-control" id="pembina" name="pembina">
                @error('pembina')
                    <div class="text-small text-danger form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">


                <label for="BAgreement" class="form-label">Berkas Agrement</label>
                <embed type="application/pdf" class="pdf-show"
                    src="{{ asset("storage/$penerimaBeasiswa->BAgreement") }}" width="600" height="400"></embed>
                <input name="BAgreement" class="form-control input-show upload-img" data-target="pdf-show" type="file"
                    id="BAgreement" value="{{ old('BAgreement') }}">
                @error('BAgreement')
                    <div class="text-small text-danger form-text">{{ $message }}</div>
                @enderror
            </div>
            <hr>
            {{-- {{ dd($penerimaBeasiswa->status->komsat_id) }} --}}
            <div class="mb-3 row gap-2">
                <div class="col-md">
                    <label for="komsat_id" class="form-label">Komisariat</label>
                    <select id="komsat_id" name="komsat_id" class="form-select komsat form-select-sm">
                        <option disabled selected>Pilih Asal Komisariat ...</option>
                        @foreach ($komsats as $komsat)
                            <option
                                {{ old('komsat_id') || $penerimaBeasiswa->status->komsat_id == $komsat->id ? 'selected' : '' }}
                                value="{{ $komsat->id }}">{{ $komsat->nama }}</option>
                        @endforeach
                        @error('komsat_id')
                            <div class="text-small text-danger form-text">{{ $message }}</div>
                        @enderror
                    </select>
                </div>
                <div class="col-md">
                    <label for="devisi_id" class="form-label">Departement</label>
                    <select id="devisi_id" name="devisi_id" class="form-select devisi form-select-sm">
                        <option selected disabled>Pilih Devisi ...</option>
                        @foreach ($devisis as $devisi)
                            <option value="{{ $devisi->id }}"
                                {{ old('devisi_id') || $penerimaBeasiswa->status->devisi_id == $devisi->id ? 'selected' : '' }}>
                                {{ $devisi->nama }}</option>
                        @endforeach
                    </select>
                    @error('devisi_id')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Daftar </button>
        </form>
    </div>
</x-dash-layout>
