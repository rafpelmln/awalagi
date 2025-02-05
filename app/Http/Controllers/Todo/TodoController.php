<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // INI AWALNYA DI WEB ROUTE, AWALNYA DISITU LANGSUNG KE VIEW NYA, TAPI SEKAKRANG INI DIPINDAHIN JADI KE CONTROLLER BUAT JALUR
        return view('todo.app');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // buat form penambahan data  
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // menyimpan data
    {
        // VALIDASI REQUEST Last 
        $request->validate([
            'task' => 'required|min:3|max:25'
        ],[
            'task.required' => 'Task Wajib Diisi',
            'task.min' => 'Task harus diisi dengan minimal 3 karakter!',
            'task.max' => 'Task harus diisi dengan maksimal 25 karakter!',
        ]);

        // BUAT PROSES MASUKIN ATAU NYIMPEN DATA KE TABELNYA
        $data =[
            'task' => $request->input('task')  // Nama 'Task' ini diambil dari Nama kolom di database
        ];
        // masukin dari $data ini ke model 
        Todo::create($data);
        // Buat ngebalikin biar nampil ulang halaman yang sama, '/tudu' dari route nya
        // return redirect('/tudu.post')->with('success','Keren Data Berhasil Dimasukin!');

        // ini yang baru biar ngambilnya dari nama yang ada di web route
        return redirect()->route('tudu')->with('success','Keren Data Berhasil Dimasukin!'); // nah jadi ini tuh nge reddirect sehabis masukin data jadinya tuh balik lagi ke halaman index tudu nya, makanya ngambil nya bukan yang tudu post
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
