<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

    <div class="container">
    
      <h1>Showing details of movie: <?php echo $data['movies'][0]['title']; ?> </h1>

      <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php
          echo "<ul>";
          foreach ($data['movies'] as $movie) {
            echo '<li>' . $movie['title'] . '</li>';
          }
          echo "<ul>";
        ?>
      
      </div>

<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>


