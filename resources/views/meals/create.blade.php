@extends('layouts.app')
@section('content')
<div class="create-meals">
  <h2>Add a new meal</h2>
  <div class="create-meal">
  <form action="" method="post">
    <label>Name of meal</label><br>
      <input type="text" name="name"><br>
    <label>Description of meal</label><br>
      <textarea name="description"></textarea><br>
    <input type="submit" value="submit new meal">
  </form>
  </div>
</div>
@endsection