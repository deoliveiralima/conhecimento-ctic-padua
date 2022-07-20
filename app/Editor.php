<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Editor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'editor';
    protected $table = 'editores';

    protected $fillable = [
        'nome', 'login', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}