<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Schedule::all();
        // return $data; ini pake return data warna item
        return view('schedule.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|min:3'
        ], [
            'slug.required' => 'nama wajib diisi',
            'slug.min' => 'password minimal 3 karakter'

        ]);

        $data = [
            'slug' => $request->slug,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,

        ];

        Schedule::create($data);

        return redirect('schedule');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // 

    public function edit(string $id)
    {
        // Pastikan id yang diterima adalah integer
        $scheduleId = (int)$id;

        // Mengambil data berdasarkan id
        $data = Schedule::where('id', $scheduleId)->first();

        // Jika data tidak ditemukan, lemparkan pesan error atau redirect
        if (!$data) {
            return redirect('/schedule/index')->withErrors(['message' => 'Schedule not found.']);
        }

        // Kirim data ke view
        return view('schedule/edit')->with('data', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {

    //     $data = [
    //         'slug' => $request->input('slug'),
    //         'time_in' => $request->input('time_in'),
    //         // 'time_in' => Carbon::createFromFormat('H:i:s', $request->time_in),
    //         'time_out' => $request->input('time_out'),

    //     ];



    //     Schedule::where('id', $id)->update($data);
    //     return redirect('/schedule/index');
    // }
    public function update(Request $request, string $id)
    {
        // Pastikan id yang diterima adalah integer
        $scheduleId = (int)$id;

        // Validasi input
        $request->validate([
            'slug' => 'required|string',
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i',
        ]);

        $data = [
            'slug' => $request->input('slug'),
            'time_in' => $request->input('time_in'),
            'time_out' => $request->input('time_out'),
        ];

        // Pastikan id yang digunakan adalah integer
        Schedule::where('id', $scheduleId)->update($data);

        return redirect('/schedule');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Schedule::where('id', $id)->delete();
        return redirect('/schedule');
    }
}
