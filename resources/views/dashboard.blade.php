@extends('layout/layout')

@section('konten')
    <form action="/sesi/logout" method="get">
        <button type="submit">Logout</button>
    </form>
@endsection