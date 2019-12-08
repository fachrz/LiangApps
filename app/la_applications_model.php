<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class la_applications_model extends Model
{
    protected $table = 'la_applications';
    protected $primaryKey = "id_app";
    public $incrementing = true;
    public $timestamps = false;
}
