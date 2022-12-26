@extends('auth.app')

@section('auth_content')
    <div>
        <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
            <h1 class="lg:text-3xl text-xl font-semibold mb-6"> Sign in</h1>
            <p class="mb-2 text-black text-lg"> Register to manage your account </p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="flex lg:flex-row flex-col lg:space-x-2">
                    <div>
                        <input type="text" value="{{ old('first_name') }}" placeholder="First Name" name="first_name"
                        class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    @error('first_name')
                        <strong class="text-red-500 mb-3">{{ $message }}</strong>
                    @enderror
                    </div>
                    <div>
                        <input type="text"  value="{{ old('last_name') }}" placeholder="Last Name" name="last_name"
                        class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800"
                        style="border: 1px solid #d3d5d8 !important;">
                    @error('last_name')
                        <strong class="text-red-500  mb-3">{{ $message }}</strong>
                    @enderror
                    </div>
                </div>
                <input type="text" id="pseudo" value="{{ old('pseudo') }}" name="pseudo" placeholder="Pseudo"
                    class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                @error('pseudo')
                    <strong class="text-red-500 mb-3">{{ $message }}</strong>
                @enderror

                <div>
                    @if (old('pseudo'))
                        @foreach (generateData('pseudo', old('pseudo')) as $item)
                            <span class="pseudo-proposal">{{ $item }}</span>
                        @endforeach
                    @endif
                </div>




                <input type="email" value="{{ old('email') }}" name="email" placeholder="Email"
                    class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                @error('email')
                    <strong class="text-red-500 mb-3">{{ $message }}</strong>
                @enderror
                <input type="password" name="password" placeholder="Password"
                    class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                @error('password')
                    <strong class="text-red-500 mb-3">{{ $message }}</strong>
                @enderror
                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                    class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                <div class="flex justify-start my-4 space-x-1">
                    <div class="checkbox">
                        <input type="checkbox" id="chekcbox1" checked>
                        <label for="chekcbox1"><span class="checkbox-icon"></span> I Agree</label>
                    </div>
                    <a href="#"> Terms and Conditions</a>
                </div>
                <button type="submit"
                    class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">Create an account</button>
                <div class="text-center mt-5 space-x-2">
                    <p class="text-base"> Do you have an account? <a href="{{ route('login') }}"> Login </a></p>
                </div>
            </form>
        </div>
    </div>
@endsection



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection --}}
