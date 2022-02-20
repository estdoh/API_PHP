<?php



class ConnectBD {
    
    private $db;
    public function __construct() {        
        $this->db = new PDO('mysql:host=us-cdbr-east-05.cleardb.net;'.'dbname=heroku_3768f01bf6856fc;charset=UTF8','be3093d987bbca','14377f76');
    }
}