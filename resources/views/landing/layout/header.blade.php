<!-- header begin -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="{{url('/')}}">
                                <img alt="" class="logo" src="{{asset('web/images/logo-light.png')}}" />
                                <img alt="" class="logo-2" src="{{asset('web/images/logo.png')}}" />
                             </a>
                        </div>
                        <!-- logo close -->
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <!-- mainmenu begin -->
                        <ul id="mainmenu">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="#">Layanan Pemantauan</a>
                                <ul>
                                    <li><a href="{{route("pengendalianintern")}}">Pengendalian Intern</a></li>
                                    <li><a href="{{route("pengaduan")}}">Pengaduan Resmi</a></li>
                                    <li><a href="{{route("pengelolaanrisiko")}}">Pengelolaan Risiko</a></li>
                                    <li><a href="{{route("tinjut")}}">Tindak Lanjut</a></li>
                                    <li><a href="{{route("advokasi")}}">Advokasi</a></li>
                                </ul>
                            </li>
                            @if(Auth::check())
                            <li><a href="{{route("logout")}}">Logout</a></li>
                            @else
                            <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                            @endif
                        </ul>
                        <!-- mainmenu close -->
                    </div>
                    <div class="de-flex-col">
                        <div class="h-phone md-hide"><span>Need&nbsp;Help?</span><i class="fa fa-phone"></i> 1
                            200 300 9000</div>
                        <span id="menu-btn"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header close -->
