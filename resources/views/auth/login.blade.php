

@extends('layouts.app')

@section('content')

<!-- LogIn -->
<div class="login" style="background-image: url('{{ asset('img/login.jpg') }}')">
    <div class="overlay">
        <div class="row">
            <div class="mt-5 pt-3 w-100">
                <div class="form-content">
                    <div class="logo text-center">
                        <h3>{{ __('Login') }}</h3>
                    </div>
                    <h4 class="text-center">Management Section</h4>
                    <form class="" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="name">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="Password">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="btn-form w-100">
                        <button type="submit" class="btn btn-primary btn-log">Log in</button>
                        <a href="{{ route('password.request') }}" class=" text-right">forget Password?</a>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 




