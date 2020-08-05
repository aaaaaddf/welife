<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Camppost extends Model{
    
    protected $fillable=['image','place','start_date','end_date','special','prefecture_id','user_id'];
    
    public function user(){
         return $this->belongsTo(User::class);
    }
    
    public function item(){
        return $this->belongsToMany(Item::class,'camppost_items','camppost_id','items_id');
    }
    
    public function prefecture(){
        return $this->belongsTo(Prefecture::class);
    }
    
    public function camppost_item(){
        return $this->hasOne('App\CamppostItem');
    }
    
}