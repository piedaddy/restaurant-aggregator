@extends('layouts.app')
@section('content')
  <div class="restaurant-index">
    <ol>
      @foreach($restaurants as $restaurant)
        <li><h2>{{$restaurant->name}}</h2></li>
        Located in: <strong>{{$restaurant->city}}</strong><br>
        Description: <em>{{$restaurant->description}}</em><br>
        <a href="{{action('RestaurantController@show', [$restaurant->id])}}">More details</a>
      @endforeach
    </ol>
  </div>
@endsection