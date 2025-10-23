<?php
  // Connect to database and run SQL query
  include("db.php");

  // Grabs id value from URL
  $id = $_GET['id'];

  $sql = "SELECT * FROM movies WHERE movie_id = {$id}";
  $rst = mysqli_query($mysqli, $sql);
  $a_row = mysqli_fetch_assoc($rst);
?>

<h1><?=$a_row['movie_name']?></h1>
<p><strong>Genre:</strong> <?=$a_row['genre']?></p>
<p><strong>Price:</strong> £<?=$a_row['price']?></p>
<p><strong>Date of Release:</strong> <?=$a_row['date_of_release']?></p>

<a href="movies.php">&laquo; Back to list</a>
