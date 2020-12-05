<?php
namespace mystore;
require_once "log/logger.php";
class Usuario{
    private $config;
    private $cn = null;
    public function __construct(){

        $this->config = parse_ini_file(__DIR__ . '/../config.ini');

        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }
    public function login($name, $pass){
        $tinit = microtime(true);
        $msg = "user $name has logged in";
        $query = "SELECT name FROM `users` WHERE `name`=:name AND `clv` = :pass";
        $ans = $this->cn->prepare($query);
        
        $data = array(
            ":name" => $name,
            ":pass" => $pass
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
