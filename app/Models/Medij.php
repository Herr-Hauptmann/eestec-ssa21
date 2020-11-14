<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medij extends Model
{
    protected $table = 'medij';

    protected $fillable = ['naziv', 'link', 'slika'];

    public function edicije()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_medij_kategorija');
    }

    public function kategorije()
    {
        return $this->belongsToMany('App\Models\Kategorija', 'edicija_medij_kategorija');
    }
}
