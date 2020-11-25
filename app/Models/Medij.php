<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medij extends Model
{
    use HasFactory;

    protected $table = 'medij';

    protected $fillable = ['naziv', 'link', 'slika'];

    public function edicije()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_medij_kategorija', 'medij_id', 'edicija_id');
    }

    public function kategorije()
    {
        return $this->belongsToMany('App\Models\Kategorija', 'edicija_medij_kategorija', 'medij_id', 'kategorija_id');
    }
}
