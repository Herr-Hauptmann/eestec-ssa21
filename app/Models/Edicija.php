<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edicija extends Model
{
    protected $table = 'edicija';

    protected $fillable = ['naziv', 'logo', 'datum_odrzavanja', 'mjesto_odrzavanja', 'datum_otvaranja_prijava', 'datum_zatvaranja_prijava', 'broj_ucesnika'];

    public function organizatori()
    {
        return $this->belongsToMany('App\Models\Organizator', 'edicija_organizator_pozicija');
    }

    public function pozicije()
    {
        return $this->belongsToMany('App\Models\Pozicija', 'edicija_organizator_pozicija');
    }

    public function treninzi()
    {
        return $this->belongsToMany('App\Models\Trening', 'edicija_trener_trening');
    }

    public function treneri()
    {
        return $this->belongsToMany('App\Models\Trener', 'edicija_trener_trening');
    }

    public function kategorijeMedij()
    {
        return $this->belongsToMany('App\Models\Kategorija', 'edicija_medij_kategorija');
    }
    public function mediji()
    {
        return $this->belongsToMany('App\Models\Medij', 'edicija_medij_kategorija');
    }

    public function kategorijePartner()
    {
        return $this->belongsToMany('App\Models\Kategorija', 'edicija_partner_kategorija');
    }
    public function partneri()
    {
        return $this->belongsToMany('App\Models\Partner', 'edicija_partner_kategorija');
    }

    public function slike()
    {
        return $this->hasMany('App\Models\Galerija');
    }
}
