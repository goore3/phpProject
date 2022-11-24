<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

    <script>
	$(document).ready(function () {
		$('#moviesTable').DataTable();
	});
	</script>
	
	<div class="container">
    
      <h1>List of movies:</h1>

      <div class="row row-cols-12 row-cols-md-12 g-4">
		<table id="moviesTable"class="table">
		  <thead>
			<tr>
			  <th scope="col">Title</th>
			  <th scope="col">IMDB Rating</th>
			  <th scope="col">Release Year</th>
			</tr>
		  </thead>
		  <tbody>
      <?php 
          foreach ($data['movies'] as $movie) {
			echo "<tr>";
            echo 
			'<td class="col-sm-4"><a href="'.PROJECT_URL.'/movie/get/'.$movie['id'].'">'.$movie['title'].'</a></td>'.
			'<td class="col-sm-2">'.$movie['imdb_rating'].'</td>'.
			'<td class="col-sm-2">'.$movie['release_year'].'</td>';
			echo "</tr>";
          }
      ?>
		  </tbody>
		</table>      
      </div>

<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>

