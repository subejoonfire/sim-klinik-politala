<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'username',
        'password',
    ];
}
