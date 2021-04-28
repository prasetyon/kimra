@if($isOpen)
<div class="card">
    <div class="card-header">
        <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
    </div>
    <form method="POST" wire:submit.prevent="store()">
        <div class="card-body">
            <div class="form-group col-12">
                <label for="input_kl">KL</label>
                <input type="text" wire:model="input_kl" id="input_kl" class="form-control @error('input_kl') is-invalid @enderror">
                @error('input_kl') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group col-12">
                <label for="input_es1">Eselon 1</label>
                <input type="text" wire:model="input_es1" id="input_es1" class="form-control @error('input_es1') is-invalid @enderror">
                @error('input_es1') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group col-12">
                <label for="input_es2">Eselon 2</label>
                <input type="text" wire:model="input_es2" id="input_es2" class="form-control @error('input_es2') is-invalid @enderror">
                @error('input_es2') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group col-12">
                <label for="input_es3">Eselon 3</label>
                <input type="text" wire:model="input_es3" id="input_es3" class="form-control @error('input_es3') is-invalid @enderror">
                @error('input_es3') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group col-12">
                <label for="input_es4">Eselon 4</label>
                <input type="text" wire:model="input_es4" id="input_es4" class="form-control @error('input_es4') is-invalid @enderror">
                @error('input_es4') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                        <th class="text-left">KL</th>
                        <th class="text-left">es1</th>
                        <th class="text-left">es2</th>
                        <th class="text-left">es3</th>
                        <th class="text-left">es4</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($lists as $list)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $list->kl }}</td>
                        <td class="text-left">{{ $list->es1 }}</td>
                        <td class="text-left">{{ $list->es2 }}</td>
                        <td class="text-left">{{ $list->es3 }}</td>
                        <td class="text-left">{{ $list->es4 }}</td>
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
