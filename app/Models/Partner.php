<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partner';

    protected $fillable = ['naziv', 'slika', 'link', 'kategorija_id', 'edicija_id'];

    public function edicija()
    {
        return $this->belongsTo('App\Models\Edicija');
    }

    public function kategorija()
    {
        return $this->belongsTo('App\Models\Kategorija');
    }

    use HasFactory;
}
