@extends('layouts.auth')

@section('content')
    <div class="col-lg-6 bg-white">
        <div class="d-flex align-items-center px-4 px-lg-5 h-100 bg-dash-dark-2">
            <form class="login-form py-5 w-100" method="POST"
                action="{{ str()->startsWith(request()->path(), 'admin') ? route('admin.login') : route('member.login') }}">
                @csrf
                <div class="input-material-group mb-3">
                    <input class="input-material @error('email') is-invalid @enderror" id="login-email" type="email"
                        autocomplete="email" required data-validate-field="email" name="email" value="{{ old('email') }}"
                        autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label class="label-material" for="login-email">{{ __('Email Address') }}</label>
                </div>
                <div class="input-material-group mb-3">
                    <input class="input-material @error('password') is-invalid @enderror" id="login-password"
                        type="password" required name="password" required autocomplete="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label class="label-material" for="login-password">{{ __('Password') }}</label>
                </div>
                <div class="input-material-group mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <button class="btn btn-primary mb-3" id="login" type="submit">{{ __('Login') }}</button>
                @if (Route::has(str()->startsWith(request()->path(), 'admin') ? 'admin.password.request' : 'member.password.request'))
                    <br>
                    <a class="text-sm text-paleBlue"
                        href="{{ str()->startsWith(request()->path(), 'admin') ? route('admin.password.request') : route('member.password.request') }}">{{ __('Forgot Your Password?') }}</a>
                @endif
                @if (Route::has(str()->startsWith(request()->path(), 'admin') ? 'admin.register' : 'member.register'))
                    <br>
                    <small class="text-gray-500">Do not
                        have an account? </small>
                    <a class="text-sm text-paleBlue"
                        href="{{ str()->startsWith(request()->path(), 'admin') ? route('admin.register') : route('member.register') }}">{{ __('Signup') }}</a>
                @endif
            </form>
        </div>
    </div>
@endsection
