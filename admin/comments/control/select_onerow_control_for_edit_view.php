<?php
// include database and object files
include_once '../../../model/database.php';
include_once '../model/comments.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare post object
$comment = new Comment($db);

// set ID property of post to be edited
$comment->comment_id = isset($_GET['comment_id']) ? $_GET['comment_id'] : die();

// read the details of post to be edited
$stmt = $comment->read_single();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $comment_arr=array(
        "comment_id" => $row['comment_id'],
        "menu_id" => $row['menu_id'],
        "nickname" => $row['nickname'],
        "content" => $row['content'],
        "published" => $row['published'],
        "approved" => $row['approved']
    );
}
// make it json format
print json_encode($comment_arr);
?>