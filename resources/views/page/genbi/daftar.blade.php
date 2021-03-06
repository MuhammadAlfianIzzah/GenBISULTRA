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
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim') }}">
                    @error('nim')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor Handphone</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto_pengenal" class="form-label">Foto pengenal</label>
                    <input name="foto_pengenal" class="form-control input-show" type="file" id="foto_pengenal"
                        value="{{ old('foto_pengenal') }}">
                    @error('foto_pengenal')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row gap-2">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="fakultas" class="form-label">Fakultas</label>
                            <input type="text" class="form-control" id="fakultas" name="fakultas"
                                value="{{ old('fakultas') }}">
                            @error('fakultas')
                                <div class="text-small text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan"
                                value="{{ old('jurusan') }}">
                            @error('jurusan')
                                <div class="text-small text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3 row gap-2">
                    <div class="col-md">
                        <label for="tanggal_masuk" class="form-label">Tanggal masuk kuliah</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                            value="{{ old('tanggal_masuk') }}">
                        @error('tanggal_masuk')
                            <div class="text-small text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md">
                        <label for="tanggal_keluar" class="form-label">Tanggal perkiraan wisuda</label>
                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"
                            value="{{ old('tanggal_keluar') }}">
                        @error('tanggal_keluar')
                            <div class="text-small text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="angkatan" class="form-label">Angkatan kuliah</label>
                    <input type="text" class="form-control" id="angkatan" name="angkatan"
                        value="{{ old('angkatan') }}">
                    @error('angkatan')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pembina" class="form-label">Pembina saat wawancara penerimaan</label>
                    <input type="text" class="form-control" id="pembina" name="pembina"
                        value="{{ old('pembina') }}">
                    @error('pembina')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="BAgreement" class="form-label">Berkas Agrement</label>
                    <input name="BAgreement" class="form-control input-show" type="file" id="BAgreement"
                        value="{{ old('BAgreement') }}">
                    @error('BAgreement')
                        <div class="text-small text-danger form-text">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <div class="mb-3 row gap-2">
                    <div class="col-md">
                        <label for="komsat_id" class="form-label">Komisariat</label>
                        <select id="komsat_id" name="komsat_id" class="form-select komsat form-select-sm">
                            <option disabled selected>Pilih Asal Komisariat ...</option>
                            @foreach ($komsats as $komsat)
                                <option {{ old('komsat_id') == $komsat->id ? 'selected' : '' }}
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
                                    {{ old('devisi_id') == $devisi->id ? 'selected' : '' }}>
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
        @else
            <div class="col-lg-8">
                <div class="card h-100">
                    <img style="max-height: 200px;object-fit: contain"
                        src='{{ asset("storage/$pB->foto_pengenal") }}' class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $pB->nim }} | {{ $pB->jurusan }}</h5>
                        {{-- <p class="card-text">["belum tervalidasi"]</p> --}}
                    </div>
                    <div class="card-footer text-center">
                        <div class="btn-group" role="group">
                            <a href="{{ route('edit-daftar-genbi', $pB->id) }}" class="btn btn-warning">Edit</a>
                            <button type="button" class="btn btn-primary">Gabung Departemen</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hallo, Iya kamu</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Mau liat siapa aja anggota GenBI SULTRA?</h6>
                        <a href="{{ route('list-anggota-genbi') }}" class="card-link">Klik disini</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @push('script')
        <script>
            $(".komsat").select2({
                placeholder: "Select a programming language",
                allowClear: true
            });
            $(".devisi").select2({
                placeholder: "Select a programming language",
                allowClear: true
            });
            // $(document).ready(function() {
            //     // $('.komsat').select2();
            //     // $('.devisi').select2();
            //     $(".komsat").select2({
            //         placeholder: "Select a programming language",
            //         allowClear: true
            //     });
            //     $(".devisi").select2({
            //         placeholder: "Select a programming language",
            //         allowClear: true
            //     });
            // });
        </script>
    @endpush
</x-dash-layout>
