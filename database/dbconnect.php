<?php
class dbConnect{
    function __construct()
    {
        require_once ('dbconf.php');
        $conn = mysqli_connect(HOST_NAME,HOST_USER, HOST_PASSWORD, DBNAME);
        $this->conn=$conn;
        if(!$this->conn){
            echo "database not connected";
        }
        return $this->conn;
    }

}