<?php
class Post
{
    //private properties
    private $conn;
    private $table_name = "menu";
 
    //public properties
    public $menu_id;
    public $name;
    public $content;
    public $published;

    //constructor with $db = database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }	

    function read()
    {
        //query select concat posts for home page
        $sql = "SELECT menu_id, name, CONCAT(LEFT(content,400))
                AS content, published
                FROM " . $this->table_name . " 
                ORDER BY menu_id DESC";
    
        //prepare query statement
        $stmt = $this->conn->prepare($sql);
    
        //execute sql query
        $stmt->execute();

        return $stmt;
    }

    function read1()
    {
        //query select all posts
        $sql = "SELECT menu_id, name, content, published
                FROM " . $this->table_name . " 
                ORDER BY menu_id DESC";
    
        //prepare query statement
        $stmt = $this->conn->prepare($sql);
    
        //execute sql query
        $stmt->execute();

        return $stmt;
    }

    //select one row
    function read_single()
    {
        $sql = "SELECT menu_id, name, content, published                   
                FROM " . $this->table_name . " 
                WHERE menu_id= ?";
        
        $stmt = $this->conn->prepare($sql);
        $params = [$this->menu_id];
        $stmt->execute($params);
      
        return $stmt;
    }
} //Class End
?>