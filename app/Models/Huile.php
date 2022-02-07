<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huile extends Model
{
    use HasFactory;

    protected $fillable = [
        'engin_id',
        'chauffeur',
        'engin_reference',
        'type_huile',
        'quantite',
        'approvisionneur',
        'reapprovisionnement'
    ];

    public function engins()
    {
        return $this->hasMany(Engin::class, 'engin_reference');
    }
}
