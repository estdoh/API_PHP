<?php

class ClientsModel {
    
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_especial;charset=utf8', 'root', '');
    }
    
    function getClients() {        
        $query = $this->db->prepare('SELECT * FROM clients');
       
        $query->execute();
        $clients = $query->fetchAll(PDO::FETCH_OBJ);        
        return $clients;
    }

    function getClientById($id) {
        $query = $this->db->prepare('SELECT * FROM clients WHERE id_client=?');
        $query->execute(array($id));
        $client = $query->fetch(PDO::FETCH_OBJ);         
        return $client;
    }

    function deleteClient($id) {
        $query = $this->db->prepare('DELETE FROM clients WHERE id_client=?');
        $query->execute(array($id));
        return $query->rowCount();
        $query = $this->db->prepare('SELECT *  FROM client_json ');
    } 

    function orderClientBy($orderby){
        $query = $this->db->prepare("SELECT clients.*,category.name as name_category FROM clients JOIN category ON clients.category = category.id_category ORDER BY ? ASC");
        $query->execute(array($orderby));
        $clients = $query->fetchAll(PDO::FETCH_OBJ);
        return $clients;
    }

    function addClient($client_name,$client_mail,$client_phone) {   
        $query = $this->db->prepare('INSERT INTO clients (client_name,client_mail,client_phone) VALUES (?,?,?)');       
        $query->execute([$client_name,$client_mail,$client_phone]);        
        return $this->db->lastInsertId();   
    }

    function updateClientById($client_name,$client_description,$client_detail,$client_total, $id){
        $query = $this->db->prepare('UPDATE clients SET cliente_name=?, client_description=?, client_detail=?, client_total=? WHERE id_client=?');
        $query->execute([$cliente_name,$client_description,$client_detail,$client_total, $id]);
        $client = $query->fetchAll(PDO::FETCH_OBJ);
        return $client;
    }   

    private function uploadImage($imagen_name){
        $uploads_dir = "images/" . uniqid() . "." . strtolower(pathinfo($imagen_name['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($imagen_name['tmp_name'], $uploads_dir );
        return $uploads_dir;
    }
}