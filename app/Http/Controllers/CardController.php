<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests;
use App\Http\Requests\CardRequest;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::latest('id')->paginate();

        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request)
    {
        return $this->save($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $record
     * @return \Illuminate\Http\Response
     */
    public function edit($record)
    {
        return view('cards.update', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CardRequest  $request
     * @param  \App\Card  $record
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, $record)
    {
        return $this->save($request, $record);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy($record)
    {
        if ($record->delete()) {
            flash()->succcess('Card has been deleted successfully!');
        } else {
            flash()->error('Unable to delete card. Please try again later');
        }

        return back();
    }

    private function save($request, $model = null) {

        if (!$model) {
            $model = new Card;
        }

        $model->name = $request->input('name');
        $model->category_id = $request->input('category_id');
        $model->energy = $request->input('energy');
        $model->attack = $request->input('attack');
        $model->defend = $request->input('defend');

        if ($model->save()) {

            flash()->success('Card saved successfully!');

            return redirect(route('cards.index'));
        }

        flash()->error('Unable to save card. Please try again!');

        return back()->withInputs();
    }
}
