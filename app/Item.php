<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;
    protected $table='items';
    public function camppost_item(){
        return $this->hasMany(CampppostItem::class);
    }
    
    public function campposts(){
        return $this->belongsToMany(Camppost::class,'camppost_items','items_id');
    }
}
