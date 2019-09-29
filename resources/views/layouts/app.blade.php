<html>
    <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
      <div class="container">

        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 75px">
           </div>
        </div>

        <div class="row">
          <div class="col-sm-4 col-md-4 col-lg-4" style="height: 100%;width: 200px;">

            <div class="sidenav">
              <a href="{{ URL::to('teams') }}">Team List</a>
              <a href="{{ URL::to('matches') }}">Play</a>
              <a href="{{ URL::to('teams.leaderboard') }}">Team Score</a> 
            </div> 

          </div>

          <div class="col-sm-8 col-md-8 col-lg-8">
            @include('flash-message')
            @yield('content')
          </div>
        </div>
      </div>
    </body>
</html>

<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
