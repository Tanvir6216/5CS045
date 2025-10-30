<?php
include("db.php");
$id = $_GET['id'];
$sql = "DELETE FROM movies WHERE Movie_id = $id";
mysqli_query($mysqli, $sql);
header("Location: 5cs045-task1-2442655.php");
?>
