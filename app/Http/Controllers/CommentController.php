<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;


class CommentController extends Controller
{
  public function postComment(Request $request, $id)
  {
      $comment = new Comment; 
      $comment->restaurant_id = $id;
      $comment->user_id = Auth::user()->id;
      $comment->comment = $request->input('comment');
      $comment->save();
      return redirect()->action('RestaurantController@show', $id);
  }

  public function editComment($comment_id)
  {
      $comment = Comment::findOrFail($comment_id);
      return view('comments.edit', compact('comment'));
  }

  public function updateComment(Request $request, $comment_id)
  {
      $comment = Comment::findOrFail($comment_id);
      $comment->comment = $request->input('edit_comment');
      $comment->save();
      return redirect()->action('RestaurantController@show', $comment->restaurant_id);
  }

  public function removeComment($id)
  {
    $comment = Comment::findOrFail($id);
    $comment->delete();
    return redirect()->action('RestaurantController@show', $comment->restaurant_id);
  }

}
