<?php

namespace App\Http\Controllers;

use App\Deck;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommonController extends Controller {

	 /**
     * Gets all decks.
     */
    public function getAllDecks() {
    	
        $decks = Deck::with('cards', 'likes')->latest('id')->paginate();

        return view('decks', compact('decks'));
    }

    /**
     * Gets the decks by identifier.
     *
     * @param      int  $id     The identifier
     */
    public function getDecksById(Request $request, $id) {

        $id = collect(\Hashids::decode($id))->first();

    	$deck = Deck::with('cards')->find($id);

    	return view('individual-deck', compact('deck'));
    }

    /**
     * Gets the decks comparison
     */
    public function getCompareDecks($deckOne = null, $deckTwo = null) {
    	
        return view('decks_compare', compact('deckOne', 'deckTwo'));
    }

    /**
     * Posts compare decks ids
     *
     * @param      \Illuminate\Http\Request  $request  The request
     */
    public function postCompareDecks(Request $request) {

        $validate = Validator::make($request->all(), [
            'deck_one' => 'required',
            'deck_two' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => 'Please fill in deck ids', 'data' => '']);
        }

        $deckOne = collect(\Hashids::decode($request->input('deck_one')))->first();
        $deckTwo = collect(\Hashids::decode($request->input('deck_two')))->first();

        $deckOne = Deck::with('cards')->find($deckOne);
        $deckTwo = Deck::with('cards')->find($deckTwo);

        if (!count($deckOne) || !count($deckTwo)) {
            return response()->json(['status' => false, 'message' => 'Invalid Deck Id', 'data' => '']);
        }

        $cardOne = collect($deckOne->cards);
        $cardTwo = collect($deckTwo->cards);

        $html = view('deck_cards', compact('cardOne', 'cardTwo'))->render();

        return response()->json(['status' => true, 'message' => 'Html Response', 'data' => $html]);
    }

    public function getUserDecks(Request $request, $id) {

        $decks = Deck::with('cards', 'likes')->where('user_id', $id)->get();

        return view('decks', compact('decks'));
    }
}
