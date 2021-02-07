<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novost extends Model
{
    use HasFactory;
    protected $table = 'novost';

    protected $fillable = ['naslov', 'tekst', 'slika', 'datum'];
}
