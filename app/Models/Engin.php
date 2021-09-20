<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engin extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'matricule',
        'etat',
    ];

    protected $with = [
        'pannes',
        'huiles',
        'emplacements',
        'type',
    ];

    public function pannes()
    {
        return $this->hasMany(Panne::class);
    }

    public function huiles()
    {
        return $this->hasMany(Huile::class);
    }

    public function emplacements()
    {
        return $this->hasMany(Emplacement::class);
    }

    public function type()
    {
        return $this->hasOne(EnginCategorie::class, 'categorie_id');
    }
}
