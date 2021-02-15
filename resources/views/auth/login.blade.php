@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input id="email" type="email" class="form-control text-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="نام کاربری یا ایمیل">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group ">
            <input id="password" type="password" class="form-control text-left @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="کلمه عبور">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group d-sm-flex justify-content-between text-left mb-4">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">به خاطر سپاری</label>
            </div>
        </div>

        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary btn-block">ورود به سیستم</button>

            {{--
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif--}}
        </div>
    </form>

@endsection
