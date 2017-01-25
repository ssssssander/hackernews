<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
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

        session()->flash('success', 'article "' . $article->title . '" created succesfully');

        return redirect()->route('index');
    }

    public function edit(Article $article) {
        if($article->user_id == Auth::id()) {
            return view('articles.edit', compact('article'));
        }
        else {
            session()->flash('danger', 'you can\'t edit an article that is not yours');

            return redirect()->route('index');
        }
    }

    public function update(ArticleRequest $request, Article $article) {
        if($article->user_id == Auth::id()) {
            $article->update($request->all());
            session()->flash('success', 'article "' . $article->title . '" edited succesfully');
        }
        else {
            session()->flash('danger', 'you can\'t edit an article that is not yours');
        }

        return redirect()->route('index');
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
