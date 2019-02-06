<?php
class ControllerDb {
    
    public function __construct()
    {
        $this->connect();
    }
    
    public function connect()
    {
        $db = new mysqli(dbAddress, dbUser, dbPassword);
        $db->select_db(dbName);
        if (mysqli_connect_error()) {
            print_r('Connection failed to db: ' . mysqli_connect_error());die;
        }
        
        return $db;
    }
}