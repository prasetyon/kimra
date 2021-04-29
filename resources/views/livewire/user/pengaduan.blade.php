<section class="no-top relative z1000" style="padding-bottom: 250px">
    <div class="center-y relative text-center">
        <div class="container mt-80">
            <div class="row">
                <div class="col text-center" style="display: table-cell; vertical-align: middle;">
                    <div class="spacer-single"></div>
                    <h1>Anda Perlu Membuat Laporan?
                        <div style="display: block;">
                            @if(Auth::check())
                            <button wire:click="switchMode()" class="btn btn-secondary" style="margin: 0 auto">
                                @if($openSubmit) Lihat Data Aduan @else Buat Laporan @endif
                            </button>
                            @else
                            <button type="button" class="btn btn-secondary" style="margin: 0 auto"
                                data-toggle="modal" data-target="#loginModal">Login untuk membuat laporan</button>
                            @endif
                            <button wire:click="openModal()" class="btn btn-primary" style="margin: 0 auto">
                                Lihat Panduan
                            </button>
                        </div>
                    </h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    @if(Auth::check())
    <div class="container" style="margin-bottom: 50px">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <p style="font-size: 24px;">@if($openTimeline) Detail Laporan Anda @elseif(!$openSubmit) Data Laporan Anda @else Buat Laporan Baru @endif</p>
                    </div>
                    @if(!$openSubmit)
                    <div class="col-6">
                        <input type="text" wire:model="searchTerm" placeholder="Search Something..." class="form-control">
                    </div>
                    @endif
                </div>
            </div>
            @if($openTimeline)
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <b>Judul Laporan</b>
                            </div>
                            <div class="col-lg-10">
                                {{ $selectedAduan->judul }}
                            </div>
                            <div class="col-lg-2">
                                <b>Tanggal Terlapor</b>
                            </div>
                            <div class="col-lg-10">
                                {{ $selectedAduan->tanggal }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($selectedAduan->response as $tt)
                    <div class="col-lg-12" style="margin-bottom: 20px">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ $tt->creator->name }} <br/>
                                {{ $tt->created_at }}
                            </div>
                            <div class="col-lg-10">
                                <p style="white-space:pre-wrap; word-wrap:break-word">{{ $tt->tanggapan }}</p>
                                @foreach($tt->file as $f)
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href={{$f->file}} target="_blank">{{ $f->name }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @if(stripos($selectedAduan->status, 'selesai') === false)
            <div class="card-footer">
                <form wire:submit.prevent="storeSidang()">
                    <div style="margin-bottom:10px">
                        <textarea wire:model="tanggapan" class="form-control @error('tanggapan') is-invalid @enderror" rows="2"></textarea>
                        @error('tanggapan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div style="margin-bottom:10px">
                        <label class="font-weight-bold">File Pendukung</label><br>
                        <input type="file" wire:model="photos" multiple>
                        @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class=" text-right">
                        <button type="button" wire:click.prevent="storeSidang()" class="btn btn-success">Kirim Tanggapan</button>
                    </div>
                </form>
            </div>
            @endif
            @elseif($openSubmit)
            <div class="card-body">
                <form wire:submit.prevent="store()">
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="type">Jenis Laporan</label>
                            <select wire:model="type" class="form-control select2 @error('type') is-invalid @enderror" required="required">
                                <option value="" selected="selected">- Select -</option>
                                @foreach($listTypes as $t)
                                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
                            @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label class="font-weight-bold">Judul Laporan</label>
                            <input type="text" wire:model="judul"
                                class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label class="font-weight-bold">Tanggal Kejadian</label>
                            <input type="date" wire:model="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror">
                            @error('tanggal')
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
                        <div class="form-group col-lg-6 col-sm-12">
                            <label class="font-weight-bold">Isi Laporan</label>
                            <textarea wire:model="laporan" class="form-control @error('laporan') is-invalid @enderror" rows="5"></textarea>
                            @error('laporan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 text-center">
                            <button type="button" wire:click.prevent="store()" class="btn btn-success">Buat Laporan</button>
                        </div>
                    </div>
                </form>
            </div>
            @else
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="text-center" >
                            <tr bgcolor="#454545" style="color:white">
                                <th style="border: 1px solid black">No</th>
                                <th style="border: 1px solid black" class="text-left">Tanggal Pelaporan</th>
                                <th style="border: 1px solid black" class="text-left">Jenis Laporan</th>
                                <th style="border: 1px solid black" class="text-left">Judul Laporan</th>
                                <th style="border: 1px solid black" class="text-left">Laporan</th>
                                <th style="border: 1px solid black" class="text-left">Status</th>
                                <th style="border: 1px solid black">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse($lists as $list)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $list->tanggal }}</td>
                                <td class="text-left">{{ $list->jenis->name }}</td>
                                <td class="text-left">{{ $list->judul }}</td>
                                <td class="text-left" style="white-space:pre-wrap; word-wrap:break-word">{!! $list->laporan !!}</td>
                                <td class="text-left">{{$list->status}}</td>
                                <td>
                                    @if(stripos($list->status, 'on progress')!==false)
                                    <button wire:click="openTimeline({{ $list->id }})" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7">No Data Recorded</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($lists->hasPages())
                    {{ $lists->links() }}
                @endif
            </div>
            @endif
        </div>
    </div>
    @else
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
    @endif
</section>
