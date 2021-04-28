<div wire:ignore.self class="modal fade text-dark" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" wire:submit.prevent="login()" id="formLogin">
                    <div class="form-group">
                        <label class="font-weight-bold">NIP</label>
                        <input type="text" wire:model.lazy="username"
                            class="form-control @error('username') is-invalid @enderror"
                            placeholder="NIP">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">PASSWORD</label>
                        <input type="password" wire:model.lazy="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" form="formLogin" wire:click.prevent="login()" class="btn btn-success">Login</button>
            </div>
        </div>
    </div>
</div>
