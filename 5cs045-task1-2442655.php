<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List of ALL my movies!!!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h1>List of All My Movies!!!</h1>

<?php
// Connect to database
include("db.php");

// Run SQL query
$sql = "SELECT * FROM movies ORDER BY Date_of_release";
$results = mysqli_query($mysqli, $sql);

// Check if results exist
if (!$results) {
    die("Database query failed: " . mysqli_error($mysqli));
}
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Movie Name</th>
      <th>Genre</th>
      <th>Price (£)</th>
      <th>Date of Release</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while($a_row = mysqli_fetch_assoc($results)): ?>
      <tr>
        <td><a href="movie-details.php?id=<?= $a_row['Movie_id'] ?>"><?= htmlspecialchars($a_row['Movie_name']) ?></a></td>
        <td><?= htmlspecialchars($a_row['Genre']) ?></td>
        <td><?= number_format($a_row['Price'], 2) ?></td>
        <td><?= htmlspecialchars($a_row['Date_of_release']) ?></td>
        <td>
          <a class="btn btn-outline-danger btn-sm" href="delete-movie.php?id=<?= $a_row['Movie_id'] ?>" role="button">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<!-- Button to open modal -->
<button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Movie
</button>

<!-- Modal for adding a movie -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Movie</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="add-movie.php" method="post">
          <div class="mb-3">
            <label for="MovieName" class="col-form-label">Movie name:</label>
            <input type="text" class="form-control" id="MovieName" name="MovieName" required>
          </div>
          <div class="mb-3">
            <label for="Genre" class="col-form-label">Genre:</label>
            <input type="text" class="form-control" id="Genre" name="Genre" maxlength="20" required>
          </div>
          <div class="mb-3">
            <label for="Price" class="col-form-label">Price (£):</label>
            <input type="number" step="0.01" class="form-control" id="Price" name="Price" required>
          </div>
          <div class="mb-3">
            <label for="DateReleased" class="col-form-label">Date of release:</label>
            <input type="date" class="form-control" id="DateReleased" name="DateReleased" required>
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
