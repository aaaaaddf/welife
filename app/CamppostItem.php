<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CamppostItem extends Model
{
  protected $fillable=['camppost_id','items_id'];
  public $timestamps = false;
  
  public function camppost(){
      return $this->belongsTo('App\Camppost');
  }
  
  public function item(){
    return $this->belongsTo(Item::class);
  }
  
  
}
