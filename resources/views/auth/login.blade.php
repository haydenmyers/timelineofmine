@extends('layouts.master')

@section('app')
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="bg-blue-200 px-8 py-6 rounded-md">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
            
                    <div>
                        <label for="email">{{ __('E-Mail Address') }}</label>
            
                        <div>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                            @error('email')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div>
                        <label for="password">{{ __('Password') }}</label>
            
                        <div>
                            <input id="password" type="password" class="@error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">
            
                            @error('password')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div>
                        <div>
                            <div>
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
            
                                <label for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
            
                    <div>
                        <div>
                            <button type="submit">
                                {{ __('Login') }}
                            </button>
            
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
