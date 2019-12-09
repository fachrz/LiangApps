<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class la_cart_model extends Model
{
    protected $table = 'la_cart';
    protected $primaryKey = false;
    public $incrementing = false;
    public $timestamps = false;

    public function application(){
        return $this->belongsTo('App\la_applications_model', 'app_id');
    }
}
