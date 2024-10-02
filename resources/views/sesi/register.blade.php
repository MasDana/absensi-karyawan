@extends('/layout/layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('konten')

<section class="container">

    {{-- @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="/sesi/create" method="POST" class="form">
        @csrf
        <h1>Register</h1>
        <br>

        <div class="input-box">
            <label for="employee_id">Employee Id</label>
            <input type="text" id="employee_id" name="employee_id" placeholder="Nomor Karyawan" class="@error('employee_id') is-invalid @enderror">
            @error('employee_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

        <div class="column">
        <div class="input-box">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="name" placeholder="Nama" class="@error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

        <div class="input-box">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" class="@error('email') is-invalid @enderror">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        </div>

        <div class="column">
            <div class="input-box">
                <label for="phone_number">No Hp</label>
                <input type="text" id="phone_number" name="phone_number" placeholder="Nomor Hp" class="@error('phone_number') is-invalid @enderror" required>
                @error('phone_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>

            <div class="input-box">
                <label for="birthdate">Tanggal Lahir</label>
                <input type="date" id="birthdate" name="birthdate" placeholder="Tanggal Lahir" class="@error('birthdate') is-invalid @enderror">
                @error('birthdate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>

        </div>

        <div class="input-box">
            <label for="address">Alamat</label>
            <input type="text" id="address" name="address" placeholder="Alamat" class="@error('address') is-invalid @enderror">
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

        <div class="gender-box">
            <h3>Gender</h3>
            <div class="gender-option">
                <div class="gender">
                    <input type="radio" id="male" name="gender" checked>
                    <label for="male">Male</label>
                </div>
                <div class="gender">
                    <input type="radio" id="female" name="gender">
                    <label for="female">Female</label>
                </div>
            </div>
        </div> 

        <div class="column">
            <div class="input-box">
                <label for="position_id">Position</label>
                <select id="position_id" name="position_id" required>
                    <option value="" disabled selected>Pilih Position</option>
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-box">

            <label for="schedule_id">Schedule</label>
                <select id="schedule_id" name="schedule_id" required>
                    <option value="" disabled selected>Pilih Schedule</option>
                    @foreach($schedules as $schedule)
                        <option value="{{ $schedule->id }}">{{ $schedule->slug }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="column">
        <div class="input-box">
            <label for="password">Password</label>
            <div class="input-wrapper">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror">
            <img src="{{ asset('gambar/buka.png') }}" onclick="pass2()" class="pass-icon2" id="pass-icon2" alt="Toggle Password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        </div>

        <div class="input-box">
            <label for="password">Confirm Password</label>
            <div class="input-wrapper">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
            <img src="{{ asset('gambar/buka.png') }}" onclick="pass1()" class="pass-icon1" id="pass-icon1" alt="Toggle Password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        </div>
        </div>

        <br>
        <div class="akun">
            <p>Sudah punya akun? <a href="{{ url('/sesi') }}">Login</a></p>
        </div>

        <button type="submit">Register</button>

    </form>

</section>

@section('java')

<script src="{{ asset('js/register.js') }}"></script>
    
@endsection

@endsection
