<!doctype html>
<html lang="en">
<body>
<h1>List of ALL my movies!!!</h1>
<?php
// Connect to database
include("db.php");

// Run SQL query
$sql = "SELECT * FROM movies ORDER BY date_of_release";
$results = mysqli_query($mysqli, $sql);
?>

<table class="table table-striped">
	<?php while($a_row = mysqli_fetch_assoc($results)):?>
		<tr>
          <td><a href="movie-details.php?id=<?=$a_row['movie_id']?>"><?=$a_row['movie_name']?></a></td>
          <td><?=$a_row['rating']?></td>
		  <td><a class="btn btn-outline-danger btn-sm" href="delete-movie.php?id=<?=$a_row['movie_id']?>" role="button">Delete</a></td>
		</tr>
	<?php endwhile;?>
</table>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
</svg> Add movie</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New movie</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="add-movie.php" method="post">
          <div class="mb-3">
            <label for="MovieName" class="col-form-label">Movie name:</label>
            <input type="text" class="form-control" id="MovieName" name="MovieName">
          </div>
          <div class="mb-3">
            <label for="MovieDescription" class="col-form-label">Movie description:</label>
            <textarea class="form-control" id="MovieDescription" name="MovieDescription"></textarea>
          </div>
          <div class="mb-3">
            <label for="DateReleased" class="col-form-label">Movie release date:</label>
            <input type="date" class="form-control" id="DateReleased" name="DateReleased">
          </div>	
		  <div class="mb-3">
            <label for="MovieRating" class="col-form-label">Movie rating:</label>
            <input type="number" class="form-control" id="MovieRating" name="MovieRating">
          </div>
		  
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		  <button type="submit" class="btn btn-primary">Add</button>		  
        </form>
	  </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
</body>
</html>
