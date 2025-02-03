<?php

use App\Http\Controllers\HaloController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo',[HaloController::class,'index']); // 1. NAMPILIN DARI HALOCONTROLLER, BUKAN LANGSUNG DARI RESOURCE, SI INDEX INI DARI PUBLIC FUNGSI NYA. => BUKA CONTROLLER