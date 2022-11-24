<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

    <div class="container">
    
        <h1> Create Movie Object </h1>

      <div class="row row-cols-1 row-cols-md-3 g-4">

        <form method="POST" action="<?php echo PROJECT_URL; ?>/movie/create">
            <label>Movie name:</label>
            <input required type="text" name="title">
            <br>
            <br>
            <label>IMDB Rating</label>
            <input required type="number" name="imdb_rating">
            <button type="submit">Create Movie</button>
        </form> 
      
      </div>

<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>

