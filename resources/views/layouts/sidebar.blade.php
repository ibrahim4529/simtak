<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>@if(Auth::user()) {{Auth::user()->nama}} @endif</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if(Route::is('home')) active @endif">
                <a href="{{route('home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @if(Auth::user()->isAdmin())
                <li class="treeview @if(Request::is('data/*')) active @endif">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Master Data</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@if(Route::is('user.index')) active @endif"><a href="{{route('user.index')}}"><i
                                    class="fa fa-user"></i> Data Admin</a></li>
                        <li class="@if(Route::is('level-user.index')) active @endif"><a
                                href="{{route('level-user.index')}}"><i class="fa fa-level-up"></i> Data Level User</a>
                        </li>
                        <li class="@if(Route::is('prodi.index')) active @endif"><a href="{{route('prodi.index')}}"><i
                                    class="fa fa-institution"></i> Data Program Studi</a></li>
                        <li class="@if(Route::is('data.dosen')) active @endif"><a href="{{route('data.dosen')}}"><i
                                    class="fa fa-mortar-board"></i> Data Dosen</a></li>
                        <li class="@if(Route::is('data.mahasiswa')) active @endif"><a
                                href="{{route('data.mahasiswa')}}"><i
                                    class="fa fa-male"></i> Data Mahasiswa</a></li>
                    </ul>
                </li>
            @endif
            <li class="treeview @if(Request::is('manajemen/*')) active @endif">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Managemen KP dan TA</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Route::is('ta.index')) active @endif"><a href="{{route('ta.index')}}"><i
                                class="fa fa-check-circle"></i>Daftar Pengajuan TA</a></li>

                    @if(Auth::user()->selesai_ta() || Auth::user()->isAdmin() || Auth::user()->isDosen())
                        <li class="@if(Route::is('seminar-ta.index')) active @endif"><a
                                href="{{route('seminar-ta.index')}}"><i class="fa fa-check-circle"></i>Daftar Seminar TA</a>
                        </li>
                    @endif
                    @if(Auth::user()->selesai_seminar_ta() || Auth::user()->isAdmin() || Auth::user()->isDosen())
                        <li class="@if(Route::is('sidang-ta.index')) active @endif"><a
                                href="{{route('sidang-ta.index')}}"><i class="fa fa-check-circle"></i>Daftar Sidang
                                TA</a>
                        </li>
                    @endif
                    @if(Auth::user()->selesai_sidang_ta() || Auth::user()->isAdmin() || Auth::user()->isDosen())
                        <li class="@if(Route::is('yudisium.index')) active @endif"><a
                                href="{{route('yudisium.index')}}"><i class="fa fa-check-circle"></i>Daftar Yudisium</a>
                        </li>
                    @endif

                </ul>
            </li>
            <li class="treeview @if(Request::is('laporan/*')) active @endif">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Laporan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Route::is('ta.index')) active @endif"><a href="{{route('ta.index')}}"><i
                                class="fa fa-check-circle"></i>Status Mahasiswa Tingkat Ahir</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
