<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use App\Vote;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index() {
    	$articles = Article::all()->sortByDesc('points');

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }

    public function add() {
        return view('articles.add');
    }

    public function store(ArticleRequest $request) {
        $article = new Article($request->all());
        $article->user_id = Auth::id();
        $article->points = 0;
        $article->save();

        session()->flash('success', trans('messages.article_success', ['action' => 'created', 'title' => $article->title]));

        return redirect()->route('index');
    }

    public function edit(Article $article) {
        if($article->user_id == Auth::id()) {
            return view('articles.edit', compact('article'));
        }
        else {
            session()->flash('danger', trans('messages.denied', ['action' => 'edit', 'item' => 'an article']));

            return redirect()->route('index');
        }
    }

    public function update(ArticleRequest $request, Article $article) {
        if($article->user_id == Auth::id()) {
            $article->update($request->all());
            session()->flash('success', trans('messages.article_success', ['action' => 'edited', 'title' => $aticle->title]));
        }
        else {
            session()->flash('danger', trans('messages.denied', ['action' => 'edit', 'item' => 'an article']));
        }

        return redirect()->route('index');
    }

    public function delete(Article $article) {
        if($article->user_id == Auth::id()) {
            session()->flash('delete_article_confirmation', trans('messages.confirmation', ['item' => 'article']));

            return back();
        }
        else {
            session()->flash('danger', trans('messages.denied', ['action' => 'delete', 'item' => 'an article']));

            return redirect()->route('index');
        }
    }

    public function destroy(Article $article) {
        if($article->user_id == Auth::id()) {
            $article->delete();
            $article->comments()->delete();
            session()->flash('success', trans('messages.article_success', ['action' => 'deleted', 'title' => $article->title]));
        }
        else {
            session()->flash('danger', trans('messages.denied', ['action' => 'delete', 'item' => 'an article']));
        }

        return redirect()->route('index');
    }

    public function cancel_delete() {
        return back();
    }

    public function upvote(Article $article) {
        $article->increment('points');
        $vote = new Vote;
        $vote->user_id = Auth::id();
        $vote->article_id = $article->id;
        $vote->type = "up";
        $vote->save();

        return back();
    }

    public function downvote(Article $article) {
        $article->decrement('points');
        $vote = new Vote;
        $vote->user_id = Auth::id();
        $vote->article_id = $article->id;
        $vote->type = "down";

        $vote->save();

        return back();
    }
}
