<?php
// include database and object files
include_once '../../../model/database.php';
include_once '../model/comments.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
//prepare comment object
$comment = new Comment($db);
 
// set comment property values
$comment->comment_id = $_POST['comment_id'];
 
// remove the post
if($comment->delete()){
    $comment_arr=array(
        "status" => true,
        "message" => "Successfully Removed!"
    );
}
else{
    $comment_arr=array(
        "status" => false,
        "message" => "Comment can't be deleted. May be he's relation to anather table!" . $comment->comment_id
    );
}
echo json_encode($comment_arr);
?>