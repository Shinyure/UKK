<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
                <div class="sidebar-brand-icon" style="margin-top: 80px;">
                    <img src="{{asset('ATRBPNLOGO.png') }}" alt="" style="width: 150px; height: 150px;">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-5">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('absensi.index')}}">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Absensi</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('karyawan.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Karyawan</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('pembukuan.index')}}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Pembukuan Absensi</span></a>
            </li>

            <!-- Divider -->
         

        </ul>