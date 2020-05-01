@extends('app')

@section('layout')
    <div class="container mx-auto max-h-screen">
        <div class="flex items-center justify-center h-screen">
            <div class="w-1/2 bg-white pb-12 rounded-md">

                <h1 class="my-12 text-center text-3xl font-semibold font-serif tracking-wider text-blue-800">
                    Register
                </h1>

                <form class="flex flex-col justify-center items-center space-y-6 space-y-reverse"
                      method="POST"
                      action="{{ route('register') }}"
                    >

                    @csrf

                    <div class="flex items-center w-full space-x-4 px-4">
                        <label for="username" class="w-1/3 text-lg text-right">{{ __('username') }}</label>

                        <div class="w-2/3">
                            <input id="username" type="text"
                                   class="w-full py-2 px-2 text-gray-800 bg-gray-100 rounded border @error('username') border-red-500 @enderror"
                                   name="username" value="{{ old('username') }}" required>

                            @error('username')
                            <span class="block text-red-500 font-semibold" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center w-full space-x-4 px-4">
                        <label for="email" class="w-1/3 text-lg text-right">{{ __('E-Mail Address') }}</label>

                        <div class="w-2/3">
                            <input id="email" type="email"
                                   class="w-full py-2 px-2 text-gray-800 bg-gray-100 rounded border @error('email') border border-red-500 @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="block text-red-500 font-semibold" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center w-full space-x-4 px-4">
                        <label for="password" class="w-1/3 text-lg text-right">{{ __('Password') }}</label>

                        <div class="w-2/3">
                            <input id="password" type="password"
                                   class="w-full py-2 px-2 text-gray-800 bg-gray-100 rounded border @error('password') border border-red-500 @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="block text-red-500 font-semibold" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center w-full space-x-4 px-4">
                        <label for="password-confirm"
                               class="w-1/3 text-lg text-right">{{ __('Confirm Password') }}</label>

                        <div class="w-2/3">
                            <input id="password-confirm" type="password"
                                   class="w-full py-2 px-2 text-gray-800 bg-gray-100 rounded border"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="flex items-center w-full space-x-4 px-4">
                        <div class="w-1/3"></div>
                        <div class="w-2/3">
                            <button type="submit"
                                    class="w-20 py-2 text-base rounded shadow bg-blue-600 text-white hover:bg-primary hover:shadow-lg">
                                {{ __('Register') }}
                            </button>
                            @if (Route::has('login'))
                                <a class="text-base text-blue-600 hover:text-primary" href="{{ route('login') }}">
                                    {{ __('Already have an account? Login') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
