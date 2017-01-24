<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request, Article $article) {
        $this->validate($request, ['body' => 'required|max:1000']);

        $comment = new Comment($request->all());
        $comment->user_id = Auth::id();
        $article->comments()->save($comment);

        return back();
    }

    public function edit(Comment $comment) {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment) {
        $comment->update($request->all());

        return back();
    }
}
