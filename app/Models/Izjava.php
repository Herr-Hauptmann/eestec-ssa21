<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izjava extends Model
{
    protected $table = 'izjava';

    protected $fillable = ['ime', 'prezime', 'tekst', 'slika'];
}
