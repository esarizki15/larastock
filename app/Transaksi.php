<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guarded = [];

    public function carts()
    {
    	return $this->belongsToMany('App\Cart');
    }

    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function stoks(){
    	// return $this->hasMany('App\Stok');

    	return $this->hasMany('App\Stok');
    }
}