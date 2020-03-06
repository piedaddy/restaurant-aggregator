<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealController extends Controller
{
    public function show()
    {

    }

    public function create()
    {
        return view('meals.create');
    }
}
