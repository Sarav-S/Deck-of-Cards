<?php

namespace App\Http\Controllers;

use App\Deck;
use App\DeckCard;
use App\Http\Requests;
use App\Http\Requests\UserDeckRequest;
use Illuminate\Http\Request;
use App\Traits\DeckTrait;

class UserDeckController extends Controller
{
    use DeckTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = \Auth::user();
        $decks = Deck::with('cards')->latest('id')->where('user_id',$user->id)->paginate();

        return view('users.decks.index', compact('decks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.decks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserDeckRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserDeckRequest $request)
    {
        return $this->save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deck $record
     * @return \Illuminate\Http\Response
     */
    public function show($record)
    {
        return view('users.decks.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deck $record
     * @return \Illuminate\Http\Response
     */
    public function edit($record)
    {
        return view('users.decks.update', compact('record'));
    }
}
