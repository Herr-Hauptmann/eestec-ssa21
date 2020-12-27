<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prijava extends Model
{
    protected $table = 'Prijava';

    protected $fillable = ['ime', 'prezime', 'zvjezdica', 'ukupniBodovi','idEdicije'];
}