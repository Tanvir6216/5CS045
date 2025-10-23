<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add a Movie</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
crossorigin="anonymous">
</head>
<body>
<div class="container">
  <h1>Add a Movie</h1>
  <form action="add-movie.php" method="post">
    <div class="mb-3">
      <label for="MovieName" class="form-label">Movie Name</label>
      <input type="text" class="form-control" id="MovieName" name="MovieName" required>
    </div>
    <div class="mb-3">
      <label for="Genre" class="form-label">Genre</label>
      <input type="text" class="form-control" id="Genre" name="Genre" required>
    </div>
    <div class="mb-3">
      <label for="Price" class="form-label">Price</label>
      <input type="number" step="0.01" class="form-control" id="Price" name="Price" required>
    </div>
    <div class="mb-3">
      <label for="DateOfRelease" class="form-label">Date of Release</label>
      <input type="date" class="form-control" id="DateOfRelease" name="DateOfRelease" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Add Movie">
  </form>
</div>
</body>
</html>
