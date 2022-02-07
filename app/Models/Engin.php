<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engin extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'reference',
        'etat',
        'name',
        'type',
    ];

    protected $with = [
        'pannes',
        'huile',
        'emplacements',
        'categorie'
    ];

    const CAMION = 'camion';
    const ENGIN = 'engin';
    const AUTRE = 'autre';

    public static $types = [
        'camion',
        'engin',
        'autre'
    ];

    public function pannes()
    {
        return $this->hasMany(Panne::class, 'engin_reference');
    }

    public function huile()
    {
        return $this->belongsTo(Huile::class, 'engin_reference');
    }

    public function emplacements()
    {
        return $this->hasMany(Emplacement::class, 'engin_reference');
    }

    public function categorie()
    {
        return $this->belongsTo(EnginCategorie::class, 'categorie_id');
    }
}
