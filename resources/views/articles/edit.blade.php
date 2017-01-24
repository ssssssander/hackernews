@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="breadcrumb">
            <a href="{{ url('/') }}">← back to overview</a>
        </div>
        @include('errors')
        <div class="panel panel-default">
            <div class="panel-heading clearfix">Edit article
            <a class="btn btn-danger btn-xs pull-right" href="{{ url('/article/delete/{{ $article->id }}') }}">
                <i class="fa fa-btn fa-trash" title="delete"></i> delete article
            </a>
            </div>
            <div class="panel-content">
                <!-- New Task Form -->
                <form action="/article/edit/{{ $article->id }}" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <input id="article-points" name="points" type="hidden" value="1">
                    <!-- Article data -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="article-title">Title (max. 255 characters)</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="article-title" name="title" type="text" value="{{ $article->title }}">
                        </div>
                    </div>
                    <!-- Article url -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="article-url">URL</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="article-url" name="url" type="text" value="{{ $article->url }}">
                        </div>
                    </div>
                    <!-- Add Article Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button class="btn btn-default" type="submit"><i class="fa fa-pencil-square-o"></i> Edit Article</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
