 {{-- <!-- navbar -->
 <nav class="navbar navbar-expand-lg navbar-light dark">
     <div class="container">
         <a class="navbar-brand nav-logo" href="{{ route('home') }}">
             <img src="{{ asset('img/welcome/genbi-sultra.png') }}" width="45" alt="">
         </a>

         <a class="navbar-brand nav-brand" href="{{ route('home') }}">GenBI Sultra</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a class="nav-link top-nav active" aria-current="page" href="{{ route('home') }}">Home</a>

                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle top-nav" href="#" id="navbarDropdown" role="button"
                         data-bs-toggle="dropdown" aria-expanded="false">
                         Posts
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <li><a class="dropdown-item" href="{{ route('my-brain') }}">My Brain <span
                                     class="badge bg-danger"><i class="fab fa-hotjar"></i></span></a></li>
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
                     <a class="nav-link dropdown-toggle top-nav" href="#" id="navbarDropdown" role="button"
                         data-bs-toggle="dropdown" aria-expanded="false">
                         About Us
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <li><a class="dropdown-item" href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                         <li><a class="dropdown-item" href="#">Karya Kami</a></li>

                         <li>
                             <a class="dropdown-item" href="{{ route('aplikasi') }}">Aplikasi
                                 <span class="badge rounded-pill bg-primary">New</span>
                             </a>
                         </li>
                         <li><a class="dropdown-item" href="{{ route('users-genbi') }}">Pengguna</a></li>
                     </ul>
                 </li>

             </ul>
             <ul class="navbar-nav">
                 @if (Auth::check())
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
 </nav> --}}
 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
     <div class="offcanvas-header">

         <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body d-flex flex-column flex-shrink-0 p-3">
         <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
             <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                 <i class="fas fa-bars"></i>
                 <span class="fs-5 fw-semibold ms-2"> Menu</span>
             </a>
             <ul class="list-unstyled ps-0">
                 <li class="mb-1">
                     <a class="nav-link text-dark fs-6" href="{{ route('home') }}">Home</a>


                 </li>
                 <li class="mb-1">
                     <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                         data-bs-target="#posts" aria-expanded="false">
                         Posts
                     </button>
                     <div class="collapse" id="posts">
                         <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                             <li><a href="{{ route('my-brain') }}" class="link-dark rounded py-2">My brain</a></li>
                             <li><a href="{{ route('show-posts') }}" class="link-dark rounded py-2 active">Post</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="mb-1">
                     <a class="nav-link text-dark fs-6" href="{{ route('bea-info') }}">Informasi</a>
                 </li>
                 <li class="mb-1">
                     <a class="nav-link top-nav active" href="{{ route('show-kegiatan') }}">Kegiatan</a>
                 </li>
                 <li class="mb-1">
                     <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                         data-bs-target="#about" aria-expanded="false">
                         About Us
                     </button>
                     <div class="collapse" id="about">
                         <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                             <li>
                                 <a href="{{ route('tentang-kami') }}" class="link-dark rounded py-2"> Tentang
                                     Kami</a>
                             </li>
                             <li><a href="#" class="link-dark rounded py-2 active">Karya Kami</a></li>
                             <li><a href="{{ route('aplikasi') }}" class="link-dark rounded py-2 active">Aplikasi
                                     <span class="badge rounded-pill bg-primary">New</span></a></li>
                             <li><a href="{{ route('users-genbi') }}"
                                     class="link-dark rounded py-2 active">Pengguna</a></li>
                         </ul>

                     </div>
                 </li>
                 @if (Auth::check())
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
 </div>
 <div class="fixed-top">
     <nav class="navbar navbar-light bg-light">
         <div class="container">
             <a class="navbar-brand" href="{{ route('home') }}">
                 <img src="{{ asset('img/welcome/genbi-sultra.png') }}" alt=""
                     style="height: 30px;object-fit: contain" class="img-fluid">
                 GenBI Sultra
             </a>
             <div class="d-flex">
                 <a target="_blank" href="https://web.facebook.com/genbi.sultra" style="width: 30px;height: 30px;">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-facebook" viewBox="0 0 16 16">
                         <path
                             d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                         </path>
                     </svg>
                 </a>

                 <a target="_blank" href="https://www.instagram.com/genbisultra/?hl=id"
                     style="width: 30px;height: 30px;">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-instagram" viewBox="0 0 16 16">
                         <path
                             d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                         </path>
                     </svg>
                 </a>
                 <a target="_blank" href="https://www.instagram.com/genbisultra/?hl=id"
                     style="width: 30px;height: 30px;">
                     <i class="fab fa-youtube"></i>
                 </a>
                 <a target="_blank" href="https://github.com/MuhammadAlfianIzzah" style="width: 30px;height: 30px;">
                     <i class="fab fa-github"></i>
                 </a>
             </div>
         </div>
     </nav>
     <nav class="navbar navbar-expand-lg bg-primary">
         <div class="container">
             <button class="btn btn-primary navbar-toggler" type="button" data-bs-toggle="offcanvas"
                 data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">

                 <svg class="img-fluid" width="20" height="20" viewBox="0 0 394 282" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                     <rect x="80" width="314" height="74" rx="20" fill="white" />
                     <path
                         d="M0 124C0 112.954 8.95431 104 20 104H374C385.046 104 394 112.954 394 124V158C394 169.046 385.046 178 374 178H20C8.9543 178 0 169.046 0 158V124Z"
                         fill="white" />
                     <path
                         d="M0 228C0 216.954 8.95431 208 20 208H304C315.046 208 324 216.954 324 228V262C324 273.046 315.046 282 304 282H20C8.95431 282 0 273.046 0 262V228Z"
                         fill="white" />
                     <circle cx="367.5" cy="245.5" r="26.5" fill="#18A0DC" />
                     <circle cx="27" cy="37" r="27" fill="#FF969A" />
                 </svg>
                 Menu
             </button>

             <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

                 <ul class="navbar-nav">

                     <li class="nav-item">
                         <a class="nav-link top-nav active" aria-current="page" href="{{ route('home') }}">Home</a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle top-nav" href="#" id="navbarDropdown" role="button"
                             data-bs-toggle="dropdown" aria-expanded="false">
                             Posts
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <li><a class="dropdown-item" href="{{ route('my-brain') }}">My Brain <span
                                         class="badge bg-danger"><i class="fab fa-hotjar"></i></span></a></li>
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
                         <a class="nav-link dropdown-toggle top-nav" href="#" id="navbarDropdown" role="button"
                             data-bs-toggle="dropdown" aria-expanded="false">
                             About Us
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <li><a class="dropdown-item" href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                             <li><a class="dropdown-item" href="#">Karya Kami</a></li>

                             <li>
                                 <a class="dropdown-item" href="{{ route('aplikasi') }}">Aplikasi
                                     <span class="badge rounded-pill bg-primary">New</span>
                                 </a>
                             </li>
                             <li><a class="dropdown-item" href="{{ route('users-genbi') }}">Pengguna</a></li>
                         </ul>
                     </li>

                 </ul>
                 <ul class="navbar-nav">
                     @if (Auth::check())
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
 </div>
