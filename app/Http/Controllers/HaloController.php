<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HaloController extends Controller
{
    //2.NAH DISINI BISA LIAT SI PUBLIC INDEX NYA BUAT NGATUR NAMPILIN SI VIEW PAKE RETURN VIEW 'DASHBOARD(FOLDER).HALO(FILE)'
    public function index () 
    {
        // INI BUAT MASUKIN DARI CONTROLLER KE WEB YANG ADA DI VIEW NYA. => BUKA VIEW
        $nama = 'Kocak';
        $panggil = ['nama' => $nama]; // NAH SI 'nama' INI YANG JADI DIPAKE DI VIEW NYA => BUKA VIEW
        return view ('dashboard.halo', $panggil);
    }
}
