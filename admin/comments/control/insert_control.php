<?php
 
// include database and object files
include_once '../../../model/database.php';
include_once '../model/comments.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare comment object
$comment = new Comment($db);
 
// set comment property values
$comment->menu_id = $_POST['menu_id'];
$comment->nickname = $_POST['nickname'];
$comment->content = $_POST['content'];
$comment->published = date('Y-m-d H:i:s');

// create the comment
if($comment->create()){
    $comment_arr=array(
        "status" => true,
        "message" => "Comment created!"
    );
}
else{
    $comment_arr=array(
        "status" => false,
        "message" => "Something got wrong!"
    );
}
echo json_encode($comment_arr);
?>