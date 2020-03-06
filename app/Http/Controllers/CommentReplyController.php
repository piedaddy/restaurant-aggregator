<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentReply;
use App\Comment;

class CommentReplyController extends Controller
{
    public function editReply($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        return view('comments.reply', compact('comment_id', 'comment'));
    }

    public function postReply(Request $request, $comment_id)
    {
        $reply = new CommentReply;
        $reply->comment_id = $comment_id;
        $reply->reply = $request->input('reply_comment');
        $reply->save();
        // return redirect()->action('RestaurantController@show', $comment->restaurant_id);
        return redirect()->action('RestaurantController@index');

    }
}
