<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizator extends Model
{
    use HasFactory;

    protected $table = 'organizator';

    protected $fillable = ['ime', 'prezime', 'slika', 'mail', 'telefon'];

    protected $custom_attributes = [
        'pozicija'  => Pozicija::class,
        'edicija'   => Edicija::class,
    ];

    public function edicije()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_organizator_pozicija', 'organizator_id', 'edicija_id');
    }

    public function pozicije()
    {
        return $this->belongsToMany('App\Models\Pozicija', 'edicija_organizator_pozicija', 'organizator_id', 'pozicija_id');
    }
}
