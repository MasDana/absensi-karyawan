@extends('/layout/layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('konten')
    <div class="login-container">
        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/sesi/login" method="POST">
            @csrf
            <h2>Login</h2>
            <br>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" value="{{ Session::get('email') }}" name="email" placeholder="Email">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="akun">
                <p>Belum punya akun? <a href="{{ url('/register') }}">Register</a></p>
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>
@endsection
