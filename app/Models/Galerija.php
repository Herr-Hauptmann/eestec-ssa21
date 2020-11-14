<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galerija extends Model
{
    protected $table = 'galerija';

    protected $fillable = ['slika'];

    public function edicija()
    {
        return $this->belongsTo('App\Models\Edicija');
    }
}
