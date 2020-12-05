<?php
namespace mystore;
require_once "log/logger.php";
class Pedido{
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
        $msg = "order added to the database";
        $query = "INSERT INTO `orders`(`customer`, `total`, `date`) VALUES (:customer,:total,:date)";
        $ans = $this->cn->prepare($query);
        $data = array(
            ":customer" => $_params['customer'],
            ":total" => $_params['total'],
            ":date" => $_params['date']
        );
        if($ans->execute($data)){
            $tfinish = microtime(true);
            logger($msg, $tinit, $tfinish);
            return $this->cn->lastInsertId();
        }
        return false;
    }
    public function addDetails($_params){
        $tinit = microtime(true);
        $msg = "order ".$_params['order_id']." details added to the database";
        $query = "INSERT INTO `orderdetails`(`order_id`, `article_id`, `price`, `quantity`) VALUES (:order_id,:article_id,:price,:quantity)";
        $ans = $this->cn->prepare($query);
        $data = array(
            ":order_id" => $_params['order_id'],
            ":article_id" => $_params['article_id'],
            ":price" => $_params['price'],
            ":quantity" => $_params['quantity']
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
        $msg = "all orders have been required";
        $query = "SELECT o.id, firstName, lastName, email, total, date FROM orders o 
        INNER JOIN customers c ON o.customer = c.id ORDER BY o.id DESC";
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
        $msg = "order $id has been required";
        $query = "SELECT
        o.id, firstName, lastName, email, total, date 
        FROM orders o 
        INNER JOIN customers c ON o.customer = c.id WHERE o.id = :id";
        $data = array(
            ':id' => $id
        );
        $ans = $this->cn->prepare($query);
        if($ans->execute($data)){
            $tfinish = microtime(true);
            logger($msg, $tinit, $tfinish);
            return $ans->fetch();
        }
        return false;
    }
    public function showDetailsByID($id){
        $tinit = microtime(true);
        $msg = "details of order $id have been requested";
        $query = "SELECT 
        od.id, a.name, od.price, od.quantity, a.image
        FROM orderdetails od
        INNER JOIN article a ON a.id = od.article_id
        WHERE od.order_id = :id";
        $data = array(
            ':id' => $id
        );
        $ans = $this->cn->prepare($query);
        if($ans->execute($data)){
            $tfinish = microtime(true);
            logger($msg, $tinit, $tfinish);
            return $ans->fetchAll();
        }
        return false;
    }
    public function showLatest(){
        $tinit = microtime(true);
        $msg = "the last 10 orders have been required";
        $query = "SELECT o.id, firstName, lastName, email, total, date FROM orders o 
        INNER JOIN customers c ON o.customer = c.id ORDER BY o.id DESC LIMIT 10";
        $ans = $this->cn->prepare($query);
        if($ans->execute()){
            $tfinish = microtime(true);
            logger($msg, $tinit, $tfinish);
            return $ans->fetchAll();
        }
        return false;
    }
}
?>