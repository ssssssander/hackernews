@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="breadcrumb">
            <a href="/">← back to overview</a>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading clearfix">{{ $article->title }}
                <a href="/article/delete/{{ $article->id }}" class="btn btn-danger btn-xs pull-right">
                    <i class="fa fa-btn fa-trash" title="delete"></i> delete article
                </a>
            </div>
            <div class="panel-content">
                @include('articles.single', ['template' => 'show'])
                <div class="comments">
                    <ul>
                        @foreach ($article->comments as $comment)
                            <li>
                                <div class="comment-body">{{ $comment->body }}</div>
                                <div class="comment-info">Posted by {{ $comment->user->username }} on {{ $comment->created_at }}
                                    <a class="btn btn-primary btn-xs edit-btn" href="/comments/edit/{{ $comment->id }}">edit</a>
                                    <a class="btn btn-danger btn-xs edit-btn" href="/comments/delete/{{ $comment->id }}">
                                        <i class="fa fa-btn fa-trash" title="delete"></i>delete
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- New Task Form -->
                <form action="/comments/add/{{ $article->id }}" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    <!-- Comment data -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="body">Comment</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="body" name="body">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <input name="article_id" type="hidden" value="{{ $article->id }}">
                    <!-- Add comment -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Add comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
