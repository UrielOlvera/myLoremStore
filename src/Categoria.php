<?php
namespace mystore;
require_once "log/logger.php";
class Categoria{
    private $config;
    private $cn = null;
    public function __construct(){

        $this->config = parse_ini_file(__DIR__ . '/../config.ini');

        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function show(){
        $tinit = microtime(true);
        $msg = "all categories have been required";
        $query = "SELECT * FROM categories";

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