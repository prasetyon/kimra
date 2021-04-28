<div class="card col-lg-4">
    <form wire:submit.prevent="store()">
        <div class="card-body">
            <!-- Select -->
            <div class="form-group">
                <label for="old_password">Current Password</label>
                <input type="password" wire:model="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror">
                @error('old_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" wire:model="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror">
                @error('new_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="re_password">Retype New Password</label>
                <input type="password" wire:model="re_password" id="re_password" class="form-control @error('re_password') is-invalid @enderror">
                @error('re_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="button" wire:click.prevent="store()" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
