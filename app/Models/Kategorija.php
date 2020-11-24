<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    protected $table = 'kategorija';

    protected $fillable = ['naziv'];

    public function edicijeMedij()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_medij_kategorija');
    }

    public function mediji()
    {
        return $this->belongsToMany('App\Models\Medij', 'edicija_medij_kategorija');
    }

    public function edicijePartner()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_partner_kategorija');
    }

    public function partneri()
    {
        return $this->belongsToMany('App\Models\Partner', 'edicija_partner_kategorija');
    }

    public function partneri2()
    {
        return $this->hasMany('App\Models\Partner');
    }
}
