@extends('auth.app')

@section('auth_content')
<div>
    <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
        <h1 class="lg:text-3xl text-xl font-semibold  mb-6"> Verify account</h1>
        <p class="mb-2 text-black text-lg"> Your Code</p>
        <form action="{{ route('verify', Auth::id()) }}" method="POST">
            @csrf
            <input type="number" name="code" placeholder="XXXXXX" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
            @error('code')
                <strong class="text-red-500 mb-3">{{ $message }}</strong>
            @enderror

            <button type="submit" class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">Verify my account</button>
            <div class="text-center mt-5 space-x-2">
                <p class="text-base"> Don't have a code ? <a href="{{ route('register') }}" class=""> Resend code </a></p>
            </div>
        </form>
    </div>
</div>
@endsection
