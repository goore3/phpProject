<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

<?php 
  $movieName = $data['movies'][0]['title']; 
  $imdbRating = $data['movies'][0]['imdb_rating']; 
  $id = $data['id']; 
?>
    <div class="container">
    
        <h1>Change information about movie:</h1>
        <h3>
          <?php echo $movieName; ?>
        </h3>
        <br>
        <br>
        <br>
      <div class="row row-cols-1 row-cols-md-3 g-4">

        <form method="POST" action="<?php echo PROJECT_URL; ?>/movie/update/<?php echo $id; ?>">
            <label>Movie name:</label>
            <input required type="text" name="title" value="<?php echo $movieName; ?>" >
            <br>
            <br>
            <label>IMDB Rating</label>
            <input required type="number" name="imdb_rating" value="<?php echo $imdbRating; ?>">
            <button type="submit">Edit Movie</button>
        </form> 
      
      </div>

<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>

