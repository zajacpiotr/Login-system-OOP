<?php
include_once ("DbConfig.php");

class Validation extends DBConfig
{
    public function __construct()
    {
        parent::__construct();
    }
    public function checkEmpty($data, $fields) 
    {
        $msg= null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg = "All fields must be filled";
            }
        }
        return $msg;
    }
    public function isValid($field)
    {
        if (preg_match("/^[a-zA-ZąęćżźńłóśĄĆĘŁŃÓŚŹŻ\s]+$/", $field)) {
            if(strlen($field)>2) {
            return true;
            }
        } 
        return false;
    }
    public function isValidUsername($field) 
    {
        
        if (preg_match("/^([A-ZĆÓŁŚŻŹ]{1})([a-zA-ZąśżźćęńłóĄŚŻŹĆŃŁÓ0-9_.-]{2,11})$/", $field)) {
            if(strlen($field)>2) {
            return true;
            }
        } 
        return false;
    }
    public function read($query)
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        foreach ($stmt as $key => $res) {
            if (count($res)>0) {
                return true;
            } else {
                return false;
            }
            
        }
        
    }
    public function isEmailValid($field)
    {
        $pattern = "/^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$/";
        if (preg_match($pattern, $field)) {
            list($user, $domain) = preg_split("/@/", $field);
            if (checkdnsrr($domain,"MX")) {
                return true;
                } else {
                return false;
                }
        } else {
            return false;
        }
    }
}
