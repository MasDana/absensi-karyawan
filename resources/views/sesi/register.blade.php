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

        <form action="/sesi/create" method="POST">
            @csrf
            <h2>Register</h2>
            <br>
            <div class="input-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" value="{{ Session::get('name') }}" name="name" placeholder="Nama">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" value="{{ Session::get('email') }}" name="email" placeholder="Email">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password"  name="password" placeholder="Password">
            </div>
            <div class="akun">
                <p>Sudah punya akun? <a href="{{ url('/sesi') }}">Login</a></p>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
