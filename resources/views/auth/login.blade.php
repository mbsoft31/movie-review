@extends('app')

@section('layout')
    <div class="container mx-auto max-h-screen">
        <div class="flex items-center justify-center h-screen">
            <div class="w-full md:w-2/3 lg:w-1/2 bg-white pb-12 rounded-md">

                <h1 class="my-12 text-center text-3xl font-semibold font-serif tracking-wider text-blue-800">
                    Login
                </h1>

                <form class="flex flex-col justify-center items-center" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex flex-col md:flex-row md:items-center w-full mb-4">
                        <label for="email" class="block md:w-1/3 px-4 md:px-0 text-lg md:text-right">
                            {{ __('E-Mail Address') }}
                        </label>

                        <div class="w-full md:w-2/3 py-2 px-4">
                            <input id="email" type="email" class="w-full text-lg px-2 py-2 text-gray-800 bg-gray-100 rounded shadow @error('email') border border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="false" autofocus>

                            @error('email')
                            <span class="text-red-500 font-semibold" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row md:items-center w-full mb-4">
                        <label for="password" class="block w-1/3 px-4 md:px-0 text-lg md:text-right">
                            {{ __('Password') }}
                        </label>

                        <div class="w-full md:w-2/3 py-2 px-4">
                            <input id="password" type="password"
                                   class="w-full text-lg px-2 py-2 text-gray-800 bg-gray-100 rounded shadow @error('password') border border-red-500 @enderror" name="password" required
                                   autocomplete="current-password">

                            @error('password')
                            <span class="text-red-500 font-semibold" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center w-full mb-2">
                        <div class="w-1/3 px-4 md:px-0 hidden md:block"></div>
                        <div class="w-2/3 py-2 px-4">
                            <div class="form-check">
                                <input class="border border-black shadow-md w-4 h-4 rounded-md bg-gray-200" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="md:text-lg" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center w-full mb-2">
                        <div class="w-1/3 px-4 md:px-0 hidden md:block"></div>
                        <div class="w-2/3 py-2 px-4">
                            <button type="submit" class="w-20 mr-2 py-2 text-base rounded shadow bg-blue-600 text-white hover:bg-blue-500 hover:shadow-lg">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="py-2 text-base text-blue-600 hover:text-blue-700" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            @if (Route::has('register'))
                                <a class="block py-2 text-base text-blue-600 hover:text-blue-700" href="{{ route('register') }}">
                                    {{ __('Don\'t have an account yet? Register') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
