<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User;
use App\Comment;
use App\CommentReply;
use App\Meal;

use Illuminate\Support\Facades\Auth;


class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $user = User::all();
        $comments = Comment::all();
        $replies = CommentReply::all();
    
        return view('restaurants.show', compact('restaurant', 'user','id', 'comments', 'replies'));
    }


}
