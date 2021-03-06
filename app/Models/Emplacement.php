<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emplacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'engin_reference',
        'depart',
        'destination',
    ];


    public function engin()
    {
        return $this->belongsTo(Engin::class, 'engin_reference');
    }
}
