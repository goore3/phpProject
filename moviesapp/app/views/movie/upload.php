<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

    <div class="container">
    
        <h1> Upload site </h1>

      <div class="row row-cols-1 row-cols-md-3 g-4">

        <form method="POST" enctype="multipart/form-data" action="<?php echo PROJECT_URL; ?>/movie/upload">
            <label>Movie Name:</label>
            <input type="file" name="file">
            <input type="text" name="nome">
            <button type="submit">Create Movie</button>
        </form> 
      
      </div>

      
      <h1> Página de upload de varios ficheiros </h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">

    <form method="POST" enctype="multipart/form-data" action="<?php echo PROJECT_URL; ?>/movie/upload">
        <label>Movie Name`:</label>
        <input type="file" multiple name="files[]">
        <input type="text" name="nome">
        <button type="submit">Create Movie</button>
    </form> 

    </div>

<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>

