<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Camppost extends Model{
    
    public function user(){
         return $this->belongsTo(User::class);
    }
    
    public function item(){
        return $this->belongsToMany(Item::class,'camppost_items','camppost_id','items_id');
    }
    
    public function prefecture(){
        return $this->belongsTo(Prefecture::class);
    }
    
}