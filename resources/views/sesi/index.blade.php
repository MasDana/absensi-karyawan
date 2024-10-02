@extends('/layout/layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('konten')

<section class="container">
    <div class="login-container">
        @if ($errors->has('default'))
    <div class="error-box">
        <p>{{ $errors->first('default') }}</p>
    </div>
@endif


        <form action="/sesi/login" method="POST" class="form">
            @csrf
            <h2>Login</h2>
            <br>

            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" value="{{ Session::get('email') }}" name="email" placeholder="Email" class="@error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-box">
                <label for="password">Password</label>
                <div class="password">
                    <input type="password" id="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror">
                    <img src="{{ asset('gambar/buka.png') }}" onclick="pass()" class="pass-icon" id="pass-icon" alt="Toggle Password">

                </div>

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            
            <br>

            <div class="akun">
                <p>Belum punya akun? <a href="{{ url('/register') }}">Register</a></p>
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>
</section>

@section('java')

<script src="{{ asset('js/index.js') }}"></script>
    
@endsection

@endsection
