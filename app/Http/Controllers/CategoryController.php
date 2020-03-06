<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Meal;



class CategoryController extends Controller
{
    //create new category 
    public function create(Request $request, $restaurant_id)
    {
        $category = new Category;
        $category->name = $request->input('create-category');
        $category->restaurant_id = $restaurant_id;
        $category->save();
        return redirect()->action('RestaurantController@show', $restaurant_id);
    }

    public function update(Request $request, $meal_id)
    {
        // $category = Category::findOrFail($cat_id);
        $meal = Meal::findOrFail($meal_id);
        $meal->category_id = $request->input('add-category');
        $meal->save();
        return redirect()->action('RestaurantController@show', $meal->restaurant_id);
    }
}
