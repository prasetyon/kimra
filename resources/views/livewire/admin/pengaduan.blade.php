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
                        @if(!$this->input_id)
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
                        @endif
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" wire:click.prevent="store()" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
    {{-- @if($this->input_id)
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
    @endif --}}
    @elseif($isTimeline)
    <div class="col-xl-12 col-12">
        <div class="card">
            <div class="card-header">
                <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
            </div>
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
                                <th class="text-left">Judul</th>
                                <th class="text-left">Pelapor</th>
                                <th class="text-left">Tanggal Laporan</th>
                                <th class="text-left">Jenis Laporan</th>
                                <th class="text-left">Laporan</th>
                                <th class="text-left">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse($lists as $list)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $list->judul }}</td>
                                <td class="text-left">{{ $list->creator->name }}</td>
                                <td class="text-left">{{ $list->tanggal }}</td>
                                <td class="text-left">{{ $list->jenis->name }}</td>
                                <td class="text-left" style="white-space:pre-wrap; word-wrap:break-word">{{ $list->laporan }}</td>
                                <td class="text-left">{{ $list->status }}</td>
                                <td style="text-align: center; width:10%;">
                                    <button wire:click="openTimeline({{ $list->id }})" title="Lihat Timeline" class="btn btn-sm btn-primary" style="width:auto; margin: 2px"><i class="fas fa-comments"></i></button>

                                    @if(($loggedUser->role == 'admin' || $loggedUser->role == 'superuser') && stripos($list->status, 'selesai') === false)
                                        <button wire:click="approve({{ $list->id }}, '{{ $list->status }}')" title="Approve" class="btn btn-sm btn-success" style="width:auto; margin: 2px" onclick="confirm('Are you sure to update status?') || event.stopImmediatePropagation()"><i class="fas fa-check"></i></button>
                                        <button wire:click="edit({{ $list->id }})" title="Ubah Data" class="btn btn-sm btn-warning" style="width:auto; margin: 2px"><i class="fas fa-edit"></i></button>
                                        <button wire:click="delete({{ $list->id }})" title="Hapus Data" class="btn btn-sm btn-danger" style="width:auto; margin: 2px" onclick="confirm('Are you sure to delete?') || event.stopImmediatePropagation()"><i class="fas fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="8">No Data Recorded</td></tr>
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
