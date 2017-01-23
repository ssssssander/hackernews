@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="breadcrumb">
            <a href="/comments/{{ $comment->article_id }}">← back to comments</a>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading clearfix">Edit comment
            <a class="btn btn-danger btn-xs edit-btn pull-right" href="/comments/delete/{{ $comment->id }}">
                <i class="fa fa-btn fa-trash" title="delete"></i> delete comment
            </a>
            </div>
            <!-- New Task Form -->
            <div class="panel-content">
                <form action="/comments/edit/{{ $comment->id }}" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <!-- Article data -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="body">Comment</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="body" name="body">{{ $comment->body }}</textarea>
                        </div>
                    </div>
                    <!-- Add Article Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button class="btn btn-default" type="submit"><i class="fa fa-pencil-square-o"></i> Edit comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
