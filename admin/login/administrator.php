<?php
session_start();
include_once ("../../model/database.php");
class Administrator {

    //database connection and table name
    private $conn;
    private $table_name = "administrators";
    //constructor with $db as database connection
    public function __construct(){
        $this->conn = new Database();
        $this->conn = $this->conn->getConnection();
    }
	
	//method
    function login($username, $psw) {
        if (!empty($username) && !empty($psw)) {

            $sql = "SELECT * FROM " . $this->table_name .  " WHERE username = ? AND psw = ?";
            $stmt = $this->conn->prepare($sql);
            $params = [$username, $psw];

            $stmt->execute($params);

            if ($stmt->rowCount() == 1) {
                $session = rand();
                $_SESSION["username"] = "$session";
                header("location: ../index.php");
            }
            else {
                print '<div class="alert alert-primary" role="alert">';
                print 'Incorect username or password.';
                print '</div>';               
            }
        }
        else {
            print '<div class="alert alert-primary" role="alert">';
            print "Please enter username and password.";
            print '</div>'; 
        }
    }
}
?>