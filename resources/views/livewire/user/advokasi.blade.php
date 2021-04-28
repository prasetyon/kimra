<section class="no-top relative z1000" style="padding-bottom: 250px">
    <div class="center-y relative text-center">
        <div class="container mt-80">
            <div class="row">
                <div class="col text-center" style="display: table-cell; vertical-align: middle;">
                    <div class="spacer-single"></div>
                    <h1>Anda Perlu Bantuan Advokasi?
                        @if(Auth::check())
                        <button wire:click="switchMode()" class="btn btn-secondary" style="display: block; margin: 0 auto">
                            @if($openSubmit) Lihat Data Perkara @else Ajukan Permohonan Layanan @endif
                        </button>
                        @else
                        <button type="button" class="btn btn-secondary" style="display: block; margin: 0 auto"
                            data-toggle="modal" data-target="#loginModal">Login untuk mengajukan permohononan</button>
                        @endif
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
                        <p style="font-size: 24px;">@if(!$openSubmit) Data Perkara Anda @else Registrasi Perkara Baru @endif</p>
                    </div>
                    @if(!$openSubmit)
                    <div class="col-6">
                        <input type="text" wire:model="searchTerm" placeholder="Search Something..." class="form-control">
                    </div>
                    @endif
                </div>
            </div>
            @if($openSubmit)
            <div class="card-body">
                <form wire:submit.prevent="store()">
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-12">
                            <label class="font-weight-bold">Nomor Surat</label>
                            <input type="text" wire:model="noSurat"
                                class="form-control @error('noSurat') is-invalid @enderror">
                            @error('noSurat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="type">Jenis Perkara</label>
                            <select wire:model="type" class="form-control select2 @error('type') is-invalid @enderror" required="required">
                                <option value="" selected="selected">- Select -</option>
                                @foreach($listTypes as $t)
                                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
                            @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label class="font-weight-bold">Domisili</label>
                            <input type="text" wire:model="domisili"
                                class="form-control @error('domisili') is-invalid @enderror">
                            @error('domisili')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label class="font-weight-bold">Pihak Penggugat</label>
                            <input type="text" wire:model="pihakPenggugat"
                                class="form-control @error('pihakPenggugat') is-invalid @enderror">
                            @error('pihakPenggugat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label class="font-weight-bold">Pihak Tergugat</label>
                            <input type="text" wire:model="pihakTergugat"
                                class="form-control @error('pihakTergugat') is-invalid @enderror">
                            @error('pihakTergugat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label class="font-weight-bold">Posisi DJA</label>
                            <input type="text" wire:model="posisiDJA"
                                class="form-control @error('posisiDJA') is-invalid @enderror">
                            @error('posisiDJA')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label class="font-weight-bold">Perihal Perkara</label>
                            <textarea wire:model="perihalPerkara" class="form-control @error('perihalPerkara') is-invalid @enderror" rows="5"></textarea>
                            @error('perihalPerkara')
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
                            <button type="button" wire:click.prevent="store()" class="btn btn-success">Registrasi Perkara Baru</button>
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
                                <th style="border: 1px solid black" class="text-left">Nomor Perkara</th>
                                <th style="border: 1px solid black" class="text-left">Pihak Penggugat</th>
                                <th style="border: 1px solid black" class="text-left">Pihak Tergugat</th>
                                <th style="border: 1px solid black" class="text-left">Pokok Perkara</th>
                                <th style="border: 1px solid black" class="text-left">Status</th>
                                {{-- <th style="border: 1px solid black">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse($lists as $list)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $list->nomor_perkara }}</td>
                                <td class="text-left">{{ $list->pihak_memanggil }}</td>
                                <td class="text-left">{{ $list->pihak_terpanggil }}</td>
                                <td class="text-left" style="white-space:pre-wrap; word-wrap:break-word">{!! $list->pokok_perkara !!}</td>
                                <td class="text-left">
                                    @if($list->finished) Selesai
                                    @elseif(!$list->approved) Menunggu Approval Admin
                                    @elseif(!$list->approved_es4) Menunggu Approval Eselon IV
                                    @elseif(!$list->approved_es3) Menunggu Approval Eselon III
                                    @else Proses Persidangan
                                    @endif
                                </td>
                                {{-- <td>
                                    <button wire:click="show({{ $list->id }})" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                </td> --}}
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
            </div>
            @endif
        </div>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="feature-box f-boxed style-3 text-center">
                    <i class="id-color icofont-briefcase"></i>
                    <div class="text">
                        <h4>Penanganan Perkara di Pengadilan</h4>
                    </div>
                    <i class="wm icofont-briefcase"></i>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-box f-boxed style-3 text-center">
                    <i class="id-color icofont-group"></i>
                    <div class="text">
                        <h4>Pendampingan Pejabat / Pegawai</h4>
                    </div>
                    <i class="wm icofont-group"></i>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-box f-boxed style-3 text-center">
                    <i class="id-color icofont-investigation"></i>
                    <div class="text">
                        <h4>Kajian Hukum</h4>
                    </div>
                    <i class="wm icofont-investigation"></i>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-box f-boxed style-3 text-center">
                    <i class="id-color icofont-gavel"></i>
                    <div class="text">
                        <h4>Pemberian Masukan / Pendapat Hukum / Review Kontrak</h4>
                    </div>
                    <i class="wm icofont-gavel"></i>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
