<?php

use App\Card;
use App\Category;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach(['Earth', 'Water', 'Wind', 'Fire'] as $category) {
    		Category::create([
    			'name' => $category
    		]);
    	}


    	$range   = range(1, 100);
    	$options = array_combine($range, $range);

    	$names = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

    	$categories = [1, 2, 3, 4];
    	for ($i = 1; $i <= 26; $i++) {
    		
    		$category = array_rand($categories, 1);

    		$name   = array_rand($names, 1);
    		$energy = array_rand($options,1);
    		$attack = array_rand($options,1);
    		$defend = array_rand($options,1);

	        Card::create([
	        	'name'        => $names[$name],
	        	'category_id' => $categories[$category],
	        	'energy'      => $options[$energy],
	        	'attack'      => $options[$attack],
	        	'defend'      => $options[$defend],
	        ]);
    	}
    }
}
