<div class="modal fade p-0" id="login-register">
    <div class="modal-dialog" role="document">
      <div class="modal-content mt-3 m-auto">
        <div class="modal-body d-flex flex-column w-100">
            <div class="d-flex justify-content-between w-100">
                <a href="#" class="modal-login col-6 text-center text-decoration-none" id="login">Login</a>
                <a href="#" class="modal-register col-6 text-center text-decoration-none" id="register">Register</a>
                <button type="button" class="close-login position-relative" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="form-login flex-column d-block mx-auto" id="form-login">
                <form method="POST" action="{{ route('login') }}" class="d-flex flex-column">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="lable-input">User Name</label>
                        <input id="name" type="text" class="input-text form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password"  class="lable-input">Password</label>
                        <input id="password" type="password" class="input-text form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <div class="form-check custom-checkbox custom-control">
                            <input class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot password</a>
                    </div>
                    <button type="submit" class="btn btn-primary login-btn mx-auto">
                        {{ __('Login') }}
                    </button>
                </form>
                <p class="text-center">Login With</p>
                <button class="mb-3 w-100 login-google-btn btn p-2"><i class="fab fa-google-plus-g mr-2"></i>Google</button>
                <button class="mb-3 w-100 login-fb-btn btn p-2"><i class="fab fa-facebook-f mr-2"></i>Facebook</button>
            </div>
            <div class="form-register mx-auto d-none" id="form-register">
                <form method="POST" action="{{ route('register') }}" class="d-flex flex-column">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="lable-input">User Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="lable-input">Email</label>
                        <input id="email" type="email" class="input-text form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="lable-input">Password</label>
                        <input id="password" type="password" class="input-text form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="re-password" class="lable-input">Repeat Password:</label>
                        <input id="password-confirm" type="password" class="input-text form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <button type="submit" class="btn btn-primary mb-3 mx-auto p-2 login-btn">
                        {{ __('Register') }}
                    </button>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
