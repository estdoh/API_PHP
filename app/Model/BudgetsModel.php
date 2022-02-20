<?php

class BudgetsModel {
    
    private $db;
    public function __construct() {
        // $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_especial;charset=utf8', 'root', '');
    }
    
    function getBudgets() {      
        // $query = $this->db->prepare('SELECT * FROM budgets 
        //                             INNER JOIN clients ON budgets.cliente_name = clients.id_client
        //                             ');
        $query = $this->db->prepare('SELECT client_name,budget_description,budget_total,budget_detail, name_product,price_product,quantity_product, client_name
                                    FROM budgets 
                                    INNER JOIN clients ON budgets.cliente_name = clients.id_client
                                    INNER JOIN budgets_detail ON budgets.budget_detail = budgets_detail.id_budget_detail
        ');
        $query->execute(); 
        $budgets = $query->fetchAll(PDO::FETCH_OBJ);    
        
        return $budgets;
    }

    function getBudgetById($id) {
        $query = $this->db->prepare('SELECT * FROM budgets 
                                    INNER JOIN clients ON budgets.cliente_name = clients.id_client 
                                    INNER JOIN budgets_detail ON budgets.budget_detail = budgets_detail.id_budget_detail
                                    WHERE id_budget=?');
        $query->execute(array($id));
        $budget = $query->fetch(PDO::FETCH_OBJ);         
        return $budget;
    }

    function deleteBudget($id) {
        $query = $this->db->prepare('DELETE FROM budgets WHERE id_budget=?');
        $query->execute(array($id));
        return $query->rowCount();
        // $query = $this->db->prepare('SELECT *  FROM budget_json ');
    }

    function orderBudgetBy($orderby){
        $query = $this->db->prepare("SELECT budgets.*,category.name as name_category FROM budgets JOIN category ON budgets.category = category.id_category ORDER BY ? ASC");
        $query->execute(array($orderby));
        $budgets = $query->fetchAll(PDO::FETCH_OBJ);
        return $budgets;
    }

    function addBudget($cliente_name,$budget_description,$budget_detail,$budget_total) {           
        $query = $this->db->prepare('INSERT INTO budgets (cliente_name,budget_description,budget_detail,budget_total) VALUES (?,?,?,?)');
        $query->execute([$cliente_name,$budget_description,$budget_detail,$budget_total]);        
        return $this->db->lastInsertId();   
    }

    function updateBudgetById($cliente_name,$budget_description,$budget_detail,$budget_total, $id){
        $query = $this->db->prepare('UPDATE budgets SET cliente_name=?, budget_description=?, budget_detail=?, budget_total=? WHERE id_budget=?');
        $query->execute([$cliente_name,$budget_description,$budget_detail,$budget_total, $id]);
        $budget = $query->fetchAll(PDO::FETCH_OBJ);
        return $budget;
    }

    private function uploadImage($imagen_name){
        $uploads_dir = "images/" . uniqid() . "." . strtolower(pathinfo($imagen_name['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($imagen_name['tmp_name'], $uploads_dir );
        return $uploads_dir;
    }
}