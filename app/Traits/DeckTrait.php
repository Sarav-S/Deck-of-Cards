<?php

namespace App\Traits;

use App\Deck;
use App\DeckCard;
use App\Http\Requests\UserDeckRequest;

trait DeckTrait {

	/**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserDeckRequest  $request
     * @param  \App\Deck $record
     * @return \Illuminate\Http\Response
     */
    public function update(UserDeckRequest $request, $record)
    {
        return $this->save($request, $record);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deck $record
     * @return \Illuminate\Http\Response
     */
    public function destroy($record)
    {
        if ($record->delete()) {
            flash()->success('Deck has been deleted successfully');
        } else {
            flash()->error('Unable to delete deck. Please try again!');
        }

        return back();
    }

	/**
     * Saves/Updates deck record
     *
     * @param      App\Http\Requests\UserDeckRequest  $request  The request
     * @param      \App\Deck    $model    The model
     *
     * @return     \Illuminate\Http\Response
     */
    protected function save($request, $model = null) {

        if (count($request->input('card_id')) > 21 || count($request->input('card_id')) < 21) {
            flash()->error('Deck must have 21 cards');

            return back();
        }

        if (!$model) {

            $deckCount = Deck::where('user_id', auth()->user()->id)->get();

            if (count($deckCount)) {
                flash()->error('You can\'t create more than 5 decks');
            }

            $model = new Deck;
        }

        $model->user_id = auth()->user()->id;
        $model->name    = $request->input('name');

        if ($model->save()) {

            DeckCard::where('deck_id', $model->id)->delete();

            foreach($request->input('card_id') as $card) {
                DeckCard::create([
                    'deck_id' => $model->id,
                    'card_id' => $card
                ]);
            }

            flash()->success('Deck has been saved successfully!');

            $segment = \Request::segment('1');

            return redirect(route($segment.'.index'));
        }

        flash()->error('Unable to save deck. Please try again!');

        return back()->withInputs();
    }
}
