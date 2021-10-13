 <!-- Sidebar -->
 <style>
     .nav-item.active {
         border-left: 4px solid #3d5af1;
     }

 </style>

 <ul class="navbar-nav sidebar sidebar-light accordion shadow-sm" style="background-color: white" id="accordionSidebar">
     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-sliders-h"></i>

         </div>
         <div class="sidebar-brand-text mx-3">GenBI Sultra</div>
     </a>

     <!-- Divider -->
     <div class="sidebar-heading mt-2">
         Dashboard
     </div>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{request()->is("dashboard")? "active":""}}">

         <a class="nav-link" href="{{ route('dashboard') }}">

             <i class="fas fa-diagnoses"></i>

             <span>Dashboard</span></a>
     </li>
     <div class="sidebar-heading mt-2">
         Users
     </div>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{request()->segment(1)== "user"? "active":""}}">


         <a class="nav-link" href="{{ route('user-profile') }}">

             <i class="fas fa-fw fa-user"></i>
             <span>User Profile</span></a>
     </li>
     {{-- devisi --}}
     @role(['admin',"super"])

     <div class="sidebar-heading mt-2">
         Devisi
     </div>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{request()->segment(1)== "devisi"? "active":""}}">


         <a class="nav-link" href="{{ route('show-devisi') }}">

             <i class="fas fa-glasses"></i>

             <span>Devisi GenBI</span></a>
     </li>
     @endrole
     {{-- devisi --}}

     @role(["super"])
     {{-- manage access --}}
     <div class="sidebar-heading mt-2">
         Manage access
     </div>

     <li class="nav-item {{request()->segment(1)== "manage"? "active":""}} {{request()->is("/dashboard")? "active":""}}">
         <a class="nav-link " href="#" data-toggle="collapse" data-target="#user-manage" aria-expanded="true" aria-controls="user-manage">
             <i class="fas fa-user-cog"></i>
             <span>User management</span>
         </a>
         <div id="user-manage" class="collapse {{request()->segment(1)== "manage"? "show active":""}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="">
             <div class="bg-white collapse-inner rounded">
                 <h6 class="collapse-header">Manage users:</h6>
                 <a class="collapse-item {{request()->is("my-post")? "active":""}}" href="{{ route('my-post') }}">Role</a>
                 <a class="collapse-item {{request()->is("manage/users")? "active":""}}" href="{{ route('manage-user') }}"> <i class="fas fa-user-tag"></i> Set Role users</a>
             </div>
         </div>
     </li>
     {{-- close manage access --}}

     @endrole
     <div class="sidebar-heading mt-2">
         My brain
     </div>
     <li class="nav-item {{request()->segment(1)== "my-brain"? "active":""}}">

         <a class="nav-link" href="#" data-toggle="collapse" data-target="#my-brain" aria-expanded="true" aria-controls="my-brain">
             <i class="fas fa-brain"></i>
             <span>My Brain</span>
         </a>
         <div id="my-brain" class="collapse {{request()->segment(1)== "my-brain"? "show":""}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="">

             <div class="bg-white collapse-inner rounded">
                 <h6 class="collapse-header">Manage my brain:</h6>
                 {{-- <a class="collapse-item {{request()->is("write-brain")? "active":""}}" href="{{ route('write-brain') }}">Create my brain</a> --}}
                 <a class="collapse-item {{request()->route()->getName() ==="my-post" ? "active":""}}" href="{{ route('my-post') }}">My post</a>


             </div>
         </div>
     </li>
     {{-- kegaitan --}}
     @role(['admin',"super"])

     <div class="sidebar-heading mt-2">
         Kegiatan
     </div>
     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{request()->segment(1)== "kegiatan" && request()->segment(2) != "jenis"? "active":""}}">
         <a class="nav-link" href="#" data-toggle="collapse" data-target="#kegiatan" aria-expanded="true" aria-controls="kegiatan">
             <i class="fas fa-fire-alt"></i>

             <span>Kegiatan</span>
         </a>

         <div id="kegiatan" class="collapse {{request()->segment(1)== "kegiatan" && request()->segment(2)=="manage"? "show":""}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="">

             <div class="bg-white collapse-inner rounded">
                 <h6 class="collapse-header">Manage Kegiatan:</h6>
                 {{-- <a class="collapse-item {{request()->is("write-brain")? "active":""}}" href="{{ route('create-kegiatan') }}">Create Kegiatan</a> --}}
                 <a class="collapse-item {{request()->route()->getName() ==="mypost-kegiatan" ? "active":""}}" href="{{ route('mypost-kegiatan') }}">My post</a>
                 <a class="collapse-item {{request()->segment(2)== "jenis"? "active":""}}" href="{{ route('show-jenis-kegiatan') }}"> <i class="fab fa-slack-hash"></i> Type Kegiatan</a>




             </div>
         </div>
     </li>
     @endrole
     {{-- close kegaitan --}}

     <div class="sidebar-heading mt-2">
         Posts
     </div>
     <li class="nav-item {{request()->segment(1)== "post"? "active":""}}">

         <a class="nav-link" href="#" data-toggle="collapse" data-target="#posts" aria-expanded="true" aria-controls="posts">
             <i class="far fa-newspaper"></i>
             <span>Posts User</span>
         </a>

         <div id="posts" class="collapse {{request()->segment(1)== "post"? "show":""}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="">
             <div class="bg-white collapse-inner rounded">
                 <h6 class="collapse-header">Posts</h6>
                 <a class="collapse-item {{request()->route()->getName() ==="my-posts" ? "active":""}}" href="{{ route('my-posts') }}">My post</a>
                 @role(['admin',"super"])
                 <a class="collapse-item {{request()->route()->getName() ==="category-posts" ? "active":""}}" href="{{ route('category-posts') }}">
                     <i class="fab fa-slack-hash"></i>
                     Category Post
                 </a>
                 @endrole
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->
