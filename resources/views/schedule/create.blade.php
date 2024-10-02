@extends('layout/layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('konten')

<form action="/schedule" method="POST">
    @csrf
    <h2>Tambah Jadwal</h2>
    <br>
    <div class="input-group">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="slug" placeholder="Nama">
    </div>
    <div class="input-group">
        <label for="email">Time In</label>
        <input type="time" name="time_in" id="time">
    </div>
    <div class="input-group">
        <label for="password">Time Out</label>
        <input type="time" name="time_out" id="time">
    </div>

    <button type="submit">Masukkan</button>
</form>
</div>
    
@endsection