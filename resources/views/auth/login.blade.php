@extends('layouts.master')
@section('title', 'Project WEB')

@section('content')
<body id="login">
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>

            <!-- Error Message above Input Fields -->
            @if (session('error'))
                <div class="error-message" style="color: #403c3c; font-weight: bold; text-align: center; margin-bottom: 20px; background-color: #dededc; padding: 10px; border-radius: 5px;">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                @error('email')
                    <div class="error-feedback" style="color: #e36b6b; font-weight: bold; text-align: center; margin-bottom: 10px; background-color: #dededc; padding: 10px; border-radius: 5px;">
                        {{ $message }}
                    </div>
                @enderror
                <input
                    type="text"
                    class="input-field @error('email') is-invalid @enderror"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >

                @error('password')
                    <div class="error-feedback" style="color: #e36b6b; font-weight: bold; text-align: center; margin-bottom: 10px; background-color: #dededc; padding: 10px; border-radius: 5px;">
                        {{ $message }}
                    </div>
                @enderror
                <input
                    type="password"
                    class="input-field @error('password') is-invalid @enderror"
                    name="password"
                    placeholder="Password"
                    required
                >

                <button class="login-btn" type="submit">Sign In</button>
            </form>

            <div class="home-link">
                <a href="{{ url('/') }}" class="btn btn-secondary btn-sm" style="background-color: #213555">Back to Home</a>
            </div>
        </div>
    </div>
</body>
@endsection
