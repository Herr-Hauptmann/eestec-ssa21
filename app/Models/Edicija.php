<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edicija extends Model
{
    use HasFactory;

    protected $table = 'edicija';

    protected $fillable = ['naziv', 'logo', 'datum_pocetka', 'datum_kraja', 'mjesto_odrzavanja', 'datum_otvaranja_prijava', 'datum_zatvaranja_prijava', 'broj_ucesnika'];

    public function organizatori()
    {
        return $this
            ->belongsToMany(
                'App\Models\Organizator', 
                'edicija_organizator_pozicija', 
                'edicija_id', 'organizator_id'
                )
            ->select('organizator.*', 'pozicija.naziv as naziv_pozicije', 'pozicija.id AS pozicija_id')
            ->join(
                'pozicija', 
                'edicija_organizator_pozicija.pozicija_id', 
                '=', 
                'pozicija.id'
            );
    }

    public function pozicije()
    {
        return $this
            ->belongsToMany(
                'App\Models\Pozicija', 
                'edicija_organizator_pozicija', 
                'edicija_id', 
                'pozicija_id'
            )
            ->select('pozicija.*', 'CONCAT(organizator.ime, " ", organizator.prezime) AS ime_i_prezime_organizatora', 'organizator.id AS organizator_id')
            ->join(
                'organizator',
                'edicija_organizator_pozicija.organizator_id',
                '=',
                'organizator.id'
            );
    }

    public function treninzi()
    {
        return $this
            ->belongsToMany(
                'App\Models\Trening', 
                'edicija_trener_trening', 
                'edicija_id', 
                'trening_id'
                )
            ->select('trening.*', 'CONCAT(trener.ime, " ", trener.prezime) AS ime_i_prezime_trenera', 'trener.id AS trener_id')
            ->join(
                'trener',
                'edicija_trener_trening.trener_id',
                '=',
                'trener.id'
            );
    }

    public function treneri()
    {
        return $this
            ->belongsToMany(
                'App\Models\Trener', 
                'edicija_trener_trening', 
                'edicija_id', 
                'trener_id'
                )
            ->select('trener.*', 'trening.naziv AS naziv_treninga', 'trening.id AS trening_id')
            ->join(
                'trening',
                'edicija_trener_trening.trening_id',
                '=',
                'trening.id'
            );
    }

    public function kategorijeMedij()
    {
        return $this
            ->belongsToMany(
                'App\Models\Kategorija', 
                'edicija_medij_kategorija', 
                'edicija_id', 
                'kategorija_id'
                )
            ->select('kategorija.*', 'medij.naziv AS naziv_medija', 'medij.id AS medij_id')
            ->join(
                'medij',
                'edicija_medij_kategorija.medij_id',
                '=',
                'medij.id'
            );
    }
    public function mediji()
    {
        return $this
            ->belongsToMany(
                'App\Models\Medij', 
                'edicija_medij_kategorija', 
                'edicija_id', 
                'medij_id'
                )
            ->select('medij.*', 'kategorija.naziv AS naziv_kategorije', 'kategorija.id AS kategorija_id')
            ->join(
                'kategorija',
                'edicija_medij_kategorija.kategorija_id',
                '=',
                'kategorija.id'
            );
    }
    
    public function kategorijePartner()
    {
        return $this->
            belongsToMany(
                'App\Models\Kategorija', 
                'edicija_partner_kategorija',
                'edicija_id', 
                'kategorija_id'
                )
            ->select('kategorija.*', 'partner.naziv AS naziv_partnera', 'partner.id AS partner_id')
            ->join(
                'partner',
                'edicija_partner_kategorija.partner_id',
                '=',
                'partner.id'
            );
    }

    public function partneri()
    {
        return $this->
            belongsToMany(
                'App\Models\Partner', 
                'edicija_partner_kategorija', 
                'edicija_id', 
                'partner_id'
                )
            ->select('partner.*', 'kategorija.naziv AS naziv_kategorije', 'kategorija.id AS kategorija_id')
            ->join(
                'kategorija',
                'edicija_partner_kategorija.kategorija_id',
                '=',
                'kategorija.id'
            );
    }

    public function slike()
    {
        return $this->hasMany('App\Models\Galerija');
    }
}
