<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request, Article $article) {
        // $article->comments()->create($request->all());
        $this->validate($request, ['body' => 'required|max:1000']);

        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->body = $request->body;
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
