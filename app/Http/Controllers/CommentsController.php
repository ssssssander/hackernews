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

        session()->flash('success', trans('messages.comment_success', ['action' => 'added']));

        return back();
    }

    public function edit(Comment $comment) {
        if($comment->user_id == Auth::id()) {
            return view('comments.edit', compact('comment'));
        }
        else {
            session()->flash('danger', trans('messages.denied', ['action' => 'edit', 'item' => 'a comment']));

            return redirect()->route('index');
        }
    }

    public function update(CommentRequest $request, Comment $comment) {
        if($comment->user_id == Auth::id()) {
            $comment->update($request->all());
            session()->flash('success', trans('messages.comment_success', ['action' => 'edited']));

            return back();
        }
        else {
            session()->flash('danger', trans('messages.denied', ['action' => 'edit', 'item' => 'a comment']));

            return redirect()->route('index');
        }
    }

    public function delete(Comment $comment) {
        if($comment->user_id == Auth::id()) {
            session()->flash('delete_comment_confirmation', trans('messages.confirmation', ['item' => 'comment']));
            session()->flash('comment', $comment);

            return back();
        }
        else {
            session()->flash('danger', trans('messages.denied', ['action' => 'delete', 'item' => 'a comment']));

            return redirect()->route('index');
        }
    }

    public function destroy(Comment $comment) {
        if($comment->user_id == Auth::id()) {
            $comment->delete();
            session()->flash('success', trans('messages.comment_success', ['action' => 'deleted']));

            return redirect()->route('show_article', $comment->article_id);
        }
        else {
            session()->flash('danger', trans('messages.denied', ['action' => 'delete', 'item' => 'a comment']));

            return redirect()->route('index');
        }
    }
}
