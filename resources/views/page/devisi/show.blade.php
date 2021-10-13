<x-dash-layout>
    @if ($message = Session::get('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
            <use xlink:href="#exclamation-triangle-fill" /></svg>

        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
            <use xlink:href="#info-fill" /></svg>
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif
    <x-slot name="title_page">
        Devisi GenBI
    </x-slot>
    <div class="col-8">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_devisi">
            <i class="fas fa-pen"></i> Create Devisi
        </button>
    </div>
    <div class="bg-white container py-3 mx-3 d-flex justify-content-center row">
        <div class="col-12">
            <table class="table shadow-sm rounded-3" style="overflow: hidden;">

                <thead class="text-white" style="background-color: #c5e3f6">

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col" class="table-responsif">Deskripsi</th>

                        <th scope="col" class="table-responsif">Created At</th>

                        <th scope="col" class="table-responsif">Update At</th>

                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($devisi as $dv)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$dv->nama}}</td>
                        <td class="table-responsif">{{$dv->deskripsi}}</td>


                        <td class="table-responsif">{{$dv->created_at}}</td>

                        <td class="table-responsif">{{$dv->updated_at}}</td>

                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('edit-devisi',"$dv->nama") }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>

                                </a>
                                <form action="{{ route('delete-devisi',"$dv->nama") }}" style="display: inline;" method="POST">

                                    @csrf
                                    @method("delete")
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$dv->nama}}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{$dv->nama}}" tabindex="-1" aria-labelledby="delete{{$dv->nama}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    Yakin ingin menghapus?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
            @if($devisi->isEmpty())
            <div class="alert alert-warning alert-dismissible fade show d-flex justify-content-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                    <use xlink:href="#exclamation-triangle-fill" /></svg>
                No Posts
            </div>

            @endif

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade {{$errors->all()?"show":""}}" id="create_devisi" tabindex="-1" aria-labelledby="create_devisiLabel" aria-hidden="true" role="dialog">

        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    @csrf
                    @method("POST")
                    <div class="modal-header">
                        <h5 class="modal-title" id="create_devisiLabel"> <i class="fas fa-pen"></i> Create Type</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Devisi</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{old("nama")}}">
                            @error('nama')
                            <div class="form-text text-danger">{{$message}}
                            </div>

                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{old("deskripsi")}}">
                            @error('deskripsi')
                            <div class="form-text text-danger">{{$message}}
                            </div>

                            @enderror

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                    @if ($errors->any())
                    @push("script")
                    <script>
                        var myModal = new bootstrap.Modal(document.getElementById('create_devisi'), {
                            keyboard: false
                        });
                        myModal.show();

                    </script>
                    @endpush
                    @endif

                </form>

            </div>
        </div>
    </div>

</x-dash-layout>
