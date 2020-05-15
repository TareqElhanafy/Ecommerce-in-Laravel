<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable=[
    'name','image','description','price','user_id'
  ];
  public function user(){
    return $this->belongsTo(User::class);
  }
}
