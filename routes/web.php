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
                                                    // Ngasih nama buat route index tuh manggilnya cukup pake tudu       
Route::get('/tudu',[TodoController::class,'index'])->name('tudu');
                                                    // Ngasih nama buat route store, jadi manggilnya pake tudu.post
Route::post('/tudu',[TodoController::class,'store'])->name('tudu.post'); // POST BIASANYA BUAT FORM DAN POST INI BERASAL DARI POST DI FORM DARI VIEW
Route::put('/tudu/{id}',[TodoController::class,'update'])->name('tudu.update'); // buat alur route nya pake method put, dan di arahin ke fungsi update