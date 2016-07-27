<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeckCard extends Model
{
	
	protected $fillable = ['deck_id', 'card_id'];

    protected $dates = ['created_at', 'updated_at'];
}
