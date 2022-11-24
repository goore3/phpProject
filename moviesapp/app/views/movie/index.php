<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

    <div class="container">
    
      <h1>List of movies:</h1>

      <div class="row row-cols-12 row-cols-md-12 g-4">
      
      <?php 

          echo "<ul>";
          foreach ($data['movies'] as $movie) {
            echo '<li>' . $movie['title'] . ' 
              <a href="'.PROJECT_URL.'/movie/get/' . $movie['id']  . '">See +</a> 
              <a style="margin-left:20px;" href="'.PROJECT_URL.'/movie/delete/' . $movie['id']  . '"> 🗑️ Delete </a>
              <a style="margin-left:20px;" href="'.PROJECT_URL.'/movie/update/' . $movie['id']  . '"> 🖊️ Edit </a>
            </li>';
          }
          echo "<ul>";
      ?>
      
      </div>

<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>

