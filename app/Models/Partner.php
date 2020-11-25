<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partner';

    protected $fillable = ['naziv', 'slika', 'link'];

    public function edicije()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_partner_kategorija');
    }

    public function kategorije()
    {
        return $this->belongsToMany('App\Models\Kategorija', 'edicija_partner_kategorija');
    }
    use HasFactory;
}
