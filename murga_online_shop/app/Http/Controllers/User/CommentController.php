<?php

//Authors: Manuela Herrera López

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment($id)
    {
        $viewData = [];
        $viewData["title"] = __('message.comments.createComments');
        $viewData["liquor"] = $id;
        return view('user.comment.index')->with("viewData", $viewData);
    }
    public function saveComment(Request $request, $id)
    {
        $comment = new Comment();
        $comment->setDescription($request->description);
        $comment->setScore($request->score);
        $comment->setCustomer(Auth::id());
        $comment->setLiquor($id);
        $comment->save();
        return redirect('/')->with("alert", __('messages.comment.saveCommentsSuccess'));
    }
}
