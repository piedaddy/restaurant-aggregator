@extends('layouts.app')
@section('content')

<h1>Add your reply comment</h1>
<form action="{{action('CommentReplyController@postReply', [$comment->id])}}" method="post">
  {{-- <form action="" method="post"> --}}

  @csrf
  <label for="reply_comment">Edit your comment below</label><br>
    <textarea name="reply_comment" value=""></textarea><br>
    <input type="submit" value="submit comment"><br>
</form>

@endsection