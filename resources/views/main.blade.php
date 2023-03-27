<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title></title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <!-- <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('home')}}">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('create')}}">New</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('search')}}">Live Search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('filter')}}">Filter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('pagination')}}">Pagination</a>
            </li>
          </ul>
        </div>
      </nav>


    @yield('content')


</body>
</html>