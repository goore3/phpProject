<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

    <div class="container">
    
      <h1>Show Top 5 movies by rating:</h1>

      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
          
          foreach ($data['movies'] as $movie) {
            echo 
            '<div class="col">
              <div class="card">
                <img src="'.PROJECT_URL.'/uploads/'.$movie['id'].'.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">' . $movie['title'] . '</h5>
                  <p class="card-text">'.'IMDB Rating: ' . $movie['imdb_rating'] . '</p>
                  <a class="btn btn-primary" href="' . PROJECT_URL . '/movie/get/' . $movie['id'] .'">Detail</a>
                </div>
              </div>
            </div>';
          }
        ?>
      
      </div>

<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>