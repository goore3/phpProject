<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

    <div class="container">
    
      <h1>List of movies:</h1>

      <div class="row row-cols-12 row-cols-md-12 g-4">
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Title</th>
			  <th scope="col">IMDB Rating</th>
			  <th scope="col">Release Year</th>
			  <th scope="col"></th>
			</tr>
		  </thead>
		  <tbody>
      <?php 
          foreach ($data['movies'] as $movie) {
			echo "<tr>";
			echo '<th scope="row">' . $movie['id'] . '</th>';
            echo 
			'<td class="col-sm-6">'.$movie['title'].'</td>'.
			'<td class="col-sm-2">'.$movie['imdb_rating'].'</td>'.
			'<td class="col-sm-2">'.$movie['release_year'].'</td>'.			
              '
			  <td class="col-sm-1"><a class="btn btn-outline-info" href="'.PROJECT_URL.'/movie/get/' . $movie['id']  . '">Details</a></td>
              <td class="col-sm-1"><a class="btn btn-outline-warning" style="margin-left:20px;" href="'.PROJECT_URL.'/movie/update/' . $movie['id']  . '"> Edit </a></td>
              <td class="col-sm-1"><a class="btn btn-outline-danger" style="margin-left:20px;" href="'.PROJECT_URL.'/movie/delete/' . $movie['id']  . '"> Delete </a></td>
			  ';
			echo "</tr>";
          }
      ?>
		  </tbody>
		</table>      
      </div>

<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>

