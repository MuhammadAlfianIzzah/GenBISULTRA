<x-m-layout-v2>
    <div class="bg-white py-4">
        <div>
            <div class="h-100 p-5 text-dark bg-light text-center rounded-3">
                <h2>User GenBI SULTRA</h2>
                <p>~ GenBI SULAWESI TENGGARA ~</p>
            </div>
        </div>
    </div>
    <div class="bg-white py-4">
        <div class="container">
            <div class="row ">
                @foreach ($users as $user)
                    <div class="col-4">
                        <div class="card">
                            <img onerror="this.onerror=null;this.src='img/notfound.png';"
                                style="max-height: 200px;object-fit: contain"
                                src="{{ asset("storage/$user->foto_profile") }}" class="card-img-top" alt="...">
                            <div class="card-header text-center">
                                <a href="{{ route('users-search', $user->nama) }}">
                                    {{ $user->nama }}
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <p class="card-text">Dibuat sejak {{ $user->created_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-m-layout-v2>
