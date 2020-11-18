<?php
namespace mystore;

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
        $query = "SELECT * FROM categories";

        $ans = $this->cn->prepare($query);

        if($ans->execute())
            return $ans->fetchAll();

        return false;
    }
}
?>