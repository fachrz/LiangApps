<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class la_temporder_model extends Model
{
    protected $table = 'la_temporder';
    protected $primaryKey = "id_order";
    public $incrementing = true;
    public $timestamps = false;
}
