<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="icon" href="{{asset('person.png')}}">


</head>



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ ($title == "Dashboard") ? 'active' : '' }}">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            @if(Auth::user()->role == 0)
            <li class="nav-item {{ ($title == "Pengaduan Create" || $title == "Pengaduan Edit" || $title == "Pengaduan Index") ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pengaduan</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ ($title == "Pengaduan Create") ? 'active' : '' }}" href="{{route('pengaduan.create')}}">Create</a>
                        <a class="collapse-item {{ ($title == "Pengaduan Index") ? 'active' : '' }}" href="{{route('pengaduanUser')}}">List</a>
                    </div>
                </div>
            </li>
            @elseif(Auth::user()->role == 1)
            <li class="nav-item {{ ($title == "Pengaduan Create" || $title == "Pengaduan Edit" || $title == "Pengaduan Index") ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pengaduan</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ ($title == "Pengaduan Create") ? 'active' : '' }}" href="{{route('pengaduan.create')}}">Create</a>
                        <a class="collapse-item {{ ($title == "Pengaduan Index") ? 'active' : '' }}" href="{{route('pengaduan.index')}}">List</a>
                    </div>
                </div>
            </li>
            @else
            <li class="nav-item {{ ($title == "Pengaduan Create" || $title == "Pengaduan Edit" || $title == "Pengaduan Index") ? 'active' : '' }}">
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                      aria-expanded="true" aria-controls="collapsePages">
                      <i class="fas fa-fw fa-folder"></i>
                      <span>Pengaduan</span>
                  </a>
                  <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                          <a class="collapse-item {{ ($title == "Pengaduan Create") ? 'active' : '' }}" href="{{route('pengaduan.create')}}">Create</a>
                          <a class="collapse-item {{ ($title == "Pengaduan Index") ? 'active' : '' }}" href="{{route('pengaduan.index')}}">List</a>
                      </div>
                  </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ ($title == "Role Create" || $title == "Role Edit" || $title == "Role Index") ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Role</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ ($title == "Role Create") ? 'active' : '' }}" href="{{route('role.create')}}">Create</a>
                        <a class="collapse-item {{ ($title == "Role Index") ? 'active' : '' }}" href="{{route('role.index')}}">List</a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{ ($title == "Permission Create" || $title == "Permission Edit" || $title == "Permission Index") ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Permission</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ ($title == "Permission Create") ? 'active' : '' }}" href="{{route('permission.create')}}">Create</a>
                        <a class="collapse-item {{ ($title == "Permission Index") ? 'active' : '' }}" href="{{route('permission.index')}}">List</a>
                    </div>
                </div>
            </li>

            {{-- <li class="nav-item {{ ($title == "Tanggapan Create" || $title == "Tanggapan Edit" || $title == "Tanggapan Index") ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Tanggapan</span>
                </a>
                <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ ($title == "Tanggapan Create") ? 'active' : '' }}" href="{{route('tanggapan.create')}}">Create</a>
                        <a class="collapse-item {{ ($title == "Tanggapan Index") ? 'active' : '' }}" href="{{route('tanggapan.index')}}">List</a>
                    </div>
                </div>
            </li> --}}

            <li class="nav-item {{ ($title == "Laporan") ? 'active' : '' }}">
                <a class="nav-link" href="{{url('laporan')}}">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Laporan</span>
                </a>
            </li>
          @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
