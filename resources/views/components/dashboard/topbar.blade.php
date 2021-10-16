      @php
          use App\Models\User;
          $user = User::find(Auth::user()->id)->first();

          $img = $user->profile->foto_profile ?? null;

      @endphp
      <nav class="navbar navbar-expand navbar-light bg-white topbar static-top">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-search fa-fw"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                      aria-labelledby="searchDropdown">
                      <form class="form-inline mr-auto w-100 navbar-search">
                          <div class="input-group">
                              <input type="text" class="form-control bg-light border-0 small"
                                  placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                              <div class="input-group-append">
                                  <button class="btn btn-primary" type="button">
                                      <i class="fas fa-search fa-sm"></i>
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </li>


              <div class="topbar-divider d-none d-sm-block"></div>


              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <span
                          class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $user->nama ?? (Auth::user()->name ?? '') }}</span>


                      <img class="img-profile rounded-circle"
                          src="{{ $img ? asset('storage/' . $img) : 'https://images.pexels.com/photos/6919779/pexels-photo-6919779.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500' }}">



                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                      aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="#">
                          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                          Profile
                      </a>
                      <a class="dropdown-item" href="#">
                          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                          Settings
                      </a>
                      <a class="dropdown-item" href="#">
                          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                          Activity Log
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                      </a>
                  </div>
              </li>
          </ul>

      </nav>
      <div class="bg-white mb-4 px-4 d-flex justify-content-between py-2">
          <div class="left">
              <h5>{{ $title_page ?? '' }}</h5>
          </div>

      </div>
