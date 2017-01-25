@if (session()->has('delete_article_confirmation'))
    <div class="bg-danger clearfix">
        {{ session('delete_article_confirmation') }}
        <form action="{{ route('cancel_delete') }}" method="post" class="pull-right">
            {{ csrf_field() }}
            <button name="cancel" class="btn">
                <i class="fa fa-btn fa-remove" title="cancel"></i> cancel
            </button>
        </form>
        <form action="{{ route('destroy_article', ['article' => $article->id]) }}" method="post" class="pull-right">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button name="delete" class="btn btn-danger">
                <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
            </button>
        </form>
    </div>
@endif

@if (session()->has('delete_comment_confirmation'))
    <div class="bg-danger clearfix">
        {{ session('delete_comment_confirmation') }}
        <form action="{{ route('cancel_delete') }}" method="post" class="pull-right">
            {{ csrf_field() }}
            <button name="cancel" class="btn">
                <i class="fa fa-btn fa-remove" title="cancel"></i> cancel
            </button>
        </form>
        <form action="{{ route('destroy_comment', ['comment' => session('comment')->id]) }}" method="post" class="pull-right">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button name="delete" class="btn btn-danger">
                <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
            </button>
        </form>
    </div>
@endif
