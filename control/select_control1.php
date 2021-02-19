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
$stmt = $post->read1();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // create empty array for else
    $posts_arr=array();
    // create empty array named menu
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