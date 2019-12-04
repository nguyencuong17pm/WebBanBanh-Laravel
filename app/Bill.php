<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
     protected $table = "bills";

      public function bill_detail()
     {
     	return $this->hasMany('App\Bill','id_bill','id');
     }
      public function bill()
     {
     	return $this->belongsTo('App\Bill','id_bill','id');
     }
}
