@if($isOpen)
<div class="card">
    <div class="card-header">
        <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
    </div>
    <form method="POST" wire:submit.prevent="store()">
        <div class="card-body">
            <!-- Select -->
            <div class="form-group col-12">
                <label for="input_type">Jenis</label>
                <select wire:model="input_type" class="form-control select2 @error('input_type') is-invalid @enderror" required="required">
                    <option value="" selected="selected">- Select -</option>
                    @foreach($bases as $base)
                        <option value="{{ $base->type }}">{{ $base->type }}</option>
                    @endforeach
                </select>
                @error('input_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- String -->
            <div class="form-group col-12">
                <label for="input_name">Name</label>
                <input type="text" wire:model="input_name" id="input_name" class="form-control @error('input_name') is-invalid @enderror">
                @error('input_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                        <th class="text-left">Type</th>
                        <th class="text-left">Name</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($lists as $list)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $list->type }}</td>
                        <td class="text-left">{{ $list->name }}</td>
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
