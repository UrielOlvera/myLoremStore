<?php
namespace mystore;

class Articulo{
    private $config;
    private $cn = null;
    public function __construct(){

        $this->config = parse_ini_file(__DIR__ . '/../config.ini');

        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function add($_params){
        $query = "INSERT INTO `article`(`name`, `description`, `image`, `unitPrice`, `category`) VALUES (:name,:description,:image,:unitPrice,:category)";
        $ans = $this->cn->prepare($query);
        $data = array(
            ":name" => $_params['name'],
            ":description" => $_params['description'],
            ":image" => $_params['image'],
            ":unitPrice" => $_params['unitPrice'],
            ":category" => $_params['category']
        );
        if($ans->execute($data))
            return true;

        return false;
    }
    public function update($_params){
        $query = "UPDATE `article` SET `name`=:name,`description`=:description,`image`=:image,`unitPrice`=:unitPrice,`category`=:category WHERE `id`=:id";
        $ans = $this->cn->prepare($query);
        $data = array(
            ":name" => $_params['name'],
            ":description" => $_params['description'],
            ":image" => $_params['image'],
            ":unitPrice" => $_params['unitPrice'],
            ":category" => $_params['category'],
            ":id" => $_params['id']
        );
        if($ans->execute($data))
            return true;

        return false;
    }
    public function delete($id){
        $query = "DELETE FROM `article` WHERE `id`=:id";
        $ans = $this->cn->prepare($query);
        $data = array(
            ":id" => $id
        );
        if($ans->execute($data))
            return true;

        return false;
    }
    public function show(){
        $query = "SELECT article.id, article.name, description, image, unitPrice, status, categories.name as nameCategory FROM `article` 
        INNER JOIN `categories`
        ON article.category = categories.id ORDER BY article.id DESC
        ";

        $ans = $this->cn->prepare($query);

        if($ans->execute())
            return $ans->fetchAll();

        return false;
    }
    public function showByID($id){
        $query = "SELECT * FROM `article` WHERE `id`=:id";
        $ans = $this->cn->prepare($query);
        
        $data = array(
            ":id" => $id
        );

        if($ans->execute($data))
            return $ans->fetch();

        return false;
    }
}

?>