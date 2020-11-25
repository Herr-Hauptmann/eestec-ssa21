<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizator extends Model
{
    use HasFactory;

    protected $table = 'organizator';

    protected $fillable = ['ime', 'prezime', 'slika', 'mail', 'telefon'];

    protected $custom_attributes = [
        'pozicija'  => Pozicija::class,
        'edicija'   => Edicija::class,
    ];

    /**
     * Overload Models magic __get method to automatically access pivot table relation
     */
    public function __get($key)
    {
        // if (array_key_exists($key, $this->custom_attributes))
        // {
        //     return (new $this->custom_attributes[$key])->findOrFail($this->pivot[$key.'_id']);
        // }

        return parent::__get($key);
    }

    public function edicije()
    {
        return $this->belongsToMany('App\Models\Edicija', 'edicija_organizator_pozicija', 'organizator_id', 'edicija_id');
    }

    public function pozicije()
    {
        return $this->belongsToMany('App\Models\Pozicija', 'edicija_organizator_pozicija', 'organizator_id', 'pozicija_id');
    }

}
