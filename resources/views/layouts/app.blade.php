<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>{{ config('app.name') }}</title><!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet"><!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        [class^='bg-'] {
            
            padding:12px;
            border-radius:4px;
            border:1px solid rgba(0,0,0,0.1);

            margin:12px 0;
            
        }

        button
        {
            margin:0;
            padding:0;
            background-color:transparent;
            border-width:0;
            display: inline-block;
            text-align: center;
        }

        .comments
        {
            padding:32px 0;
        }

        .comment-body {
                white-space: pre-wrap;
        }

        .comments li {
            margin: 16px 0 32px 0;
        }

        .comment-info {
            border-top: 1px solid #eee;
            margin-top:6px;
            padding-top:6px;
            font-size:10px;
        }

        .article-overview .fa-btn { 
            
            margin-left:6px;

        }

        .form-inline { display:block;height:24px; }

        .article-overview {
            list-style-type: none;
            padding: 0px;
        }

        .article-overview li
        {
            padding: 8px 0;
        }

        .urlTitle {
            font-size: 24px;
        }

        .disabled {
            color:lightgrey;
        }

        .vote {
            float:left;
            height:48px;
            margin-right:4px;
            position: relative;
        }

        .vote .fa-btn {
            font-size:18px;
        }

        .downvote i, .downvote button
        {
            display: block;
            position:absolute;
            bottom:0;
        }

        .breadcrumb {
            padding-left:0;
            margin-bottom: 16px;
            background-color:transparent;
        }

        .panel-content {

            padding:32px;
        }

        .edit-btn
        {
            margin-left:8px;
            padding:0 4px;
        }

        .info {
            font-size:10px;
        }

    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                 <button class="navbar-toggle collapsed" data-target="#app-navbar-collapse" data-toggle="collapse" type="button"><span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <!-- Branding Image -->
                 <a class="navbar-brand" href="{{ route('index') }}">{{ config('app.name') }}</a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('index') }}">Home</a>
                    </li>
                    @unless (Auth::guest())
                        <li>
                            <a href="{{ route('add_article') }}">Add article</a>
                        </li>
                    @endunless
                </ul><!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-btn fa-sign-out"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row"></div>
            @yield('content')
    </div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>