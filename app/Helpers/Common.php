<?php 

namespace App\Helpers;

use App\Card;
use App\Category;
use App\Deck;

class Common {

	public function getCategoryList() {
		return Category::orderBy('name')->lists('name', 'id');
	}

	public function getOptions() {

		$values = range(1, 100);
		return array_combine($values, $values);
	}

	public function getCardList() {
		
		return Card::with('category')->orderBy('name')->get();
	}

	public function getDecks() {

		$decks = Deck::where('user_id', auth()->user()->id)->lists('id', 'id');

		$options = [];
		foreach ($decks as $deck) {
			$id = \Hashids::encode($deck);
			$options[$id] = $id;
		}

		return $options;
	}
}
