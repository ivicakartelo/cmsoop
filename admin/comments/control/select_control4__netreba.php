<?php
// include database and object files
include_once '../../../model/database.php';
include_once '../model/comments.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare post object
$comment = new Comment($db);
 
// query post
$stmt = $comment->read4();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // posts array
    $comments_arr=array();
    $comments_arr["comments"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $comment_item=array(
            "comment_id" => $comment_id,
            "menu_id" => $menu_id,
            "nickname" => $nickname,
            "content" => $content,
            "published" => $published,
            "approved" => $approved
        );
        array_push($comments_arr["comments"], $comment_item);
	}
    echo json_encode($comments_arr["comments"]);
}
else{
    echo json_encode(array());
}
?>