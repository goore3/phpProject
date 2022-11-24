
<!doctype html>
<html lang="en">

<head>
  <title>Movies App</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand" href="#">Movies App</a>
        <p><?php 
          session_start();
          if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
          }   
        ?></p>   
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo PROJECT_URL; ?>/home/index" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Movies</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="<?php echo PROJECT_URL; ?>/movie/create">Create Movie</a>
                <a class="dropdown-item" href="<?php echo PROJECT_URL; ?>/movie/index">List of movies</a>
                <a class="dropdown-item" href="<?php echo PROJECT_URL; ?>/movie/upload">Upload</a>
              </div>
            </li>
          </ul>
          <form class="d-flex my-2 my-lg-0" method="POST" action="<?php echo PROJECT_URL; ?>/movie/search">
            <input class="form-control me-sm-2" type="text" name="search_text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    
  </header>
  <main>