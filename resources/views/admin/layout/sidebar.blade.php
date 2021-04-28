
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url("/")}}" class="brand-link">
        <img src="{{asset('admin/img/logoAAI-crop.png')}}" alt="App Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">LP Kimra</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                @if(in_array(Auth::user()->role, ['admin', 'superuser']))
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link @if($title=='Dashboard') active @endif">
                        <i class="nav-icon fas fa-home"></i>
                            <p>
                            Dashboard
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{route('resetpass')}}" class="nav-link @if($title=='Reset Password') active @endif">
                    <i class="nav-icon fas fa-key"></i>
                        <p>
                        Reset Password
                        </p>
                    </a>
                </li>

                <li class="nav-header">Pemantauan Advokasi</li>
                <li class="nav-item">
                    <a href="{{route('perkara')}}" class="nav-link @if($title=='Perkara Advokasi') active @endif">
                    <i class="nav-icon fas fa-book"></i>
                        <p>
                            Perkara
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sidangperkara')}}" class="nav-link @if($title=='Sidang Perkara') active @endif">
                    <i class="nav-icon fas fa-gavel"></i>
                        <p>
                            Sidang Perkara
                        </p>
                    </a>
                </li>
                @if(in_array(Auth::user()->role, ['admin', 'superuser']))
                <li class="nav-item">
                    <a href="{{route('jenisperkara')}}" class="nav-link @if($title=='Jenis Perkara') active @endif">
                    <i class="nav-icon fas fa-database"></i>
                        <p>
                        Jenis Perkara
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-header">Pemantauan Pengaduan</li>
                <li class="nav-item">
                    <a href="{{route('aduan')}}" class="nav-link @if($title=='Pengaduan') active @endif">
                    <i class="nav-icon fas fa-paper-plane"></i>
                        <p>
                            Pengaduan
                        </p>
                    </a>
                </li>
                @if(in_array(Auth::user()->role, ['admin', 'superuser']))
                <li class="nav-item">
                    <a href="{{route('jenisaduan')}}" class="nav-link @if($title=='Jenis Aduan') active @endif">
                    <i class="nav-icon fas fa-database"></i>
                        <p>
                            Jenis Aduan
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-header">Tindak Lanjut</li>
                <li class="nav-item">
                    <a href="{{route('tindaklanjut')}}" class="nav-link @if($title=='Tindak Lanjut') active @endif">
                    <i class="nav-icon fas fa-search"></i>
                        <p>
                            Data Tindak Lanjut
                        </p>
                    </a>
                </li>
                @if(in_array(Auth::user()->role, ['admin', 'superuser']))
                <li class="nav-item">
                    <a href="{{route('jenisstatustinjut')}}" class="nav-link @if($title=='Jenis Status Tinjut') active @endif">
                    <i class="nav-icon fas fa-database"></i>
                        <p>
                            Jenis Status
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('jenispemeriksaantinjut')}}" class="nav-link @if($title=='Jenis Pemeriksaan Tinjut') active @endif">
                    <i class="nav-icon fas fa-database"></i>
                        <p>
                            Jenis Pemeriksaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('aparat')}}" class="nav-link @if($title=='Aparat Pemeriksa') active @endif">
                    <i class="nav-icon fas fa-database"></i>
                        <p>
                            Aparat Pemeriksa
                        </p>
                    </a>
                </li>
                @endif

                @if(in_array(Auth::user()->role, ['admin', 'superuser']))
                    <li class="nav-header">File Referensi</li>
                    <li class="nav-item">
                        <a href="{{route('peraturan')}}" class="nav-link @if($title=='Peraturan') active @endif">
                        <i class="nav-icon fas fa-book"></i>
                            <p>
                            Peraturan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('kajianhukum')}}" class="nav-link @if($title=='Kajian Hukum') active @endif">
                        <i class="nav-icon fas fa-file"></i>
                            <p>
                            Kajian Hukum
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Data Pokok</li>
                    <li class="nav-item">
                        <a href="{{route('user')}}" class="nav-link @if($title=='User') active @endif">
                        <i class="nav-icon fas fa-users"></i>
                            <p>
                            User
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('unit')}}" class="nav-link @if($title=='Unit') active @endif">
                        <i class="nav-icon fas fa-building"></i>
                            <p>
                            Unit
                            </p>
                        </a>
                    </li>
                @endif

                    {{-- <li class="nav-item has-treeview">
                        <a href="#" class="nav-link @if($title=='Jenis Perkara') active @endif">
                            <i class="nav-icon fas fa-gavel"></i>
                            <p>
                                Pemantauan Advokasi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('jenisperkara')}}" class="nav-link @if($title=='Jenis Perkara') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>
                                    Jenis Perkara
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link @if($title=='Peraturan' || $title=='Kajian Hukum') active @endif">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                File Referensi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('peraturan')}}" class="nav-link @if($title=='Peraturan') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>
                                    Peraturan
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('kajianhukum')}}" class="nav-link @if($title=='Kajian Hukum') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>
                                    Kajian Hukum
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item">
                        <a href="{{route('references.index')}}" class="nav-link @if($menu=='reference') active @endif">
                        <i class="nav-icon fas fa-book"></i>
                            <p>
                            Referensi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('budgetvideo.index')}}" class="nav-link @if($menu=='budgetvideo') active @endif">
                        <i class="nav-icon fa fa-database"></i>
                        <p>
                            Budget Video
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('budgetblog.index')}}" class="nav-link @if($menu=='budgetblog') active @endif">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>
                            Budget Blog
                        </p>
                        </a>
                    </li>

                    <li class="nav-header">Berita dan Acara</li>
                    <li class="nav-item">
                        <a href="{{route('event.index')}}" class="nav-link @if($menu=='event') active @endif">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            Event
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('news.index')}}" class="nav-link @if($menu=='news') active @endif">
                        <i class="nav-icon fa fa-newspaper"></i>
                        <p>
                            News
                        </p>
                        </a>
                    </li>

                    <li class="nav-header">Manajemen User</li>
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link @if($menu=='user') active @endif">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Users
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('pertanyaan.index')}}" class="nav-link @if($menu=='tanyajawab') active @endif">
                        <i class="nav-icon fa fa-question"></i>
                        <p>
                            Tanya Jawab
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('transaction.index')}}" class="nav-link @if($menu=='transaction') active @endif">
                        <i class="nav-icon fa fa-exchange-alt"></i>
                        <p>
                            Transaction
                        </p>
                        </a>
                    </li>--}}
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
