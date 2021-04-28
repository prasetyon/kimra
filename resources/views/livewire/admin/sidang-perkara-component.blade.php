@if($isOpen)
<div class="card">
    <div class="card-header">
        <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
    </div>
    <form method="POST" wire:submit.prevent="store()">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-3 col-12">
                    <label class="font-weight-bold">Nomor ST</label>
                    <input type="text" wire:model="noST"
                        class="form-control @error('noST') is-invalid @enderror">
                    @error('noST')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-sm-3 col-12">
                    <label class="font-weight-bold">Tanggal Sidang</label>
                    <input type="date" wire:model="tanggalSidang"
                        class="form-control @error('tanggalSidang') is-invalid @enderror">
                    @error('tanggalSidang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-sm-3 col-12">
                    <label for="idPerkara">Perkara</label>
                    <select wire:model="idPerkara" class="form-control select2 @error('idPerkara') is-invalid @enderror" required="required">
                        <option value="" selected="selected">- Select -</option>
                        @foreach($listPerkara as $t)
                            <option value="{{ $t->id }}">{{ $t->nomor_perkara }}</option>
                        @endforeach
                    </select>
                    @error('idPerkara') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group col-sm-3 col-12">
                    <label for="jenisSidang">Jenis Sidang</label>
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
        </div>
        <div class="card-footer text-right">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="button" wire:click.prevent="store()" class="btn btn-success">Save</button>
        </div>
    </form>
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
                        <th width="5%">No</th>
                        <th class="text-left">Nomor ST</th>
                        <th class="text-left">Tahapan</th>
                        <th class="text-left">Perkara</th>
                        <th class="text-left">Tanggal</th>
                        <th class="text-left">Agenda</th>
                        <th class="text-left">Keterangan</th>
                        {{-- <th class="text-left">Majelis</th> --}}
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($lists as $list)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $list->nomor_st }}</td>
                        <td class="text-left">{{ 'Sidang '.$list->jenis->name }}</td>
                        <td class="text-left">{{ $list->parent->nomor_perkara ?? 'deleted' }}</td>
                        <td class="text-left">{{date('d M Y', strtotime($list->tanggal))}}</td>
                        <td class="text-left" style="white-space:pre-wrap; word-wrap:break-word">{{ $list->agenda }}</td>
                        <td class="text-left" style="white-space:pre-wrap; word-wrap:break-word">{{ $list->keterangan }}</td>
                        {{-- <td class="text-left" style="white-space:pre-wrap; word-wrap:break-word">{{ $list->majelis }}</td> --}}
                        <td style="text-align: center;">
                            <button wire:click="edit({{ $list->id }})" class="btn btn-sm btn-info" style="width:auto; margin: 2px"><i class="fas fa-edit"></i></button>
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
