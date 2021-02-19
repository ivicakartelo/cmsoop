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
$comment->menu_id = isset($_GET['menu_id']) ? $_GET['menu_id'] : die();

// read the details of post to be edited
$stmt = $comment->read_approved();

if($stmt->rowCount() > 0){
    // comments array
    $comments_arr=array();
    $comments_arr["comments"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $comment_item=array(
            "nickname" => $nickname,
            "content" => $content,
			"published" => $published
        );
        array_push($comments_arr["comments"], $comment_item);
	}
    echo json_encode($comments_arr["comments"]);
}
else{
    echo json_encode(array());
}
?>