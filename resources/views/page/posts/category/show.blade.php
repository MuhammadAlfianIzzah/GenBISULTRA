<x-dash-layout>
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
    <x-slot name="title_page">
        Category Posts
    </x-slot>
    <div class="col-8">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_category">
            <i class="fas fa-pen"></i> Create Category Posts
        </button>
    </div>
    <div class="bg-white container py-3 mx-3 d-flex justify-content-center row">
        <div class="col-12">
            <table class="table shadow-sm rounded-3" style="overflow: hidden;">

                <thead class="text-white" style="background-color: #c5e3f6">

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Update At</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $key => $ct)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $ct->name }}</td>
                            <td>{{ $ct->created_at }}</td>
                            <td>{{ $ct->updated_at }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-info">Edit</a>
                                    <form action="{{ route('delete-category-posts', "$ct->id") }}"
                                        style="display: inline;" method="POST">

                                        @method("delete")
                                        @csrf
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $ct->id }}">

                                            Delete
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete{{ $ct->id }}" tabindex="-1"
                                            aria-labelledby="delete{{ $ct->id }}Label" aria-hidden="true">


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
            @if ($category->isEmpty())
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
    <div class="modal fade {{ $errors->all() ? 'show' : '' }}" id="create_category" tabindex="-1"
        aria-labelledby="create_categoryLabel" aria-hidden="true" role="dialog">

        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    @csrf
                    @method("POST")
                    <div class="modal-header">
                        <h5 class="modal-title" id="create_categoryLabel"> <i class="fas fa-pen"></i> Create
                            Category Posts</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Category</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('nama') }}">

                            @error('name')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @push('script')
                                    <script>
                                        var myModal = new bootstrap.Modal(document.getElementById('create_category'), {
                                            keyboard: false
                                        });
                                        myModal.show();
                                    </script>
                                @endpush
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-dash-layout>
