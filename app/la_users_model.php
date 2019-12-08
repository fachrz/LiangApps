<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class la_users_model extends Model
{
    protected $table = 'la_users';
    protected $primaryKey = "username";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
