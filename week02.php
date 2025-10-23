<!-- Let's include our templates first -->
<?php include("templates/header.php");?>
<?php include("templates/nav.php");?>

<h1>Hello, world!</h1>
<p>Hey!</p>

<?php
	$mysqli = new mysqli("localhost","2442655","T@nvir62216","db2442655");

    if ($mysqli -> connect_errno) (
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	)
	  
	// Run SQL query
	$sql = "SELECT * FROM videogames ORDER BY released_date";
	$results = mysqli_query($mysqli, $sql);

?>

<form action="search-games.php" method="post">
  <input class="form-control" type="text" name="keywords" placeholder="Search">
  <input class="btn btn-primary" type="submit" value="Go!">
</form>


<table class="table table-striped">
	<?php while($a_row = mysqli_fetch_assoc($results)):?>
		<tr>
          <td><a href="game-details.php?id=<?=$a_row['game_id']?>"><?=$a_row['game_name']?></a></td>
          <td><?=$a_row['rating']?></td>
		<tr>
	<?php endwhile;?>
</table>

<?php include("templates/footer.php");?>		
