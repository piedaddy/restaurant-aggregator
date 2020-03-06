@extends('layouts.app')
@section('content')
<a href="{{action('RestaurantController@show', $meal->restaurant_id)}}">Back to restaurant information</a>
  <div class="menu-show">
    <h2>{{$meal->name}}</h2>
    <p>{{$meal->description}}</p>
    <p> ${{$meal->price}}</p>
{{-- CHANGE CATEGORIES --}}
    <p>category: </p>
    <p>change category</p>
    <form action="{{action('CategoryController@update', [$meal->id])}}" method="post">
      @csrf
      <select name="add-category">
        @foreach($categories as $category)
        <option value={{$category->id}}>{{$category->name}}</option>
        @endforeach
      </select>
      <br>
      <input type="submit" value="submit category change">
    </form>
    <br>

    

{{-- WITH CATEGORIES --}}
    {{-- @foreach($meal->categories as $category)
    <h2>Category {{$category->id}}: {{$category->name}}</h2>
      <h3>{{$meal->name}}</h3>
      <p>{{$meal->description}}</p>
        ${{$meal->price}}
    @endforeach --}}
      
{{-- LIST OF ALLERGENS --}}
    <h4>List of allergens</h4>
    <ul>
      @if(Session::has('duplicate'))
      <div class="alert alert-success">
          {{ Session::get('duplicate') }}
      </div>
      @endif
    @foreach($meal->allergens as $allergen)
        <li>{{$allergen->name}}</li>
{{-- DELETE ALLERGEN --}}
    @if(auth()->user()->id == $meal->restaurant->user_id)
      <form action="{{action('AllergenController@removeAllergen', $meal->id)}}" method="get">
        @csrf
        <input type="submit" value="delete allergen">
        <input type="hidden" name="allergen" value={{$allergen->id}}> 
      </form>
    @endif
   @endforeach
    </ul>
{{-- ADD ALLERGEN --}}
    @if(auth()->user()->id == $meal->restaurant->user_id)
      <form action="{{action('AllergenController@addAllergen', $meal->id)}}" method="post">
        @csrf
        <select name="allergen">
          @foreach($allergens as $allergen)
            <option value="{{$allergen->id}}">{{$allergen->name}}</option>
          @endforeach
          <input type="submit" value="submit allergen">
        </select>
      </form>
    @endif

  </div>
@endsection