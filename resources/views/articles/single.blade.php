<div class="vote">
    <form action="{{ route('upvote_article', ['article' => $article->id]) }}" class="form-inline upvote" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <button>
            <i class="fa fa-btn fa-caret-up" title="upvote"></i>
        </button>
    </form>
    <form action="{{ route('downvote_article', ['article' => $article->id]) }}" class="form-inline downvote" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <button>
            <i class="fa fa-btn fa-caret-down" title="downvote"></i>
        </button>
    </form>
</div>
<div class="url">
    <a class="urlTitle" href="{{ url($article->url) }}">{{ $article->title }}</a>
    <a href="{{ route('edit_article', ['article' => $article->id]) }}" class="btn btn-primary btn-xs edit-btn">edit</a>
</div>
<div class="info">
    {{ $article->points }}
    @if ($article->points == 1)
        point
    @else
        points
    @endif
    | posted by {{ $article->user->name }} |
    @if ($template == 'index')<a href="{{ route('show_article', ['article' => $article->id]) }}">@endif
        {{ $article->comments->count() }}
        @if ($article->comments->count() == 1)
            comment
        @else
            comments
        @endif
    @if ($template == 'index')</a>@endif
</div>
