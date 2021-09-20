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
    ];

    public function engin()
    {
        return $this->belongsTo(Engin::class);
    }
}
