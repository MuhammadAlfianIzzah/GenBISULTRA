<x-m-layout-v2>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <div class="mb-4 bg-light rounded-3 mt-r">
        <div class="container h-100 p-5 bg-light rounded-3">
            <h2><span class="text-primary">List Note </span>{{ $listnote->title }}</h2>
            <p><span class="text-bold text-danger h6">Rules:</span> {{ $listnote->deskripsi }}</p>
            <!-- Button trigger modal -->
            @if (!$cek)
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Buat Response
                </button>
            @else
                <div class="alert alert-primary d-flex align-items-center justify-content-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                        <use xlink:href="#info-fill" />
                    </svg>
                    <div>
                        terima kasih telah mengisi response:< </div>

            @endif

        </div>
    </div>
    <div class="bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    @if ($cek)

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Jawaban</th>
                                    <th scope="col" class="table-responsif">Tanggal dibuat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($responsList as $respon)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $respon->jawaban }}</td>
                                        <td class="table-responsif">
                                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($respon->created_at))->diffForHumans() }}
                                        </td>

                                        <td>
                                            @if (Auth::user()->id == $respon->user_id)
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    {{-- <button type="button" class="btn btn-info">Update</button> --}}
                                                    <form action="" method="POST">
                                                        @csrf
                                                        @method("delete")
                                                        <input type="hidden" name="id" value="{{ $respon->id }}">
                                                        <button onclick="return confirm('anda yakin ingin menghapus?')"
                                                            type=" submit" class="btn btn-danger">Delete</button>
                                                    </form>

                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    @else
                        <div class="alert alert-primary d-flex align-items-center w-100 mt-3" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                role="img" aria-label="Warning:">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <div>
                                Data kosong
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 justify-content-center d-flex">
                    {{ $responsList->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Jawaban</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        @method("POST")
                        <input type="hidden" value="{{ $id }}" name="idlist">
                        <div class="mb-3">
                            <label for="jawaban" class="form-label">jawaban</label>
                            <textarea name="jawaban" class="form-control" id="jawaban"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Author</label>
                            <input disabled type="text" name="user_id" value="{{ Auth::user()->name }}"
                                class="form-control" id="user_id">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-m-layout-v2>
