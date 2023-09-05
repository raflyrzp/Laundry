<?php 

class Database 
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'laundry';

    protected $connect;

    public function __construct() {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }
    
}
