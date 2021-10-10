 <!-- navbar -->
 <nav class="navbar navbar-expand-lg navbar-light dark">
     <div class="container">
         <a class="navbar-brand nav-logo" href="{{ route('home') }}">
             <img src="{{ asset('img/welcome/genbi-sultra.png') }}" width="45" alt="">
         </a>

         <a class="navbar-brand nav-brand" href="{{ route('home') }}">GenBI Sultra</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a class="nav-link top-nav active" aria-current="page" href="{{ route('home') }}">Home</a>

                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle top-nav" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Posts
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <li><a class="dropdown-item" href="{{ route('my-brain') }}">My Brain</a></li>
                         <li><a class="dropdown-item" href="{{ route('show-posts') }}">Post</a></li>

                     </ul>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link top-nav" href="{{ route('bea-info') }}">Beasiswa BI</a>

                 </li>
                 <li class="nav-item">
                     <a class="nav-link top-nav" href="{{ route('show-kegiatan') }}">Kegiatan</a>


                 </li>

                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle top-nav" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         About Us
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <li><a class="dropdown-item" href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                         <li><a class="dropdown-item" href="#">Karya Kami</a></li>
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
                     <a href="{{ route('login') }}" class="nav-link">Login</a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('register') }}" class="nav-link">Register</a>
                 </li>
                 @endif

             </ul>
         </div>
     </div>
 </nav>
