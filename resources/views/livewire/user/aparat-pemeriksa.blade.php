<section class="no-top relative z1000" style="padding-bottom: 250px">

@if(!Auth::check())
    <div class="center-y relative text-center">
        <div class="container mt-80">
            <div class="row">
                <div class="col text-center" style="display: table-cell; vertical-align: middle;">
                    <div class="spacer-single"></div>
                    <h1>Monitoring Tindak Lanjut
                        <div style="display: block;">
                            <button type="button" class="btn btn-secondary" style="margin: 0 auto"
                                data-toggle="modal" data-target="#loginModal">Login untuk melanjutkan</button>
                        </div>
                    </h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="feature-box f-boxed style-3 text-center">
                    <i class="id-color icofont-briefcase"></i>
                    <div class="text">
                        <h4>Aspirasi</h4>
                    </div>
                    <i class="wm icofont-briefcase"></i>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="feature-box f-boxed style-3 text-center">
                    <i class="id-color icofont-group"></i>
                    <div class="text">
                        <h4>Pengaduan</h4>
                    </div>
                    <i class="wm icofont-group"></i>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="feature-box f-boxed style-3 text-center">
                    <i class="id-color icofont-investigation"></i>
                    <div class="text">
                        <h4>Permintaan Informasi</h4>
                    </div>
                    <i class="wm icofont-investigation"></i>
                </div>
            </div>
        </div>
    </div>
@else
<div class="center-y relative text-center">
    <div class="container mt-80">
        <div class="row">
            <div class="col text-center" style="display: table-cell; vertical-align: middle;">
                <div class="spacer-single"></div>
                <h1>Monitoring Tindak Lanjut Aparat Pemeriksa
                    <div style="display: block;">
                    @if(Auth::check())
                        @if($isOpen || $isOpenModal)
                        <button wire:click="close()" class="btn btn-secondary" style="margin: 0 auto">
                            Lihat Data Tindak Lanjut
                        </button>
                        @endif
                        @if($isOpen)
                        <button wire:click="openModal()" class="btn btn-primary" style="margin: 0 auto">
                            Update Data Tindak Lanjut
                        </button>
                        @endif
                    @else
                    <button type="button" class="btn btn-secondary" style="margin: 0 auto"
                        data-toggle="modal" data-target="#loginModal">Login untuk mengajukan permohononan</button>
                    @endif
                    </div>
                </h1>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="container" style="margin-bottom: 50px">
    @if(!$isOpen)
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <p style="font-size: 24px;">Data Pemeriksaan Anda</p>
                </div>
                @if(!$isOpen && !$isOpenModal)
                <div class="col-6">
                    <input type="text" wire:model="searchTerm" placeholder="Search Something..." class="form-control">
                </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            @if($isOpenModal)
            <form wire:submit.prevent="store()">
                <div class="row">
                    <div class="form-group col-lg-6 col-sm-12">
                        <label class="font-weight-bold">Uraian Tindak Lanjut</label>
                        <textarea wire:model="tinjut" class="form-control @error('tinjut') is-invalid @enderror" rows="5"></textarea>
                        @error('tinjut')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label class="font-weight-bold">Keterangan Tindak Lanjut</label>
                        <textarea wire:model="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="5"></textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label class="font-weight-bold">Catatan Tindak Lanjut</label>
                        <textarea wire:model="catatan" class="form-control @error('catatan') is-invalid @enderror" rows="5"></textarea>
                        @error('catatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label class="font-weight-bold">File Pendukung</label><br/>
                        <input type="file" wire:model="photos" multiple>
                        @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-lg-12 text-center">
                        <button type="button" wire:click.prevent="store()" class="btn btn-success">Buat Update Tindak Lanjut</button>
                    </div>
                </div>
            </form>
            @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="text-center" >
                        {{-- <th>No</th> --}}
                        <th style="border: 1px solid black" class="text-left">ID Temuan</th>
                        <th style="border: 1px solid black" class="text-left">Judul</th>
                        <th style="border: 1px solid black" class="text-left">Uraian Rekomendasi</th>
                        {{-- <th style="border: 1px solid black" class="text-left">Jenis Rekomendasi</th> --}}
                        <th style="border: 1px solid black" class="text-left">UIC</th>
                        {{-- <th style="border: 1px solid black" class="text-left">Tindak Lanjut Entitas</th> --}}
                        <th style="border: 1px solid black">Status</th>
                        <th style="border: 1px solid black" width="5%">Action</th>
                    </thead>
                    <tbody class="text-center">
                        @forelse($lists as $list)
                        <tr>
                            {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td class="text-left">
                                {{$list->tahun.'-'.$list->nomor_temuan.'-'.$list->kode_rekomendasi}}<br/><br/>
                                {{$list->type->name}}
                            </td>
                            <td class="text-left">{{$list->judul}}</td>
                            <td class="text-left">{{$list->uraian_rekomendasi}}</td>
                            {{-- <td class="text-left">{{$list->type->name}}</td> --}}
                            <td class="text-left">
                                ES 1: {{$list->uic_es1}}<br/>
                                ES 2: {{$list->uic_es2}}<br/>
                                ES 3: {{$list->uic_es3}}
                            </td>
                            {{-- <td class="text-left" style="white-space:pre-wrap; word-wrap:break-word">{{$list->tinjut}}</td> --}}
                            <td class="text-left">
                                Aksi UIC: {{$list->statusUic->name}}<br/>
                                Forum APK: {{$list->statusAPK->name}}<br/>
                                Forum BPK: {{$list->forumBPK->name}}<br/>
                                Akhir BPK: {{$list->statusBPK->name}}<br/>
                                Approval: {{$list->approval ? 'Approved' : 'Pending'}}<br/>
                            </td>
                            <td style="text-align: center;">
                                <button wire:click="show({{ $list->id }})" class="btn btn-sm btn-info" style="width:auto; margin: 2px"><i class="fas fa-eye"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6">No Data Recorded</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($lists->hasPages())
                {{ $lists->links() }}
            @endif
            @endif
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <p style="font-size: 24px;">Data Pemeriksaan Anda</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Detail Temuan</h3>
                    <div class="row">
                        <div class="col-lg-3">
                            <b>Tahun</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->tahun }}
                        </div>
                        <div class="col-lg-3">
                            <b>Nomor Temuan</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->nomor_temuan }}
                        </div>
                        <div class="col-lg-3">
                            <b>Kode Rekomendasi</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->kode_rekomendasi }}
                        </div>
                        <div class="col-lg-3">
                            <b>Judul</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->judul }}
                        </div>
                        <div class="col-lg-3">
                            <b>Target</b>
                        </div>
                        <div class="col-lg-9">
                            {{ date('d M Y', strtotime($temuanTinjut->target)) }}
                        </div>
                        <div class="col-lg-3">
                            <b>Uraian Rekomendasi</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->uraian_rekomendasi }}
                        </div>
                        <div class="col-lg-3">
                            <b>UIC</b>
                        </div>
                        <div class="col-lg-9">
                            ES 1: {{ $temuanTinjut->uic_es1 }} <br/>
                            ES 2: {{ $temuanTinjut->uic_es2 }} <br/>
                            ES 3: {{ $temuanTinjut->uic_es3 }} <br/>
                        </div>
                        <div class="col-lg-3">
                            <b>Jenis Pemeriksaan</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->type->name }}
                        </div>
                        <div class="col-lg-3">
                            <b>Aparat Pemeriksa</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->aparat_pemeriksa }}
                        </div>
                        <div class="col-lg-3">
                            <b>Aparat Pemeriksa Lainnya</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->aparat_pemeriksa_lainnya ?? "-" }}
                        </div>
                        <div class="col-lg-3">
                            <b>Uraian Tindak Lanjut</b>
                        </div>
                        <div class="col-lg-9">
                            <p style="white-space:pre-wrap; word-wrap:break-word">{{ $temuanTinjut->tinjut ?? "-" }}</p>
                        </div>
                        <div class="col-lg-3">
                            <b>Keterangan Tindak Lanjut</b>
                        </div>
                        <div class="col-lg-9">
                            <p style="white-space:pre-wrap; word-wrap:break-word">{{ $temuanTinjut->keterangan ?? "-" }}</p>
                        </div>
                        <div class="col-lg-3">
                            <b>Catatan Tindak Lanjut</b>
                        </div>
                        <div class="col-lg-9">
                            <p style="white-space:pre-wrap; word-wrap:break-word">{{ $temuanTinjut->catatan ?? "-" }}</p>
                        </div>
                        <div class="col-lg-3">
                            <b>Status UIC</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->statusUIC->name }}
                        </div>
                        <div class="col-lg-3">
                            <b>Status APK</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->statusAPK->name }}
                        </div>
                        <div class="col-lg-3">
                            <b>Status BPK</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->statusBPK->name }}
                        </div>
                        <div class="col-lg-3">
                            <b>Status Forum BPK</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->forumBPK->name }}
                        </div>
                        <div class="col-lg-3">
                            <b>Approval</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->approval==1 ? 'Approved' : 'Pending' }}
                        </div>
                        <div class="col-lg-3">
                            <b>Created</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->created_at.' by '.$temuanTinjut->creator->name}}
                        </div>
                        <div class="col-lg-3">
                            <b>Last Update</b>
                        </div>
                        <div class="col-lg-9">
                            {{ $temuanTinjut->updated_at.' by '.$temuanTinjut->updater->name}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="display: block;">
    @foreach ($temuanTinjut->data as $tt)
        <br/>
        <button type="button" style="margin-top: 10px" wire:click.prevent="switchCheck({{$tt->id}})" class="btn btn-success">{{$tt->created_at}}</button>
        @if($checkOpen[$tt->id])
        <div class="card" style="margin-top: 10px">
            <div class="card-body">
                <div>
                    <div class="timeline-item">
                        <div class="timeline-body">
                            <p>Creator: <b>{{ $tt->creator->name }}</b></p>
                            <p style="white-space:pre-wrap; word-wrap:break-word">Uraian: <br>{{$tt->uraian }} </p>
                            <p style="white-space:pre-wrap; word-wrap:break-word">Keterangan: <br>{{$tt->keterangan }} </p>
                            <p style="white-space:pre-wrap; word-wrap:break-word">Catatan: <br>{{$tt->catatan }} </p>
                            <p>File:
                                @forelse($tt->file as $f)
                                    <br/>
                                    <a href={{$f->file}} target="_blank">{{ $f->name }}</a>
                                @empty
                                    -
                                @endforelse
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endforeach
    </div>
    @endif
</div>
@endif
</section>
