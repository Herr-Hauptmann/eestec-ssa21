<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partner';

    protected $fillable = ['naziv', 'slika', 'link'];

    public function edicije()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_partner_kategorija', 'partner_id', 'edicija_id');
    }

    public function kategorije()
    {
        return $this->belongsToMany('App\Models\Kategorija', 'edicija_partner_kategorija', 'partner_id', 'kategorija_id');
    }
}
