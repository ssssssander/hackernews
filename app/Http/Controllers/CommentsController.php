<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(CommentRequest $request, Article $article) {
        $comment = new Comment($request->all());
        $comment->user_id = Auth::id();
        $article->comments()->save($comment);

        session()->flash('success', 'comment added succesfully');

        return back();
    }

    public function edit(Comment $comment) {
        if($comment->user_id == Auth::id()) {
            return view('comments.edit', compact('comment'));
        }
        else {
            session()->flash('danger', 'you can\'t edit a comment that is not yours');

            return redirect()->route('index');
        }
    }

    public function update(CommentRequest $request, Comment $comment) {
        if($comment->user_id == Auth::id()) {
            $comment->update($request->all());
            session()->flash('success', 'comment edited succesfully');

            return back();
        }
        else {
            session()->flash('danger', 'you can\'t edit a comment that is not yours');

            return redirect()->route('index');
        }
    }

    public function delete(Comment $comment) {
        if($comment->user_id == Auth::id()) {
            session()->flash('delete_comment_confirmation', 'are you sure you want to delete this comment?');
            session()->flash('comment', $comment);

            return back();
        }
        else {
            session()->flash('danger', 'you can\'t delete a comment that is not yours');

            return redirect()->route('index');
        }
    }

    public function destroy(Comment $comment) {
        if($comment->user_id == Auth::id()) {
            $comment->delete();
            session()->flash('success', 'comment deleted succesfully');

            return redirect()->route('show_article', $comment->article_id);
        }
        else {
            session()->flash('danger', 'you can\'t delete a comment that is not yours');

            return redirect()->route('index');
        }
    }
}
