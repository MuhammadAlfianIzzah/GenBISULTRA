<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top py-4">

    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img style="width: 120px" src="{{ asset('img/logo.png') }}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>

                </li>
                <li class=" nav-item">
                    <a class="nav-link" href="{{ route('my-brain') }}">My brain</a>
                </li>
                <li class="nav-item">
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                            Post
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="{{ route('show-posts') }}">Post User</a></li>


                            <li><a class="dropdown-item" href="">Sharing ~ source</a></li>
                        </ul>
                    </div>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="kegiatan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kegiatan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kegiatan">
                        <li><a class="dropdown-item" href="{{ route('berita-kegiatan') }}">Berita Kegiatan</a></li>

                        <li><a class="dropdown-item" href="#">Events ♨️</a></li>

                        <li><a class="dropdown-item" href="{{ route('galery-genbi') }}">Gallery</a></li>
                    </ul>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="kegiatan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About Us
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kegiatan">
                        <li><a class="dropdown-item" href="#">Tentang kami</a></li>

                        <li><a class="dropdown-item" href="#">Kontak</a></li>

                        <li><a class="dropdown-item" href="{{ route('galery-genbi') }}">Karya kami</a></li>
                    </ul>

                </li>

            </ul>

            <ul class="navbar-nav">
                @if(Auth::check())
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                </li>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method("post")
                    <button type="submit" class="btn btn-danger">Logout</button>

                </form>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link active">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
