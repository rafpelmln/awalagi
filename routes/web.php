<?php

use App\Http\Controllers\HaloController;
use App\Http\Controllers\Todo\TodoController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo',[HaloController::class,'index']); // 1. NAMPILIN DARI HALOCONTROLLER, BUKAN LANGSUNG DARI RESOURCE, SI INDEX INI DARI PUBLIC FUNGSI NYA. => BUKA CONTROLLER

// Route::get('/tudu', function () {
//     return view('todo.app');
// });

Route::get('/tudu',[TodoController::class,'index']);
Route::post('/tudu',[TodoController::class,'store']); // POST BIASANYA BUAT FORM DAN POST INI BERASAL DARI POST DI FORM DARI VIEW