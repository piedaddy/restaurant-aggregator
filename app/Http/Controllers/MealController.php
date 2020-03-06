<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Meal;
use App\Allergen;
use App\Category;



class MealController extends Controller
{
    public function show($meal_id)
    {
        $meal = Meal::findOrFail($meal_id);
        $allergens = Allergen::all();
        $restaurants = Restaurant::all();
        $categories = Category::all();
        return view('meals.show', compact('meal', 'meal_id', 'allergens', 'restaurants','categories'));
    }

    public function create($rest_id)
    {
        $restaurant = Restaurant::findOrFail($rest_id);
        $categories = Category::all();
        return view('meals.create', compact('restaurant', 'rest_id','categories'));
    }

    public function store(Request $request, $rest_id)
    {
        $meal = new Meal;
        $meal->restaurant_id = $rest_id;
        $meal->name = $request->input('name');
        $meal->price = $request->input('price');
        $meal->category_id =$request->input('category');
        $meal->description = $request->input('description');
        $meal->save();
        return redirect()->action('RestaurantController@show', $rest_id);
    }
}
