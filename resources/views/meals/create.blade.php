@extends('layouts.app')
@section('content')
<a href="{{action('RestaurantController@show', $restaurant->id)}}">Back to restaurant information</a>

<div class="create-meals">
  <h2>Add a new meal</h2>
  <div class="create-meal">
  <form action="{{action('MealController@store' , [$restaurant->id])}}" method="post">
    @csrf
    <label>Name of meal</label><br>
      <input type="text" name="name"><br>
    <label>Description of meal</label><br>
      <textarea name="description"></textarea><br>
      <label>Price of meal</label><br>
      <input type="text" name="price"><br>
      <label>Category of meal</label><br>
      <select name="category">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}
        @endforeach
      </select>
      <br>
    <input type="submit" value="submit new meal">
  </form>
  </div>
</div>
@endsection