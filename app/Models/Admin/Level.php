<?php

namespace App\Models\Admin;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Level extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    public $timestamps = false;

    protected $table = 'level';

    protected $primaryKey = 'LevelId';

    protected $fillable = [
        'LevelId',
        'Description'
    ];

}