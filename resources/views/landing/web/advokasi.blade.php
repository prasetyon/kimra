@extends('web', ['title' => 'Advokasi'])

@section('content')
    <section id="section-highlight" class="relative text-light" data-bgcolor="#FFFFFF">
        <div class="container" style="padding-top: 20px">
            <div class="row align-items-center">
                <div class="col-md-4">
                    {{-- <span class="p-title">Welcome</span><br> --}}
                    <h2 style="color: #454545">
                        Layanan<br>Pemantauan<br>Advokasi
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

    @livewire('user.advokasi')
@endsection
