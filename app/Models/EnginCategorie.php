<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnginCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
    ];

    public function engin()
    {
        return $this->hasMany(Engin::class, 'categorie_id');
    }
}
