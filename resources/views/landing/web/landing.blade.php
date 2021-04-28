@extends('web')

@section('content')
    <section id="section-highlight" class="relative text-light" data-bgcolor="#FFFFFF">
        <div class="container" style="padding-top: 20px">
            <div class="row align-items-center">
                <div class="col-md-4">
                    {{-- <span class="p-title">Welcome</span><br> --}}
                    <h2 style="color: #454545">
                        Layanan<br>Pemantauan<br>KIMRA
                    </h2>
                    <div class="small-border sm-left"></div>
                </div>
                <div class="col-md-8" style="color: #454545">
                    <p>Sistem Layanan Pemantauan Kepatuhan Internal, Manajemen Risiko, dan Advokasi merupakan salah satu
                        bentuk layanan pada bagian KIMRA dalam menjamin dan memenuhi hak hukum Kementerian Keuangan RI
                        serta aparaturnya dalam bentuk pendampingan, penanganan perkara, dan pendapat hukum.
                        Pelayanan bantuan hukum diberikan antara lain pelayanan bantuan hukum litigasi dan litigasi berkenaan
                        dengan tugas dan fungsi Kementerian Keuangan.
                    </p>
                </div>
            </div>
            <div class="spacer-double"></div>
        </div>
    </section>
    <section class="no-top relative z1000">
        <div class="container">
            <div class="row mt-100">
                <div class="col-md-4 mb-sm-30 wow fadeInRight" data-wow-delay=".2s">
                    <div class="mask rounded">
                        <div class="cover rounded">
                            <div class="c-inner">
                                <h3>Pemantauan Pengendalian Intern</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="spacer20"></div>
                                <a href="{{route("pengendalianintern")}}" class="btn-custom capsule">Read more</a>
                            </div>
                        </div>
                        <img src="{{asset('web/images/services/1.jpg')}}" alt="" class="img-responsive" />
                    </div>
                </div>
                <div class="col-md-4 mb-sm-30 wow fadeInRight" data-wow-delay=".4s">
                    <div class="mask rounded">
                        <div class="cover rounded">
                            <div class="c-inner">
                                <h3>Pemantauan Pengaduan</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="spacer20"></div>
                                <a href="{{route("pengaduan")}}" class="btn-custom capsule">Read more</a>
                            </div>
                        </div>
                        <img src="{{asset('web/images/services/2.jpg')}}" alt="" class="img-responsive" />
                    </div>
                </div>
                <div class="col-md-4 mb-sm-30 wow fadeInRight" data-wow-delay=".6s">
                    <div class="mask rounded">
                        <div class="cover rounded">
                            <div class="c-inner">
                                <h3>Pemantauan Pengelolaan Risiko</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="spacer20"></div>
                                <a href="{{route("pengelolaanrisiko")}}" class="btn-custom capsule">Read more</a>
                            </div>
                        </div>
                        <img src="{{asset('web/images/services/3.jpg')}}" alt="" class="img-responsive" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-0 col-xs-0 wow fadeInRight" data-wow-delay=".2s">

                </div>
                <div class="col-md-4 mb-sm-30 wow fadeInRight" data-wow-delay=".2s">
                    <div class="mask rounded">
                        <div class="cover rounded">
                            <div class="c-inner">
                                <h3>Pemantauan Tindak Lanjut</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="spacer20"></div>
                                <a href="{{route("tinjut")}}" class="btn-custom capsule">Read more</a>
                            </div>
                        </div>
                        <img src="{{asset('web/images/services/1.jpg')}}" alt="" class="img-responsive" />
                    </div>
                </div>
                <div class="col-md-4 mb-sm-30 wow fadeInRight" data-wow-delay=".4s">
                    <div class="mask rounded">
                        <div class="cover rounded">
                            <div class="c-inner">
                                <h3>Pemantauan Advokasi</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="spacer20"></div>
                                <a href="{{route("advokasi")}}" class="btn-custom capsule">Read more</a>
                            </div>
                        </div>
                        <img src="{{asset('web/images/services/2.jpg')}}" alt="" class="img-responsive" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
