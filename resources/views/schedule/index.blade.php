@extends('layout/layout')

@section('css')

<link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
    
@endsection

@section('konten')

{{-- {{ json_encode($data) }} --}}

<a href="/schedule/create" class="btn btn-primary">Tambah Jadwal</a>



<table class="table">
    <thead class="thead-dark">
        <tr>
            <th data-priority="1">#</th>
            <th data-priority="2">Shift</th>
            <th data-priority="3">Time In</th>
            <th data-priority="4">Time Out</th>
            <th data-priority="5">Actions</th>
        </tr>
    </thead>

    <tbody>

    @foreach ($data as $schedule)
        <tr>
            <td>{{ $schedule->id }}</td>
            <td>{{ $schedule->slug }}</td>
            <td>{{ $schedule->time_in }}</td>
            <td>{{ $schedule->time_out }}</td>
            <td> <a href='{{ url('/schedule/'.$schedule->id.'/edit')  }}' class="btn btn-primary">Edit Jadwal</a> 
                <br> 
                <form onsubmit="return confirm('Betul kh?')" action="{{ '/schedule/'.$schedule->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus Jadwal</button>
                </form>
            {{-- <a href="/schedule/delete" class="btn btn-primary">Hapus Jadwal</a></td> --}}

        </tr>
    @endforeach

    </tbody>
</table>
    
@endsection