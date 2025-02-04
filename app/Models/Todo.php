<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $table = 'todo'; // BUAT MASUKIN SI DATA NYA KE TABEL TODO
    protected $fillable = ['task', 'is_done']; // BUAT MASUKIN SI DATA NYA KE KOLOM DI TABEL TODO
}
