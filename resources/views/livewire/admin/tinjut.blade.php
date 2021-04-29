@if($isOpen)
<div class="row">
    <div class="col-xl-12 col-12">
        <div class="card">
            <div class="card-header">
                <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
            </div>
            <form method="POST" wire:submit.prevent="store()">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                            <label for="input_tahun">Tahun</label>
                            <input type="text" wire:model="input_tahun" id="input_tahun" class="form-control @error('input_tahun') is-invalid @enderror">
                            @error('input_tahun') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                            <label for="input_nomor_temuan">Nomor Temuan</label>
                            <input type="text" wire:model="input_nomor_temuan" id="input_nomor_temuan" class="form-control @error('input_nomor_temuan') is-invalid @enderror">
                            @error('input_nomor_temuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                            <label for="input_kode_rekomendasi">Kode Rekomendasi</label>
                            <input type="text" wire:model="input_kode_rekomendasi" id="input_kode_rekomendasi" class="form-control @error('input_kode_rekomendasi') is-invalid @enderror">
                            @error('input_kode_rekomendasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                            <label for="input_jenis_pemeriksaan">Jenis Pemeriksaan</label>
                            <select wire:model="input_jenis_pemeriksaan" class="form-control select2 @error('input_jenis_pemeriksaan') is-invalid @enderror" required="required">
                                <option value="" selected="selected">- Select -</option>
                                @foreach($listTypes as $t)
                                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
                            @error('input_jenis_pemeriksaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label for="input_uic_es1">UIC Eselon 1</label>
                                    <select wire:model="input_uic_es1" class="form-control select2 @error('input_uic_es1') is-invalid @enderror" required="required">
                                        <option value="" selected="selected">- Select -</option>
                                        @foreach($listEs1 as $t)
                                            <option value="{{ $t->es1 }}">{{ $t->es1 }}</option>
                                        @endforeach
                                    </select>
                                    @error('input_uic_es1') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>&nbsp;
                                <div class="col-12">
                                    <label for="input_uic_es2">UIC Eselon 2</label>
                                    <select wire:model="input_uic_es2" class="form-control select2 @error('input_uic_es2') is-invalid @enderror" required="required">
                                        <option value="" selected="selected">- Select -</option>
                                        @foreach($listEs2 as $t)
                                            <option value="{{ $t->es2 }}">{{ $t->es2 }}</option>
                                        @endforeach
                                    </select>
                                    @error('input_uic_es2') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>&nbsp;
                                <div class="col-12">
                                    <label for="input_uic_es3">UIC Eselon 3</label>
                                    <input type="text" wire:model="input_uic_es3" id="input_uic_es3" class="form-control @error('input_uic_es3') is-invalid @enderror">
                                    @error('input_uic_es3') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>&nbsp;
                                <div class="col-12">
                                    <label for="input_aparat_pemeriksa">Aparat Pemeriksa</label>
                                    <select wire:model="input_aparat_pemeriksa" class="form-control select2 @error('input_aparat_pemeriksa') is-invalid @enderror" required="required">
                                        <option value="" selected="selected">- Select -</option>
                                        @foreach($listAparat as $t)
                                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('input_aparat_pemeriksa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>&nbsp;
                                <div class="col-12">
                                    <label for="input_aparat_pemeriksa_lainnya">Aparat Pemeriksa Lainnya</label>
                                    <input type="text" wire:model="input_aparat_pemeriksa_lainnya" id="input_aparat_pemeriksa_lainnya" class="form-control @error('input_aparat_pemeriksa_lainnya') is-invalid @enderror">
                                    @error('input_aparat_pemeriksa_lainnya') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="font-weight-bold">Judul Temuan Pemeriksaan</label>
                                    <textarea wire:model="input_judul" class="form-control @error('input_judul') is-invalid @enderror" rows="5"></textarea>
                                    @error('input_judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>&nbsp;
                                <div class="col-12">
                                    <label class="font-weight-bold">Uraian Rekomendasi</label>
                                    <textarea wire:model="input_uraian_rekomendasi" class="form-control @error('input_uraian_rekomendasi') is-invalid @enderror" rows="9"></textarea>
                                    @error('input_uraian_rekomendasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="font-weight-bold">Target</label>
                                    <input type="date" wire:model="input_target"
                                        class="form-control @error('input_target') is-invalid @enderror">
                                    @error('input_target')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                &nbsp;
                                <div class="col-12">
                                    <label for="input_status_uic">Status Aksi UIC</label>
                                    <select wire:model="input_status_uic" class="form-control select2 @error('input_status_uic') is-invalid @enderror" required="required">
                                        <option value="" selected="selected">- Select -</option>
                                        @foreach($listActionTypes as $t)
                                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('input_status_uic') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                &nbsp;
                                <div class="col-12">
                                    <label for="input_forum_bpk">Status Forum BPK</label>
                                    <select wire:model="input_forum_bpk" class="form-control select2 @error('input_forum_bpk') is-invalid @enderror" required="required">
                                        <option value="" selected="selected">- Select -</option>
                                        @foreach($listActionTypes as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('input_forum_bpk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label for="input_status_bpk">Status Akhir BPK</label>
                                    <select wire:model="input_status_bpk" class="form-control select2 @error('input_status_bpk') is-invalid @enderror" required="required">
                                        <option value="" selected="selected">- Select -</option>
                                        @foreach($listActionTypes as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('input_status_bpk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>&nbsp;
                                <div class="col-12">
                                    <label for="input_approval">Status Approval</label>
                                    <select wire:model="input_approval" class="form-control select2 @error('input_approval') is-invalid @enderror" required="required">
                                        <option value="" selected="selected">- Select -</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Approved</option>
                                    </select>
                                    @error('input_approval') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>&nbsp;
                                <div class="col-12">
                                    <label for="input_status_apk">Status Forum APK</label>
                                    <select wire:model="input_status_apk" class="form-control select2 @error('input_status_apk') is-invalid @enderror" required="required">
                                        <option value="" selected="selected">- Select -</option>
                                        @foreach($listActionTypes as $t)
                                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('input_status_apk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" wire:click.prevent="store()" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@elseif($isTimeline)
<div class="row">
    <div class="col-xl-12 col-12">
        <div class="card">
            <div class="card-header">
                <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
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
                                {{ $temuanTinjut->tinjut ?? "-" }}
                            </div>
                            <div class="col-lg-3">
                                <b>Keterangan Tindak Lanjut</b>
                            </div>
                            <div class="col-lg-9">
                                {{ $temuanTinjut->keterangan ?? "-" }}
                            </div>
                            <div class="col-lg-3">
                                <b>Catatan Tindak Lanjut</b>
                            </div>
                            <div class="col-lg-9">
                                {{ $temuanTinjut->catatan ?? "-" }}
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

        <div class="card">
            <div class="card-body">
                <div class="timeline">
                    @foreach ($temuanTinjut->data as $tt)
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-blue">{{date('d M Y', strtotime($tt->created_at))}}</span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
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
                        <!-- END timeline item -->
                    @endforeach
                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
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
                <thead class="text-center">
                    <tr>
                        {{-- <th>No</th> --}}
                        <th class="text-left">ID Temuan</th>
                        <th class="text-left">Judul</th>
                        <th class="text-left">Uraian Rekomendasi</th>
                        {{-- <th class="text-left">Jenis Rekomendasi</th> --}}
                        <th class="text-left">UIC</th>
                        {{-- <th class="text-left">Tindak Lanjut Entitas</th> --}}
                        <th>Status</th>
                        <th width="5%">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($lists as $list)
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
                            ES 1: {{$list->uic_es1}}<br/><br/>
                            ES 2: {{$list->uic_es2}}<br/><br/>
                            ES 3: {{$list->uic_es3}}
                        </td>
                        <td class="text-left">
                            Aksi UIC: {{$list->statusUic->name}}<br/><br/>
                            Forum APK: {{$list->statusAPK->name}}<br/><br/>
                            Forum BPK: {{$list->forumBPK->name}}<br/><br/>
                            Akhir BPK: {{$list->statusBPK->name}}<br/><br/>
                            Approval: {{$list->approval ? 'Approved' : 'Pending'}}<br/><br/>
                        </td>
                        <td style="text-align: center;">
                            <button wire:click="edit({{ $list->id }})" class="btn btn-sm btn-info" style="width:auto; margin: 2px"><i class="fas fa-edit"></i></button>
                            <button wire:click="openTimeline({{ $list->id }})" class="btn btn-sm btn-secondary" style="width:auto; margin: 2px"><i class="fas fa-eye"></i></button>
                            <button wire:click="delete({{ $list->id }})" class="btn btn-sm btn-danger" style="width:auto; margin: 2px" onclick="confirm('Are you sure to delete?') || event.stopImmediatePropagation()"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($lists->hasPages())
            {{ $lists->links() }}
        @endif
    </div>
</div>
@endif
