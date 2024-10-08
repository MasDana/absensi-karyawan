@extends('layout/layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('konten')

{{-- <form action="{{ '/schedule/$data->id' }}" method="POST"> --}}
    <form action="{{ url('/schedule/' . $data->id) }}" method="POST">

    @csrf
    @method('PUT')
    <h2>Edit Jadwal</h2>
    <br>
    <div class="input-group">
        <h1>nomor induk : {{ $data->id }}</h1>
    </div>
    <div class="input-group">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="slug" placeholder="Nama" value="{{ $data->slug }}">
    </div>
    <div class="input-group">
        <label for="time_in">Time In</label>
        <input type="time" name="time_in" id="time_in" 
               value="{{ date('H:i', strtotime($data->time_in)) }}" required>
    </div>
    <div class="input-group">
        <label for="time_out">Time Out</label>
        <input type="time" name="time_out" id="time_out" 
               value="{{ date('H:i', strtotime($data->time_out)) }}" required>
    </div>
    
    {{-- <div class="input-group">
        <label for="email">Time In</label>
        <input type="time" name="time_in" id="time" value="{{ $data->time_in,  date('H:i', strtotime($data->time_in)) }}">
    </div>
    <div class="input-group">
        <label for="password">Time Out</label>
        <input type="time" name="time_out" id="time" value="{{ $data->time_out,  date('H:i', strtotime($data->time_out)) }}">
    </div> --}}

    <button type="submit">Masukkan</button>
</form>
</div>
    
@endsection