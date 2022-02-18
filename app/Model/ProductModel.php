<?php
    

class ProductsModel {
    
    private $db;
    public function __construct() {        

        // $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_especial;charset=utf8', 'root', '');

        // $url = parse_url(getenv("mysql://be3093d987bbca:14377f76@us-cdbr-east-05.cleardb.net/heroku_3768f01bf6856fc?reconnect=true"));
        // $server = 'us-cdbr-east-05.cleardb.net';
        // $username = 'be3093d987bbca';
        // $password = '14377f76';
        // $db = 'heroku_3768f01bf6856fc';
        // $this->db = new mysqli($server,$username,$password,$db);
        // $conn = new mysqli($server, $username, $password, $db);

        $this->db = new PDO('mysql:host=us-cdbr-east-05.cleardb.net;b=heroku_3768f01bf6856fc','username=be3093d987bbca','password=14377f76', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        // $this->db = new PDO('mysql:host=localhost;'.'dbname=apirest_mydate;charset=utf8', 'apirest_mydate', '');        
        // $this->db = new PDO('mysql:host=localhost;'.'dbname=apirest_mydate;charset=utf8', 'apirest_usr1', 'Qe8raDs78g');
    }
    
    function getProducts() {
        $query = $this->db->prepare('SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function getProductById($id) {
        $query = $this->db->prepare('SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category WHERE id=?');
        $query->execute(array($id));
        $product = $query->fetch(PDO::FETCH_OBJ);        
        return $product;       
    }

    function deleteProducts($id) {
        $query = $this->db->prepare('DELETE FROM products WHERE id=?');
        $query->execute(array($id));
        return $query->rowCount();
    } 

    function orderProductsBy($orderby){
        $query = $this->db->prepare("SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category ORDER BY ? ASC");
        $query->execute(array($orderby));
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function addProduct($category,$name,$description, $price_a,$price_b, $pathImg = null) {   
        $img = null;
        if ($pathImg)
            $img = $this->uploadImage($pathImg);
    
        $query = $this->db->prepare('INSERT INTO products (category,name,description,img,price_a,price_b) VALUES (?,?,?,?,?,?)');
        $query->execute([$category,$name,$description,$img,$price_a,$price_b]);
        $product = $query->fetchAll(PDO::FETCH_OBJ);
        return $product;    
    }

    function updateProductById($category, $name, $description,$price_a, $price_b, $id,  $pathImg = null){
        $img = null;
        if ($pathImg){
            $img = $this->uploadImage($pathImg);
            $query = $this->db->prepare('UPDATE products SET category=?, name=?, description=?, img=?, price_a=?, price_b=? WHERE id=?');
            $query->execute([$category, $name, $description, $img, $price_a, $price_b, $id]);
        } else {
            $query = $this->db->prepare('UPDATE products SET category=?, name=?, description=?, price_a=?, price_b=? WHERE id=?');
            $query->execute([$category, $name, $description, $price_a, $price_b, $id]);
        }
        $product = $query->fetchAll(PDO::FETCH_OBJ);
        return $product;
    }   

    private function uploadImage($imagen_name){
        $uploads_dir = "images/" . uniqid() . "." . strtolower(pathinfo($imagen_name['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($imagen_name['tmp_name'], $uploads_dir );
        return $uploads_dir;
    }


}