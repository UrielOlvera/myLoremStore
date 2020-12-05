<?php
namespace mystore;
require_once "log/logger.php";
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
        $tinit = microtime(true);
        $msg = "article added to the database";
        $query = "INSERT INTO `article`(`name`, `description`, `image`, `unitPrice`, `category`) VALUES (:name,:description,:image,:unitPrice,:category)";
        $ans = $this->cn->prepare($query);
        $data = array(
            ":name" => $_params['name'],
            ":description" => $_params['description'],
            ":image" => $_params['image'],
            ":unitPrice" => $_params['unitPrice'],
            ":category" => $_params['category']
        );
        if($ans->execute($data)){
            $tfinish = microtime(true);
            logger($msg, $tinit, $tfinish);
            return true;
        }
        return false;
    }
    public function update($_params){
        $tinit = microtime(true);
        $msg = "updated article in the database";
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
        if($ans->execute($data)){
            $tfinish = microtime(true);
            logger($msg, $tinit, $tfinish);
            return true;
        }
        return false;
    }
    public function delete($id){
        $tinit = microtime(true);
        $msg = "article $id removed from database";
        $query = "DELETE FROM `article` WHERE `id`=:id";
        $ans = $this->cn->prepare($query);
        $data = array(
            ":id" => $id
        );
        if($ans->execute($data)){
            $tfinish = microtime(true);
            logger($msg, $tinit, $tfinish);
            return true;
        }
        return false;
    }
    public function show(){
        $tinit = microtime(true);
        $msg = "all articles have been required";
        $query = "SELECT article.id, article.name, description, image, unitPrice, status, categories.name as nameCategory FROM `article` 
        INNER JOIN `categories`
        ON article.category = categories.id ORDER BY article.id DESC
        ";

        $ans = $this->cn->prepare($query);

        if($ans->execute()){
            $tfinish = microtime(true);
            logger($msg, $tinit, $tfinish);
            return $ans->fetchAll();
        }
        return false;
    }
    public function showByID($id){
        $tinit = microtime(true);
        $msg = "article $id has been required";
        $query = "SELECT * FROM `article` WHERE `id`=:id";
        $ans = $this->cn->prepare($query);
        
        $data = array(
            ":id" => $id
        );

        if($ans->execute($data)){
            $tfinish = microtime(true);
            logger($msg, $tinit, $tfinish);
            return $ans->fetch();
        }
        return false;
    }
}

?>