<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Restaurant;


class RestaurantRegistrationController extends Controller
{
    public function form()
    {
        return view('auth.restaurant-register');
    }

    public function register(Request $request)
    {
        $this->validate ($request, [
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);   

        Restaurant::create([
            'user_id' => $user->id,            
            'name' => $request->input('restaurant_name'),
            'city' => $request->input('restaurant_city'),
            'description' => $request->input('restaurant_description'),
        ]);

        Auth::attempt([ // this is so that the user gets logged in after registering, needs the credentials of the user
            'email' =>$user->email,
            'password' =>$request->input('password'),
        ]);

       // return redirect()->route('home');
        return redirect('/'); 
    }
}
