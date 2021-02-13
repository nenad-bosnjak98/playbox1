@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:36px; margin-left:52.2%; margin-top:10%; margin-bottom:1%">{{ __('Register') }}</div>

                <div class="card-body" style="margin-left: 45%;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="font-size:23px">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class=" text-black bg-gray-300 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                style="width:45%">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="font-size:23px">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class=" text-black bg-gray-300 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                style="width:45%">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="font-size:23px">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class=" text-black bg-gray-300 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                                style="width:45%">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="font-size:23px">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class=" text-black bg-gray-300 form-control" name="password_confirmation" required autocomplete="new-password"
                                style="width:45%">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mt-4 " style="font-size:20px">
                                <button type="submit" class="btn btn-primary bg-gray-200 hover:bg-red-700 hover:text-white border border-gray-400 text-blue-700 font-bold py-1 px-2 rounded-lg">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
