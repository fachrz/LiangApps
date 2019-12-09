<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class la_order_model extends Model
{
    protected $table = 'la_order';
    protected $primaryKey = "id_order";
    public $incrementing = false;
    public $timestamps = false;
}
