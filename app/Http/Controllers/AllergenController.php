<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Allergen;
use App\Meal;


class AllergenController extends Controller
{
    public function addAllergen(Request $request, $meal_id)
    {
        $meal     = Meal::findOrFail($meal_id);
        $allergen = $request->input('allergen');
        if($meal->allergens()->find($allergen) == null){
            $meal->allergens()->attach($allergen);
        } else {
            session()->flash('duplicate', 'This allergen has already been listed');
        }
        return redirect()->action('MealController@show', $meal_id);
    }

    public function removeAllergen(Request $request, $meal_id)
    {
        // $allergen = Allergen::findOrFail($allergen_id);
        $meal     = Meal::findOrFail($meal_id);
        $allergen = $request->input('allergen');
        $meal->allergens()->detach($allergen);

        return redirect()->action('MealController@show', [$meal_id]);
        //return redirect()->action('RestaurantController@index', $allergen->meal_id);


    }

}
