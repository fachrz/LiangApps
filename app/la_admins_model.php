<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class la_admins_model extends Model
{
    protected $table = 'la_admins';
    protected $primaryKey = "username";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
