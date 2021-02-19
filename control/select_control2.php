<?php
// include database and object files
include_once '../model/database.php';
include_once '../model/menu.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare post object
$post = new Post($db);
 
// query post
$stmt = $post->read();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    $y[] = $row;
  }
  echo json_encode($y);
?>