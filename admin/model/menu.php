<?php
class Post
{
    //database connection and table name
    private $conn;
    private $table_name = "menu";
 
    //object properties
    public $menu_id;
    public $name;
    public $content;
    public $published;

    //constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

	//Methods
    //read all posts
    function read(){
    
        //query select all posts desc
        $query = "SELECT menu_id, name, content, published
                FROM " . $this->table_name . " 
                ORDER BY menu_id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        //execute query
        $stmt->execute();
    
        return $stmt;
    }

    //get single post data prepared query statement
    function read_single(){
    
        // prepared query statement
        $sql = "SELECT menu_id, name, content, published
                FROM " . $this->table_name . " 
                WHERE menu_id= ?";
        
        $stmt = $this->conn->prepare($sql);
        $params = [$this->menu_id];
        $stmt->execute($params);
      
        return $stmt;
    }

    //add new post
    function create(){
          
        // prepared query statement
        $sql = "INSERT INTO  ". $this->table_name ." 
                (name, content, published)
                VALUES
                (?,?,?)";

                $stmt = $this->conn->prepare($sql);
                $params = [$this->name, $this->content, $this->published];
   
        // execute query
        if($stmt->execute($params)){
            $this->menu_id = $this->conn;
            return true;
        }

        return false;
    }

    //update post prepared query statement

    function update(){
        $sql = "UPDATE " . $this->table_name . "
                SET name=?, content=?, 
                published=?
                WHERE menu_id=?";

        $stmt = $this->conn->prepare($sql);
        $params = [$this->name,$this->content,
        $this->published,$this->menu_id];
 
        if ($stmt->execute($params)) {
            return true;
        }
        return false;
    }

    //delete post prepared query statement
    function delete()
    {
        
        // query to insert record
        $sql = "DELETE FROM " . $this->table_name . "
                WHERE menu_id= ?";

                $stmt = $this->conn->prepare($sql);
                $params = [$this->menu_id];
       
               // execute query
                if($stmt->execute($params)){
                return true;
            }
        return false;
    }
} //POST END