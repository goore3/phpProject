<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

    <div class="container">
    
      <h1>Showing details of movie: <?php echo $data['movies'][0]['title']; ?> </h1>

      <!-- <div class="row row-cols-1 row-cols-md-3 g-4"> -->

        <?php
          foreach ($data['movies'] as $movie) {
            echo '<br><h2>Description:</h2><p>' . $movie['description'] . '</p>';
            echo '<h5>IMDB Rating:</h5><p>' . $movie['imdb_rating'] . '</p>';
            echo '<h5>Release Date:</h5><p>' . $movie['release_year'] . '</p>';
          }
        ?>
      <?php echo 
	  '
	  <a class="btn btn-primary" href="'.PROJECT_URL.'/movie/index">Back</a>
	  <a class="btn btn-outline-warning" style="margin-left:20px;" href="'.PROJECT_URL.'/movie/update/' . $movie['id']  . '"> Edit </a>
	  <a class="btn btn-outline-danger" style="margin-left:20px;" href="'.PROJECT_URL.'/movie/delete/' . $movie['id']  . '"> Delete </a>	  
	  '?>
	  
      <!-- </div> -->

<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>


