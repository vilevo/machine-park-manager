<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'adresse',
        'role',
        'fonction',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Roles constant
     */
    const EDITEUR = "editeur";
    const ADMIN = "admin";
    const ROOT = "root";

    /**
     * On récupere tous les roles sauf le root
     */
    public static function roles()
    {
        return [
            User::EDITEUR,
            User::ADMIN,
        ];
    }

    /**
     * Validation des roles utilisateur
     */
    public static function needAuthorization($role)
    {
        $arr = [
            User::EDITEUR,
        ];

        return in_array($role, $arr);
    }
}
