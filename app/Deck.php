<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $fillable = ['name', 'user_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function cards() {
        
    	return $this->belongsToMany(\App\Card::class, 'deck_cards', 'deck_id', 'card_id')->with('category');
    }

    public function likes() {
    	return $this->hasMany(\App\DeckLike::class, 'deck_id');
    }

    public function user() {

    	return $this->belongsTo(\App\User::class, 'user_id');
    }
}
