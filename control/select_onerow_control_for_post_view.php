<?php
// include database and object files
include_once '../model/database.php';
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

if($stmt->rowCount() > 0)
{
    // posts array
    $posts_arr=array();
    $posts_arr["menu"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item=array(
            "menu_id" => $menu_id,
            "name" => $name,
            "content" => $content,
			"published" => $published
        );
        array_push($posts_arr["menu"], $post_item);
	}
    echo json_encode($posts_arr["menu"]);
}
else{
    echo json_encode(array());
}
?>