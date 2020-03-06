@extends('layouts.app')
@section('content')

<form action="{{action('CommentController@updateComment', ['id' => $comment->id])}}" method="post">
  @csrf
  <label for="comments-update">Edit your comment below</label><br>
    <textarea name="edit_comment" value="">{{old('comment')}}</textarea><br>
    <input type="submit" value="submit comment"><br>
</form>


@endsection