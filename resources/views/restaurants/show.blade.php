@extends('layouts.app')
@section('content')
  <h1>Restauarant Detail</h1>
  <a href="{{action('MealController@create')}}" >Add a new meal</a>

  <div class="restaurant-show">
    <h2>{{$restaurant->name}}</h2>
    Located in: <strong>{{$restaurant->city}}</strong><br>
    Description: <em>{{$restaurant->description}}</em><br>
    <hr>
    <h4>Comments:</h4>
  </div>

  <div class="comments">
    @foreach($comments as $comment)
      <strong>Written by:</strong> {{$comment->user->name}}<br>
      <strong>Comment:</strong><br>
      <p>{{$comment->comment}}</p>

      {{-- SHOW REPLIES--}}
      @if($comment->commentReply !== null)
        <strong>Reply from restaurant:</strong><br>
        <p>{{$comment->commentReply->reply}}</p>
      @endif



      @if(auth()->user()->id === $comment->user_id)
      {{-- AUTHORS CAN EDIT--}}
      <form action="{{action('CommentController@editComment', ['id' => $comment->id])}}" method="get">
        @csrf
        <input type="submit" value="edit comment">
      </form>
      {{-- AUTHORS CAN DELETE--}}
      <form action="{{action('CommentController@removeComment' , $comment->id)}}" method="get">
        @csrf
        <input type="submit" value="delete comment">
      </form>
      @endif
      @if(auth()->user()->id === $restaurant->user_id)
      {{-- REST CAN REPLY--}}
      <a href="{{action('CommentReplyController@editReply', $comment->id)}}">Reply to this comment</a>
      <hr>
      @endif

    @endforeach


    <h4>Add a comment</h4>
    <form action="{{action('CommentController@postComment', ['id' => $restaurant->id])}}" method="post">
      @csrf
      {{-- <label for="user_name">Name</label><br> --}}
      <label for="comments">Write your comment below</label><br>
        <textarea name="comment" value=""></textarea><br>
        <input type="submit" value="submit comment"><br>
    </form>
  </div>

@endsection 