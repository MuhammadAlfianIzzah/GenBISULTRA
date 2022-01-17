<x-dash-layout>

    <x-slot name="title_page">
        Create Komsat
    </x-slot>
    <div class="col-8">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_komsat">
            <i class="fas fa-pen"></i> Create Komsat
        </button>
    </div>
    <div class="bg-white container py-3 mx-3 d-flex justify-content-center row">
        <div class="col-12">
            <table class="table shadow-sm rounded-3" style="overflow: hidden;">

                <thead class="text-white" style="background-color: #c5e3f6">

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col" class="table-responsif">Keterangan</th>

                        <th scope="col" class="table-responsif">Created At</th>

                        <th scope="col" class="table-responsif">Update At</th>

                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($komsat as $ks)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $ks->nama }}</td>
                            <td class="table-responsif">{{ $ks->keterangan }}</td>


                            <td class="table-responsif">{{ $ks->created_at }}</td>

                            <td class="table-responsif">{{ $ks->updated_at }}</td>

                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('edit-komsat', "$ks->nama") }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>

                                    </a>
                                    <form action="{{ route('delete-komsat', "$ks->nama") }}" style="display: inline;"
                                        method="POST">

                                        @csrf
                                        @method("delete")
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $ks->nama }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete{{ $ks->nama }}" tabindex="-1"
                                            aria-labelledby="delete{{ $ks->nama }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        Yakin ingin menghapus?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($komsat->isEmpty())
                <div class="alert alert-warning alert-dismissible fade show d-flex justify-content-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    No Posts
                </div>

            @endif

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade {{ $errors->all() ? 'show' : '' }}" id="create_komsat" tabindex="-1"
        aria-labelledby="create_komsatLabel" aria-hidden="true" role="dialog">

        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    @csrf
                    @method("POST")
                    <div class="modal-header">
                        <h5 class="modal-title" id="create_komsatLabel"> <i class="fas fa-pen"></i> Create Komsat
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Komsat</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama') }}">
                            @error('nama')
                                <div class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                value="{{ old('keterangan') }}">
                            @error('keterangan')
                                <div class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                    {{-- @if ($errors->any())
                        @push('script')
                            <script>
                                var myModal = new bootstrap.Modal(document.getElementById('create_komsat'), {
                                    keyboard: false
                                });
                                myModal.show();
                            </script>
                        @endpush
                    @endif --}}

                </form>

            </div>
        </div>
    </div>

</x-dash-layout>
