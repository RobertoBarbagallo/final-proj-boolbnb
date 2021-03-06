@extends('layouts.app')

@section('content')
<div class="mycont">
    <video class="myvideo" autoplay muted loop>
            <source src="{{asset('storage/videos/Login-Video.mp4')}}" type="video/mp4">
    </video>    

    <div class="row">
            <div class="card myregistercard">
                <div class="card-header text-center py-1">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row mb-2">
                            <label for="name" class="col-md-4 col-sm-12 text-center col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6 col-sm-12">
                                <input class="myinput" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="lastname" class="col-md-4 col-sm-12 text-center col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6 col-sm-12">
                                <input class="myinput" id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autofocus>

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="birth_date" class="col-md-4 col-sm-12 text-center col-form-label text-md-right">{{ __('Birthdate') }}</label>

                            <div class="col-md-6 col-sm-12">
                                <input class="myinput" id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" autofocus>

                                @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="phone" class="col-md-4 col-sm-12 text-center col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6 col-sm-12">
                                <input class="myinput" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="user_img_path" class="col-md-4 col-sm-12 text-center col-form-label text-md-right">{{ __('User Image') }}</label>
                            <div class="col-md-6 col-sm-12">
                                <input class="myinput myregisterinputfile" type="file" accept=".jpg, .jpeg, .png, .bmp, .gif, .svg, .webp" class="form-control-file  @error('user_img_path') is-invalid @enderror" id="user_img_path" name="user_img_path">
                                @error('user_img_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-4 col-sm-12 text-center col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6 col-sm-12">
                                <input class="myinput" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>   
                        <div class="form-group row mb-2">
                            <label for="password" class="col-md-4 col-sm-12 text-center col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6 col-sm-12">
                                <input class="myinput" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="password-confirm" class="col-md-4 col-sm-12 text-center col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6 col-sm-12">
                                <input class="myinput" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mt-3 mb-2">
                            <div class="col text-center">
                                <button type="submit" class="mybtn default">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
