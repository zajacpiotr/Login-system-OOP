<?php
include_once ('DBConfig.php');

class Core extends DBConfig
{
    public function __construct()
    {
        parent::__construct();
    }
     public function insert($username,$password,$name,$lastName,$email) 
        { 
            $query = 'INSERT INTO users (username, password, name, last_name, email) VALUES(:username, :password, :name, :lastName, :email)';

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt == false) {
                echo 'Error: cannot insert';
                return false;
            } else {
                return true;
            }
        }
    public function update($password,$username) 
        { 
            $query = "UPDATE users SET password='$password' WHERE username='$username'";

            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            if ($stmt == false) {
                echo 'Error: cannot update';
                return false;
            } else {
                return true;
            }
        }
}
?>
