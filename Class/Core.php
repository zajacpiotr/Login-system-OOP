<?php
include_once ("DBConfig.php");

class Core extends DBConfig
{
    public function __construct()
    {
        parent::__construct();
    }
     public function insert($username,$password,$name,$lastName,$email) 
        { 
            $query = "INSERT INTO users (username, password, name, last_name, email) VALUES('$username','$password','$name','$lastName','$email')";

            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            if ($stmt == false) {
                echo 'Error: cannot insert';
                return false;
            } else {
                return true;
            }
        }
}
?>
