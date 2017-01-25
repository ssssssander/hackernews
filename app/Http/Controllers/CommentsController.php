<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use App\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(StoreCommentRequest $request, Article $article) {
        $comment = new Comment($request->all());
        $comment->user_id = Auth::id();
        $article->comments()->save($comment);

        session()->flash('success', 'comment added succesfully');

        return back();
    }

    public function edit(Comment $comment) {
        return view('comments.edit', compact('comment'));
    }

    public function update(UpdateCommentRequest $request, Comment $comment) {
        $comment->update($request->all());

        session()->flash('success', 'comment edited succesfully');

        return back();
    }
}
