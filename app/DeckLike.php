<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeckLike extends Model
{
    protected $fillable = ['deck_id', 'user_id'];
}
