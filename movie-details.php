<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Movie Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<?php
include("db.php");

// Check if 'id' exists in the URL
if (!isset($_GET['id'])) {
  echo "<div class='alert alert-danger'>No movie ID specified.</div>";
  exit;
}

$id = intval($_GET['id']); // Sanitize input

// Run SQL query
$sql = "SELECT * FROM movies WHERE Movie_id = $id";
$result = mysqli_query($mysqli, $sql);

// Check if movie exists
if (!$result || mysqli_num_rows($result) == 0) {
  echo "<div class='alert alert-warning'>Movie not found.</div>";
  exit;
}

$movie = mysqli_fetch_assoc($result);
?>

<div class="container">
  <h1 class="mb-4">🎬 <?= htmlspecialchars($movie['Movie_name']) ?></h1>

  <div class="card shadow-sm">
    <div class="card-body">
      <p><strong>Genre:</strong> <?= htmlspecialchars($movie['Genre']) ?></p>
      <p><strong>Price:</strong> £<?= number_format($movie['Price'], 2) ?></p>
      <p><strong>Date of Release:</strong> <?= htmlspecialchars($movie['Date_of_release']) ?></p>
    </div>
  </div>

  <div class="mt-4 d-flex gap-2">
    <a href="5cs045-task1-2442655.php" class="btn btn-secondary">⬅ Back to List</a>
    <a href="delete-movie.php?id=<?= $movie['Movie_id'] ?>" class="btn btn-danger">🗑 Delete</a>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">✏️ Edit Movie</button>
  </div>
</div>

<!-- Edit Movie Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit Movie</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update-movie.php" method="post">
          <input type="hidden" name="Movie_id" value="<?= $movie['Movie_id'] ?>">

          <div class="mb-3">
            <label for="MovieName" class="col-form-label">Movie name:</label>
            <input type="text" class="form-control" id="MovieName" name="MovieName" 
                   value="<?= htmlspecialchars($movie['Movie_name']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="Genre" class="col-form-label">Genre:</label>
            <input type="text" class="form-control" id="Genre" name="Genre" 
                   value="<?= htmlspecialchars($movie['Genre']) ?>" maxlength="20" required>
          </div>
          <div class="mb-3">
            <label for="Price" class="col-form-label">Price (£):</label>
            <input type="number" step="0.01" class="form-control" id="Price" name="Price" 
                   value="<?= htmlspecialchars($movie['Price']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="DateReleased" class="col-form-label">Date of release:</label>
            <input type="date" class="form-control" id="DateReleased" name="DateReleased" 
                   value="<?= htmlspecialchars($movie['Date_of_release']) ?>" required>
          </div>

          <div class="text-end">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">💾 Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
