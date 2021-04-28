@if($isOpen)
<div class="card">
    <div class="card-header">
        <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
    </div>
    <form method="POST" wire:submit.prevent="store()">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-3 col-12">
                    <label for="input_name">Nama</label>
                    <input type="text" wire:model="input_name" id="input_name" class="form-control @error('input_name') is-invalid @enderror">
                    @error('input_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group col-sm-3 col-12">
                    <label for="input_username">Username</label>
                    <input type="text" wire:model="input_username" id="input_username" class="form-control @error('input_username') is-invalid @enderror">
                    @error('input_username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group col-sm-3 col-12">
                    <label for="input_role">Role</label>
                    <select wire:model="input_role" class="form-control select2 @error('input_role') is-invalid @enderror" required="required">
                        <option value="" selected="selected">- Select -</option>
                            <option value="superuser">superuser</option>
                            <option value="admin">admin</option>
                            <option value="es1">es1</option>
                            <option value="es2">es2</option>
                            <option value="es3">es3</option>
                            <option value="es4">es4</option>
                            <option value="user">user</option>
                    </select>
                    @error('input_role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group col-sm-3 col-12">
                    <label for="input_fitur">Fitur</label>
                    <select wire:model="input_fitur" class="form-control select2 @error('input_fitur') is-invalid @enderror" required="required">
                        <option value="" selected="selected">- Select -</option>
                            <option value="advokasi">Advokasi</option>
                            <option value="pengendalian intern">Pengendalian Intern</option>
                            <option value="pengelolaan risiko">Pengelolaan Risiko</option>
                            <option value="aparat pemeriksa">Aparat Pemeriksa</option>
                            <option value="pengaduan">Pengaduan</option>
                    </select>
                    @error('input_fitur') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group col-sm-3 col-12">
                    <label for="input_kl">KL</label>
                    <select wire:model="input_kl" class="form-control select2 @error('input_kl') is-invalid @enderror" required="required">
                        <option value="" selected="selected">- Select -</option>
                        @foreach($listKL as $t)
                            <option value="{{ $t->kl }}">{{ $t->kl }}</option>
                        @endforeach
                    </select>
                    @error('input_kl') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                @if($input_role=='es1' || $input_role=='es2' || $input_role=='es3' || $input_role=='es4' || $input_role=='user')
                <div class="form-group col-sm-3 col-12">
                    <label for="input_es1">Eselon 1</label>
                    <select wire:model="input_es1" class="form-control select2 @error('input_es1') is-invalid @enderror" required="required">
                        <option value="" selected="selected">- Select -</option>
                        @foreach($listES1 as $t)
                            <option value="{{ $t->es1 }}">{{ $t->es1 }}</option>
                        @endforeach
                    </select>
                    @error('input_es1') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                @endif
                @if($input_role=='es2' || $input_role=='es3' || $input_role=='es4' || $input_role=='user')
                <div class="form-group col-sm-3 col-12">
                    <label for="input_es2">Eselon 2</label>
                    <select wire:model="input_es2" class="form-control select2 @error('input_es2') is-invalid @enderror" required="required">
                        <option value="" selected="selected">- Select -</option>
                        @foreach($listES2 as $t)
                            <option value="{{ $t->es2 }}">{{ $t->es2 }}</option>
                        @endforeach
                    </select>
                    @error('input_es2') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                @endif
                @if($input_role=='es3' || $input_role=='es4' || $input_role=='user')
                <div class="form-group col-sm-3 col-12">
                    <label for="input_es3">Eselon 3</label>
                    <select wire:model="input_es3" class="form-control select2 @error('input_es3') is-invalid @enderror" required="required">
                        <option value="" selected="selected">- Select -</option>
                        @foreach($listES3 as $t)
                            <option value="{{ $t->es3 }}">{{ $t->es3 }}</option>
                        @endforeach
                    </select>
                    @error('input_es3') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                @endif
                @if($input_role=='es4' || $input_role=='user')
                <div class="form-group col-sm-3 col-12">
                    <label for="input_es4">Eselon 4</label>
                    <select wire:model="input_es4" class="form-control select2 @error('input_es4') is-invalid @enderror" required="required">
                        <option value="" selected="selected">- Select -</option>
                        @foreach($listES4 as $t)
                            <option value="{{ $t->es4 }}">{{ $t->es4 }}</option>
                        @endforeach
                    </select>
                    @error('input_es4') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                        <th class="text-left">Name</th>
                        <th class="text-left">Username</th>
                        <th class="text-left">Role</th>
                        <th class="text-left">Fitur</th>
                        {{-- <th class="text-left">Instansi</th> --}}
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($lists as $list)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $list->name }}</td>
                        <td class="text-left">{{ $list->username }}</td>
                        <td class="text-left">{{ $list->role }}</td>
                        <td class="text-left">{{ $list->fitur }}</td>
                        {{-- <td class="text-left">{{ 'KL: '.$list->kl }}<br>{{ 'ES 1: '.$list->es1 }}<br>{{ 'ES 2: '.$list->es2 }}<br>{{ 'ES 3: '.$list->es3 }}<br>{{ 'ES 4: '.$list->es4 }}<br></td> --}}
                        <td style="text-align: center;">
                            <button wire:click="resetPassword({{ $list->id }})" class="btn btn-sm btn-warning" style="width:auto; margin: 2px" onclick="confirm('Are you sure to reset password?') || event.stopImmediatePropagation()"><i class="fas fa-key"></i></button>
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
