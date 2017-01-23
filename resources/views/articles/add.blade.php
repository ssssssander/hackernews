@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="breadcrumb">
            <a href="/">← back to overview</a>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Add article</div>
            <div class="panel-content">
                <!-- New Task Form -->
                <form action="/article/add" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    <!-- Article data -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="article-title">Title (max. 255 characters)</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="article-title" name="title" type="text">
                        </div>
                    </div>
                    <!-- Article url -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="article-url">URL</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="article-url" name="url" type="text">
                        </div>
                    </div>
                    <!-- Add Article Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Add Article</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
