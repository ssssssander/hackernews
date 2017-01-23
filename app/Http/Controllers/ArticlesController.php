<?php

namespace App\Http\Controllers;

use App\Article;
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

    public function store(Request $request) {
        $article = new Article($request-all());
        $article->user_id = Auth::id();
        $article->points = 0;
        $article->save();

        return redirect('/');
    }

    public function edit(Article $article) {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article) {
        $article->update($request->all());

        return redirect('/');
    }

    public function delete() {

        return redirect('/');
    }

    public function destroy(Article $article) {
        $article->delete();

        return back();
    }

    public function upvote(Article $article) {
        $article->increment('points');

        return back();
    }

    public function downvote(Article $article) {
        $article->decrement('points');

        return back();
    }
}
