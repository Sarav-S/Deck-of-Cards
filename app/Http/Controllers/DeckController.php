<?php

namespace App\Http\Controllers;

use App\Deck;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Traits\DeckTrait;

class DeckController extends Controller
{
    use DeckTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $decks = Deck::with('cards')->latest('id')->paginate();

        return view('decks.index', compact('decks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deck $record
     * @return \Illuminate\Http\Response
     */
    public function edit($record)
    {
        return view('decks.update', compact('record'));
    }
}
