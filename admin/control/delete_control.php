<?php
// include database and object files
include_once '../../model/database.php';
include_once '../model/menu.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
//prepare post object
$post = new Post($db);
 
// set post property values
$post->menu_id = $_POST['menu_id'];
 
// remove the post
if($post->delete()){
    $post_arr=array(
        "status" => true,
        "message" => "Successfully Removed!"
    );
}
else{
    $post_arr=array(
        "status" => false,
        "message" => "Post can't be deleted. May be he's relation to anather table!" . $post->menu_id
    );
}
print_r(json_encode($post_arr));
?>