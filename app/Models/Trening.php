<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trening extends Model
{
    use HasFactory;

    protected $table = 'trening';

    protected $fillable = ['naziv', 'slika', 'opis'];

    public function edicije()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_trener_trening', 'trening_id', 'edicija_id');
    }

    public function treneri()
    {
        return $this->belongsToMany('App\Models\Trener', 'edicija_trener_trening', 'trening_id', 'trener_id');
    }
}
