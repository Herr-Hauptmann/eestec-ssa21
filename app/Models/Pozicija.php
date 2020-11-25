<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pozicija extends Model
{
    protected $table = 'pozicija';

    protected $fillable = ['naziv', 'opis'];

    public function organizatori()
    {
        return $this->belongsToMany('App\Models\Organizator', 'edicija_organizator_pozicija');
    }

    public function edicije()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_organizator_pozicija');
    }

    use HasFactory;
}
