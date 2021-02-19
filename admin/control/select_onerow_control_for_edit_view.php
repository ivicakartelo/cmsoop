<?php
// include database and object files
include_once '../../model/database.php';
include_once '../model/menu.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare post object
$post = new Post($db);

// set ID property of post to be edited
$post->menu_id = isset($_GET['menu_id']) ? $_GET['menu_id'] : die();

// read the details of post to be edited
$stmt = $post->read_single();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $post_arr=array(
        "menu_id" => $row['menu_id'],
        "name" => $row['name'],
        "content" => $row['content'],
        "published" => $row['published']
    );
}
// make it json format
print_r(json_encode($post_arr));
?>