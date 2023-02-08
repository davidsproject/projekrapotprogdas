<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('/')}}" class="brand-link">
    <img src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">MENUS</li>
        <li class="nav-item">
          <a href="{{url('home')}}" class="nav-link {{ ($title == "Dashboard") ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <!-- <span class="badge badge-info right">2</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link {{ ($title == "Siswa Create" || $title == "Siswa Edit" || $title == "Siswa Index") ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Siswa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('siswa.index')}}" class="nav-link {{ ($title == "Siswa Index") ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('siswa.create')}}" class="nav-link {{ ($title == "Siswa Create") ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link {{ ($title == "Pelaporan Create" || $title == "Pelaporan Edit" || $title == "Pelaporan Index") ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Pelaporan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('pelaporan.index')}}" class="nav-link {{ ($title == "Pelaporan Index") ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Index</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('pelaporan.create')}}" class="nav-link {{ ($title == "Pelaporan Create") ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ ($title == "Kategori Create" || $title == "Kategori Edit" || $title == "Kategori Index") ? 'active' : '' }}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Kategori
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('kategori.index')}}" class="nav-link {{ ($title == "Kategori Index") ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Index</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('kategori.create')}}" class="nav-link {{ ($title == "Kategori Create") ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link {{ ($title == "Aspirasi Create" || $title == "Aspirasi Edit" || $title == "Aspirasi Index") ? 'active' : '' }}">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>
                      Aspirasi
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('aspirasi.index')}}" class="nav-link {{ ($title == "Aspirasi Index") ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Index</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('aspirasi.create')}}" class="nav-link {{ ($title == "Aspirasi Create") ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                      </a>
                    </li>

                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                    <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                    <p>Logout</p>
                  </a>
                </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<div class="modal fade" id="logoutModal">
  <div class="modal-dialog" >
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class = "modal-title" id = "exampleModalLabel">Logout</h5>
                      <button type="button" class = "close" data-dismiss = "modal" aria-label = "Close">
                        <span aria-hidden = "true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Apakah Anda Yakin Untuk Logout?
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
                  </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
