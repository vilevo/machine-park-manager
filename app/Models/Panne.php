<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panne extends Model
{
    use HasFactory;

    protected $fillable = [
        'engin_id',
        'type_panne',
        'status',
        'mecanicien',
        'chauffeur',
        'engin_reference'
    ];

    protected $with = [
        'engin'
    ];

    public function engin()
    {
        return $this->belongsTo(Engin::class, 'engin_reference');
    }

    // public function chauffeurs()
    // {
    //     return $this->hasMany(User::class, 'chauffeur_id');
    // }
}
