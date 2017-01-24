@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="breadcrumb">
            <a href="{{ route('index') }}">← back to overview</a>
        </div>
        @include('errors')
        @include('success')
        <div class="panel panel-default">
            <div class="panel-heading clearfix">{{ $article->title }}
            @unless (Auth::guest())
                <a href="#" class="btn btn-danger btn-xs pull-right">
                    <i class="fa fa-btn fa-trash" title="delete"></i> delete article
                </a>
            @endunless
            </div>
            <div class="panel-content">
                @include('articles.single', ['template' => 'show'])
                <div class="comments">
                    <ul>
                        @foreach ($article->comments as $comment)
                            <li>
                                <div class="comment-body">{{ $comment->body }}</div>
                                <div class="comment-info">Posted by {{ $comment->user->name }} on {{ $comment->created_at }}
                                    @unless (Auth::guest())
                                        <a class="btn btn-primary btn-xs edit-btn"
                                        href="{{ route('edit_comment', ['comment' => $comment->id]) }}">edit</a>
                                        <a class="btn btn-danger btn-xs edit-btn" href="#">
                                            <i class="fa fa-btn fa-trash" title="delete"></i>delete
                                        </a>
                                    @endunless
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @if (Auth::guest())
                    <div>
                        <p>You need to be <a href="{{ url('/login') }}">logged in</a> to comment</p>
                    </div>
                @else
                    <!-- New Task Form -->
                    <form action="{{ route('store_comment', ['article' => $article->id]) }}" class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <!-- Comment data -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="body">Comment</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="body" name="body" maxlength="1000">{{ old('body') }}</textarea>
                            </div>
                        </div>
                        <!-- Add comment -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Add comment</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@stop
