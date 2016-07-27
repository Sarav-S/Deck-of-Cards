<?php

namespace App\Http\Controllers;

use App\Deck;
use App\DeckLike;
use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest('id')->paginate();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        return $this->save($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $record
     * @return \Illuminate\Http\Response
     */
    public function edit($record)
    {
        return view('users.update', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User $record
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $record)
    {
        return $this->save($request, $record);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $record
     * @return \Illuminate\Http\Response
     */
    public function destroy($record)
    {
        if ($record->delete()) {
            flash()->success('User deleted successfully!');
        } else {
            flash()->error('Unable to delete user. Please try again!');
        }

        return back();
    }

    /**
     * Saves/Updates the user record
     *
     * @param      \App\Http\Requests\UserRequest  $request  The request
     * @param      \App\User    $model    The model
     *
     * @return     \Illuminate\Http\Response
     */
    private function save($request, $model = null) {

        if (!$model) {
            $model = new User;
            $role = Role::where('name', 'user')->first();
        }

        $model->name = $request->input('name');
        $model->email = $request->input('email');

        if ($request->has('password')) {
            $model->password = bcrypt($request->input('password'));
        }

        if ($model->save()) {

            if ($request->hasFile('image')) {
                $model->image = Input::file('image');
                $model->save();
            }

            if (isset($role)) {
                $model->attachRole($role);
            }

            flash()->success('User saved successfully!');

            return redirect(route('user-index'));
        }

        flash()->error('Unable to save user. Please try again!');

        return back()->withInputs();

    }

    /**
     * Adds like to deck
     *
     * @param      \Illuminate\Http\Request  $request  The request
     * @param      integer                    $id       The identifier
     */
    public function likeDeck(Request $request, $id) {

        $deck = Deck::findorfail($id);

        //check if the deck is there own deck
        if($deck->user_id === auth()->user()->id){
          flash()->error('You cannot give like for your deck');

          return back();
        }

        $checkDeck = DeckLike::where('user_id', auth()->user()->id)
                    ->where('deck_id', $deck->id)
                    ->first();

        if (count($checkDeck)) {
            flash()->error('You have already liked this deck');

            return back();
        }

        $deckLike = DeckLike::create([
            'deck_id' => $deck->id,
            'user_id' => auth()->user()->id
        ]);

        if ($deckLike) {
            flash()->success('You have liked the deck');
        } else {
            flash()->error('Unable to like deck. Please try again!');
        }

        return back();
    }
}
