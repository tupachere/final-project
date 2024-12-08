@extends('layouts.master')
@section('title', 'Project WEB')

@section('content')
<body id="login">
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input
                    type="text"
                    class="input-field"
                    name="email"
                    placeholder="Email"
                    required
                    autofocus
                >
                <input
                    type="password"
                    class="input-field"
                    name="password"
                    placeholder="Password"
                    required
                >
                <button class="login-btn" type="submit">Sign In</button>
            </form>
        </div>
    </div>
</body>
@endsection
