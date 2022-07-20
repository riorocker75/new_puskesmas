 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/')}}" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

     
      <!-- Notifications Dropdown Menu -->
      
    
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
          <div class="dropdown-divider"></div>
          <a href="{{url('/logout')}}" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Keluar
          </a>
         
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->


  {{-- sidebar mulai --}}
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{url('/')}}/logo/logoAs.png" alt="Simelue Tengah" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Simelue Tengah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
          <a href="#" class="d-block">{{" Nama" }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/dashboard/pasien/data')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pasien</p>
                </a>
              </li>
               <!-- <li class="nav-item">
                <a href="{{url('/dashboard/dokter/data')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Dokter</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="{{url('/dashboard/pegawai/data')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pegawai</p>
                </a>
              </li> -->
                 <li class="nav-item">
                <a href="{{url('/dashboard/poli/data')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Poli</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="{{url('/dashboard/rekam/data')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Rekam Medis</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="{{url('/dashboard/rujukan/data')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Surat Rujukan</p>
                </a>
              </li> -->

              <li class="nav-item">
                <a href="{{url('/dashboard/kunjungan/data')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kunjungan Pasien</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="{{url('/dashboard/role/data')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Role</p>
                </a>
              </li>
            </ul>
          </li>
       

             <!-- <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Profile Puskesmas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{url('/dashboard/pelayanan')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pelayanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dashboard/visi-misi')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visi Misi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dashboard/struktur')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Struktur</p>
                </a>
              
              </li>
               <li class="nav-item">
                <a href="{{url('/dashboard/galeri')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri</p>
                </a>
              
              </li>
            </ul> -->
             <li class="nav-item">
                <a href="{{url('/dashboard/pengaturan/data')}}" class="nav-link ">
                 <i class="fa fa-lock nav-icon" aria-hidden="true"></i>
                  <p> Ganti Password</p>
                </a>
              </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>