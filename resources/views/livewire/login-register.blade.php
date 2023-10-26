<div class="card p-4 w-100 mx-auto">

    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    @if($registerForm)
        <form>
            <div class="row">
                <h3 class="d-flex justify-content-center w-100">E-mmobilier</h3>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name :</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" wire:model="password" class="form-control">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn text-white btn-success" wire:click.prevent="registerStore">Register</button>
                </div>
                <div class="col-md-12">
                    <a class="text-primary" wire:click.prevent="register"><strong>Login</strong></a>
                </div>
            </div>
        </form>
    @else

        <form>
            <h3 class="d-flex justify-content-center w-100">E-mmobilier</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" wire:model="password" class="form-control">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12 text-center my-2">
                    <button class="btn text-white btn-success" wire:click.prevent="login">Login</button>
                </div>
                <div class="mt-4 col-md-12 my-2">
                    Don't have account? <a class="btn btn-primary text-white" wire:click.prevent="register"><strong>Register Here</strong></a>
                </div>
            </div>
        </form>
    @endif

    <style>
        .form-control {
            background-color: #343a40 !important;
            color: white !important;
            border: none !important;
            border-bottom: 2px solid rgba(190, 155, 155, 0.327) !important
        }
        .form-control:focus {
            border: none !important;
            border-bottom: 2px solid rgba(190, 155, 155, 0.327) !important
        }
    </style>
</div>
