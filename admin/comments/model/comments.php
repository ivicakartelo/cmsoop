<?php
class Comment{
 
    //database connection and table name
    private $conn;
    private $table_name = "comments";
 
    //object properties
    public $comment_id;
    public $menu_id;
    public $nickname;
    public $content;
    public $published;
    public $approved;

    //constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }	
	
	//Methods
    //read all comments
    function read(){
    
        //query select all comments
        $sql =    "SELECT comment_id, menu_id, nickname, content, published, approved
                    FROM " . $this->table_name . " 
                    ORDER BY comment_id DESC";
        // prepare query
        $stmt = $this->conn->prepare($sql);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    //get single comment data
    function read_single(){
    
        // select single row
        $sql = "SELECT comment_id, menu_id, nickname, content, published, approved
                FROM " . $this->table_name . " 
                WHERE comment_id= ?";
        
        $stmt = $this->conn->prepare($sql);
        $params = [$this->comment_id];
        $stmt->execute($params);
      
        return $stmt;
    }


    //get all comments of menu_id and approved
    function read_approved(){
    
        // select single row
        $sql = "SELECT comment_id, menu_id, nickname, content, published, approved
                FROM " . $this->table_name . " 
                WHERE menu_id=? AND approved=1 ORDER BY comment_id DESC";
        
        $stmt = $this->conn->prepare($sql);
        $params = [$this->menu_id];
        $stmt->execute($params);
        
      
        return $stmt;
    }


        //add new comment
    function create(){
    
              
        // query to insert record
        $sql = "INSERT INTO  ". $this->table_name ." 
                (menu_id, nickname, content, published)
                VALUES (?,?,?,?)";

        $stmt = $this->conn->prepare($sql);
        $params = [$this->menu_id,$this->nickname,$this->content,$this->published];
    
        // execute query
        if($stmt->execute($params)){
            $this->menu_id = $this->conn;
            return true;
        }

        return false;
    }

    //update post 
    function update(){
    
        // query to update record
        $sql = "UPDATE
                " . $this->table_name . "
                SET
                comment_id='".$this->comment_id."', menu_id='".$this->menu_id."', nickname='".$this->nickname."', content='".$this->content."', 
                published='".$this->published."', approved='".$this->approved."'
                WHERE comment_id='".$this->comment_id."'";

        $stmt = $this->conn->prepare($sql);
        $params = [$this->comment_id,$this->menu_id,$this->nickname,
        $this->content,$this->published,$this->approved];
    
        // execute query
        if($stmt->execute($params)){
            return true;
        }
        return false;
    }
    

    //delete comment
    function delete(){
        
        // query to insert record
        $sql = "DELETE FROM " . $this->table_name . "
                WHERE comment_id= ?";


                $stmt = $this->conn->prepare($sql);
                $params = [$this->comment_id];
        
        // execute query
        if($stmt->execute($params)){
            return true;
        }
        return false;
    }
}
?>