<div class="row">
    @if($isOpen)
    <div class="col-xl-8 col-12">
        <div class="card">
            <div class="card-header">
                <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
            </div>
            <form wire:submit.prevent="store()">
                <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Nomor Surat</label>
                                <input type="text" wire:model="noSurat"
                                    class="form-control @error('noSurat') is-invalid @enderror">
                                @error('noSurat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Nomor Surat Kuasa</label>
                                <input type="text" wire:model="noSuratKuasa"
                                    class="form-control @error('noSuratKuasa') is-invalid @enderror">
                                @error('noSuratKuasa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label for="type">Jenis Perkara</label>
                                <select wire:model="type" class="form-control select2 @error('type') is-invalid @enderror" required="required">
                                    <option value="" selected="selected">- Select -</option>
                                    @foreach($listTypes as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                                @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Domisili</label>
                                <input type="text" wire:model="domisili"
                                    class="form-control @error('domisili') is-invalid @enderror">
                                @error('domisili')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Wilayah</label>
                                <input type="text" wire:model="wilayah"
                                    class="form-control @error('wilayah') is-invalid @enderror">
                                @error('wilayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Khusus</label>
                                <input type="text" wire:model="khusus"
                                    class="form-control @error('khusus') is-invalid @enderror">
                                @error('khusus')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Tahun Masuk</label>
                                <input type="number" wire:model="tahunMasuk"
                                    class="form-control @error('tahunMasuk') is-invalid @enderror">
                                @error('tahunMasuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Unit</label>
                                <select wire:model="unit" class="form-control select2 @error('unit') is-invalid @enderror" required="required">
                                    <option value="" selected="selected">- Select -</option>
                                    @foreach($listUnits as $u)
                                        <option value="{{ $u->kl.' - '.$u->es1 }}">{{ $u->kl.' - '.$u->es1}}</option>
                                    @endforeach
                                </select>
                                @error('unit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Posisi DJA</label>
                                <input type="text" wire:model="posisiDJA"
                                    class="form-control @error('posisiDJA') is-invalid @enderror">
                                @error('posisiDJA')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Pihak Penggugat</label>
                                <input type="text" wire:model="pihakPenggugat"
                                    class="form-control @error('pihakPenggugat') is-invalid @enderror">
                                @error('pihakPenggugat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Pihak Tergugat</label>
                                <input type="text" wire:model="pihakTergugat"
                                    class="form-control @error('pihakTergugat') is-invalid @enderror">
                                @error('pihakTergugat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">File Pendukung</label><br/>
                                <input type="file" wire:model="photos" multiple>
                                @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Perihal Perkara</label>
                                <textarea wire:model="perihalPerkara" class="form-control @error('perihalPerkara') is-invalid @enderror" rows="10"></textarea>
                                @error('perihalPerkara')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Objek Tuntutan</label>
                                <textarea wire:model="objekTuntutan" class="form-control @error('objekTuntutan') is-invalid @enderror" rows="10"></textarea>
                                @error('objekTuntutan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            {{-- <div class="form-group col-sm-6 col-12">
                                <label class="font-weight-bold">Objek Tuntutan Lainnya</label>
                                <textarea wire:model="objekTuntutanLainnya" class="form-control @error('objekTuntutanLainnya') is-invalid @enderror" rows="10"></textarea>
                                @error('objekTuntutanLainnya')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> --}}
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" wire:click.prevent="store()" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
    @if($this->input_id)
    <div class="col-xl-4 col-12">
        <div class="card">
            <div class="card-header">
                <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="text-center" >
                            <tr>
                                <th>No</th>
                                <th class="text-left">Nama File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse($listFiles as $file)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-left"><a href={{$file->file}} target="_blank">{{ $file->name }}</a></td>
                                <td style="text-align: center; width:10%;">
                                    <button wire:click="deleteFile({{ $file->id }})" class="btn btn-sm btn-danger" style="width:auto; margin: 2px" onclick="confirm('Are you sure want to delete?') || event.stopImmediatePropagation()"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="6">No File Uploaded</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    @elseif($isSidang)
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
            </div>
            <form wire:submit.prevent="store()">
                <div class="card-body">
                    <form wire:submit.prevent="storeSidang()">
                        <div class="row">
                            <div class="form-group col-sm-4 col-12">
                                <label class="font-weight-bold">Nomor ST</label>
                                <input type="text" wire:model="noST"
                                    class="form-control @error('noST') is-invalid @enderror">
                                @error('noST')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4 col-12">
                                <label class="font-weight-bold">Tanggal Sidang</label>
                                <input type="date" wire:model="tanggalSidang"
                                    class="form-control @error('tanggalSidang') is-invalid @enderror">
                                @error('tanggalSidang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4 col-12">
                                <label for="type">Jenis Sidang</label>
                                <select wire:model="jenisSidang" class="form-control select2 @error('jenisSidang') is-invalid @enderror" required="required">
                                    <option value="" selected="selected">- Select -</option>
                                    @foreach($listSidang as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                                @error('jenisSidang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group col-sm-4 col-12">
                                <label class="font-weight-bold">Susunan Majelis</label>
                                <textarea wire:model="susunanMajelis" class="form-control @error('susunanMajelis') is-invalid @enderror" rows="10"></textarea>
                                @error('susunanMajelis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4 col-12">
                                <label class="font-weight-bold">Agenda Sidang</label>
                                <textarea wire:model="agendaSidang" class="form-control @error('agendaSidang') is-invalid @enderror" rows="10"></textarea>
                                @error('agendaSidang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4 col-12">
                                <label class="font-weight-bold">Keterangan Sidang</label>
                                <textarea wire:model="keteranganSidang" class="form-control @error('keteranganSidang') is-invalid @enderror" rows="10"></textarea>
                                @error('keteranganSidang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" wire:click.prevent="storeSidang()" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
    @elseif($isTimeline)
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
            </div>
            <div class="card-body">
                <div class="timeline">
                    @foreach ($timeline as $tt)
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-blue">{{date('d M Y', strtotime($tt->tanggal))}}</span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                            <div class="timeline-item">
                                {{-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> --}}
                                <h2 class="timeline-header">
                                    <a href="#" style="font-size: 24px">Sidang {{$tt->jenis->name}}</a><br/>
                                    <b>{{$tt->parent->nomor_perkara}}</b>
                                </h2>

                                <div class="timeline-body">
                                    <p>Nomor ST: <b>{{ $tt->nomor_st }}</b></p>
                                    <p style="white-space:pre-wrap; word-wrap:break-word">Keterangan: <br>{{$tt->keterangan }} </p>
                                    <p style="white-space:pre-wrap; word-wrap:break-word">Agenda: <br>{{$tt->agenda }} </p>
                                    <p style="white-space:pre-wrap; word-wrap:break-word">Susunan Majelis: <br>{{$tt->majelis }} </p>
                                </div>
                                <div class="timeline-footer">
                                <button wire:click="editSidang({{ $tt->id }})" title="Approve" class="btn btn-sm btn-warning">Edit</button>
                                <a class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                    @endforeach
                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <button wire:click="create()" class="btn btn-dark"><i class="fas fa-plus pr-1"></i> Add New</button>
                    </div>
                    <div class="col-6">
                        <input type="text" wire:model="searchTerm" placeholder="Search Something..." class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="text-center" >
                            <tr>
                                <th>No</th>
                                <th class="text-left">Nomor Perkara</th>
                                <th class="text-left">Jenis</th>
                                <th class="text-left">Pihak Penggugat</th>
                                <th class="text-left">Pihak Tergugat</th>
                                <th class="text-left">Pokok Perkara</th>
                                <th class="text-left">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse($lists as $list)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $list->nomor_perkara }}</td>
                                <td class="text-left">{{ $list->jenis->name }}</td>
                                <td class="text-left">{{ $list->pihak_memanggil }}</td>
                                <td class="text-left">{{ $list->pihak_terpanggil }}</td>
                                <td class="text-left" style="white-space:pre-wrap; word-wrap:break-word">{{ $list->pokok_perkara }}</td>
                                <td class="text-left">
                                    @if($list->finished) Selesai
                                    @elseif(!$list->approved) Menunggu Approval Admin
                                    @elseif(!$list->approved_es4) Menunggu Approval Eselon IV
                                    @elseif(!$list->approved_es3) Menunggu Approval Eselon III
                                    @else Proses Persidangan
                                    @endif
                                </td>
                                <td style="text-align: center; width:10%;">
                                    {{-- <button wire:click="show({{ $list->id }})" class="btn btn-sm btn-info" style="width:auto; margin: 2px"><i class="fas fa-eye"></i></button> --}}
                                    @if(($loggedUser->role == 'admin' && !$list->approved) || ($loggedUser->role == 'es4' && !$list->approved_es4) || ($loggedUser->role == 'es3' && !$list->approved_es3))
                                        <button wire:click="approve({{ $list->id }})" title="Approve" class="btn btn-sm btn-success" style="width:auto; margin: 2px" onclick="confirm('Are you sure to approve?') || event.stopImmediatePropagation()"><i class="fas fa-check"></i></button>
                                    @endif

                                    <button wire:click="openTimeline({{ $list->id }})" title="Lihat Timeline" class="btn btn-sm btn-primary" style="width:auto; margin: 2px"><i class="fas fa-calendar"></i></button>

                                    @if($loggedUser->role == 'admin' || $loggedUser->role == 'superuser')
                                        <button wire:click="edit({{ $list->id }})" title="Ubah Data" class="btn btn-sm btn-warning" style="width:auto; margin: 2px"><i class="fas fa-edit"></i></button>
                                        @if($list->approved_es3)
                                            <button wire:click="openSidang({{ $list->id }})" title="Buat Sidang Baru" class="btn btn-sm btn-secondary" style="width:auto; margin: 2px"><i class="fas fa-gavel"></i></button>
                                        @endif

                                        @if(!$list->finished)
                                        <button wire:click="finish({{ $list->id }})" title="Selesai" class="btn btn-sm btn-light" style="width:auto; margin: 2px" onclick="confirm('Are you sure set as finished?') || event.stopImmediatePropagation()"><i class="fas fa-flag-checkered"></i></button>
                                        @endif

                                        <button wire:click="delete({{ $list->id }})" title="Hapus Data" class="btn btn-sm btn-danger" style="width:auto; margin: 2px" onclick="confirm('Are you sure to delete?') || event.stopImmediatePropagation()"><i class="fas fa-trash"></i></button>
                                    @endif
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
            </div>
        </div>
    </div>
    @endif
</div>
