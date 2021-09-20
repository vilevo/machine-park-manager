<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huile extends Model
{
    use HasFactory;

    protected $fillable = [
        'engin_id',
        'type_huile',
        'quantite',
        'reapprovisionnement',
    ];

    public function engin()
    {
        return $this->belongsTo(Engin::class);
    }
}
