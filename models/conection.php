<?php 
include_once('env.php');
class Connection
{
    var $conn;
    public function __construct()
    {
        $this->conn = new mysqli(servername, username, password, dbname);

    $this->conn->set_charset("utf8"); // set utf-8 dể đọc dữ liệu tiếng Việt

    // Check connection
    if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
    }
    }
}

    
 ?>