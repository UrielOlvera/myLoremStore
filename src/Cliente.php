<?php
namespace mystore;

class Cliente{
    private $config;
    private $cn = null;
    public function __construct(){

        $this->config = parse_ini_file(__DIR__ . '/../config.ini');

        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }
    public function add($_params){
        $query = "INSERT INTO `customers`(`firstName`, `lastName`, `email`, `phone`, `comentary`) VALUES (:firstName,:lastName,:email,:phone,:comentary)";
        $ans = $this->cn->prepare($query);
        $data = array(
            ":firstName" => $_params['firstName'],
            ":lastName" => $_params['lastName'],
            ":email" => $_params['email'],
            ":phone" => $_params['phone'],
            ":comentary" => $_params['comentary']
        );
        if($ans->execute($data))
            return $this->cn->lastInsertId();

        return false;
    }
}
?>
