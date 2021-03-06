<?php

class CategoryModel {
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=us-cdbr-east-05.cleardb.net;'.'dbname=heroku_3768f01bf6856fc;charset=UTF8','be3093d987bbca','14377f76');
    }  
   
    function getCategories() { 
        $query = $this->db->prepare('SELECT * FROM category');
        $query->execute();
        if ($query->rowCount() > 0) {
            $categories = $query->fetchAll(PDO::FETCH_OBJ);
            return $categories;
        } else {
            return false;
        }
        // $categoryproducts = $query->fetchAll(PDO::FETCH_OBJ);        
        // return $categoryproducts;
    }

    function addCategory($name, $description) {  
        $query = $this->db->prepare("INSERT INTO category (name,description) 
                                    VALUES (?,?)");
        $query->execute([$name,$description]);
        return $this->db->lastInsertId();
    }
    
    function deleteCategories($id) {
        $query = $this->db->prepare('DELETE FROM category WHERE id_category=?');
        $query->execute(array($id));
        return $query->rowCount();
    }

    function getProductsByCategory($category = null) {
        $query = $this->db->prepare('SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category WHERE category.name=?');
        $query->execute([$category]); // array($category)
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function getProductsByCategoryId($category = null) {
        $query = $this->db->prepare('SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category WHERE category.id_category=?');
        $query->execute([$category]); // array($category)
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function getCategoryById($id) {
        $query = $this->db->prepare('SELECT * FROM category WHERE id_category=?');
        $query->execute(array($id));
        $category = $query->fetch(PDO::FETCH_OBJ);        
        return $category;       
    }

    function updateCategoryById($name, $description, $id_category){
        $query = $this->db->prepare('UPDATE category SET name=?, description=? WHERE id_category=?');
        $query->execute([$name, $description, $id_category]);
        $category = $query->fetchAll(PDO::FETCH_OBJ);
        return $category;
    }
}
    