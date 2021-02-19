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
$comment->comment_id = $_POST['comment_id'];
$comment->menu_id = $_POST['menu_id'];
$comment->nickname = $_POST['nickname'];
$comment->content = $_POST['content'];
$comment->published = $_POST['published'];
$comment->approved = $_POST['approved'];

 
// create the comment
if($comment->update()){
    $comment_arr=array(
        "status" => true,
        "message" => "Successfully Updated!"
    );
}
else{
    $comment_arr=array(
        "status" => false,
        "message" => "Something get wrong!"
    );
}
print json_encode($comment_arr);
?>

