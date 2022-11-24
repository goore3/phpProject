<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

    <div class="container">
    
	  <h1> Create Movie Object </h1>
		<div class="row row-cols-1 row-cols-md-3 g-4">
			<form method="POST" enctype="multipart/form-data" action="<?php echo PROJECT_URL; ?>/movie/create">
				<div class="form-group">
					<label for="movieTitle">Movie name:</label>
					<input required type="text" id="movieTitle" class="form-control" name="title" placeholder="Enter name of movie">
				</div>
				<div class="form-group">
					<label for="movieDesc">Movie description:</label>
					<input required type="text" id="movieDesc" class="form-control" name="description" placeholder="Description isn't necessary.">
				</div>
				<div class="form-group">
					<label for="movieRating">IMDB Rating:</label>
					<select id="movieRating" class="form-control" name="imdb_rating">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
					</select>
				</div>
				<div class="form-group">
					<label for="movieYear">Year of movie production:</label>
					<?php $year = strftime("%Y", time()); ?>
					<input required type="number" min="1900" max="<?php echo $year ?>" id="movieYear" class="form-control" name="release_year">
				</div>
				<div class="form-group">
					<label>Movie image:</label>
					<input type="file" name="file">
				</div>
				<br>
				<button class="btn btn-primary" type="submit">Create Movie</button>
			</form> 
		</div>
	</div>
<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>

