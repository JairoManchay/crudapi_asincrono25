<?php
class dbPrueba{
    public function __construct(){}

    function Conexion(){
        $cn = new PDO('mysql:host=localhost; dbname=bdPrueba','root','');
        return $cn;
    }
}