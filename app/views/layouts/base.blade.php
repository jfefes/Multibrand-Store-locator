<!doctype html>

<html>

  <head>
    <title>@if(isset($title)) {{ $title }}  | @endif TOG Locator Server </title>

    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

  </head>

  <body>

    <div class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="/" class="navbar-brand"><img src="/img/logo.png"/> </a>
      </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
              <li><a href="/">Home</a></li>
              <li><a href="/dashboard">Dashboard</a>  </li>
              <li><a href="/logout">Log Out</a>  </li>
            @else
              <li><a href="/login">Log In</a>  </li>
            @endif
          </ul>
        </div>
    </div>

    @yield('content')
    </div>

    <footer class="text-center" style="margin-top:100px">
      <h5>Looking for a feature you don't see?</h5>
      <a href="mailto:jfefes@togllc.com?subject=TOG Dealer Locator" class="btn btn-default">Email TOG Web department</a>
    </footer>
  </body>
</html>
