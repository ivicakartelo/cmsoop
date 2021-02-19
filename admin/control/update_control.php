<?php
// include database and object files
include_once '../../model/database.php';
include_once '../model/menu.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare post object
$post = new Post($db);
 
// set post property values
$post->menu_id = $_POST['menu_id'];
$post->name = $_POST['name'];
$post->content = $_POST['content'];
$post->published = $_POST['published'];
 
// create the post
if($post->update()){
    $post_arr=array(
        "status" => true,
        "message" => "Successfully Updated!"
    );
}
else{
    $post_arr=array(
        "status" => false,
        "message" => "Something get wrong!"
    );
}
print_r(json_encode($post_arr));
?>

