<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['name', 'category_id', 'engery', 'attack', 'defend'];

    protected $dates = ['created_at', 'updated_at'];

    public function category() {
    	return $this->belongsTo(\App\Category::class, 'category_id');
    }
}
