<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trener extends Model
{
    protected $table = 'trener';

    protected $fillable = ['ime', 'prezime', 'slika'];

    public function edicije()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_trener_trening');
    }

    public function treninzi()
    {
        return $this->belongsToMany('App\Models\Trening', 'edicija_trener_trening');
    }
}
