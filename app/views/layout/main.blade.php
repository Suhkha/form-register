<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication App With Laravel</title>

    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('css/main.css') }}
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-inner">
        <div class="container">
            <ul class="nav navbar-nav">
            @if(!Auth::check())
                <li>{{ HTML::link('users/register/ ', 'Register') }}</li>  
                <li>{{ HTML::link('users/login/ ', 'Login') }}</li>  
            @else
                <li>{{ HTML::link('users/logout/ ', 'Logout')}}</li>
            @endif
            </ul>
        </div>
    </div>
</div>

<div class="container">
    @if(Session::has('message'))
        <p class="alert alert-warning">{{ Session::get('message') }}</p>
    @endif

    {{ $content }}
</div>

</body>
</html>