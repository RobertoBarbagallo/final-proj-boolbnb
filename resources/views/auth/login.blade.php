@extends('layouts.app')

@section('content')
<div class="mycont">
       <video class="myvideo" autoplay muted loop>
            <source src="{{asset('storage/videos/Login-Video.mp4')}}" type="video/mp4">
        </video>    

        <div class="card mylogincard">
            <div class="card-header py-1 text-center">{{ __('Login') }}</div>

            <div class="card-body px-1">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row mb-2">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control mylogininput py-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control mylogininput py-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 text-center m-auto">
                            <a type="submit" class="mybtn default px-3">
                                {{ __('Login') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       
</div>
@endsection
