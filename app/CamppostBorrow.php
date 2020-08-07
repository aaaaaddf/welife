<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CamppostBorrow extends Model
{
   
   protected $fillable=['start_date','end_date','camppost_id','user_id','owner_id'];
   public $timestamps = false;
   
   public function camppost(){
       return $this->belongsTo(Camppost::class);
   }
   
   public function user(){
      return $this->belongsTo(CamppostBorrow::class);
   }
}
