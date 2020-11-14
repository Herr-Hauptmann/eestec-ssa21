<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizator extends Model
{
    protected $table = 'organizator';

    protected $fillable = ['ime', 'prezime', 'slika', 'mail', 'telefon'];

    public function edicije()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_organizator_pozicija');
    }

    public function pozicije()
    {
        return $this->belongsToMany('App\Models\Pozicija', 'edicija_organizator_pozicija');
    }

}
