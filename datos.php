<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers:*');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Methods: DELETE');

include_once 'conexion.php';

class Datos extends dbPrueba{

    // Funcion para ejecutar el sp_Vista
    function Vista(){
        $cn = $this->Conexion();
        $stm = $cn->prepare('call sp_Vista()');
        $stm->execute();
        return $stm;
    }

    // Funcion para ejecutar el sp_Nuevo
    function Nuevo($array){
        $id = $array['Id'];
        $title = $array['Title'];
        $nom = $array['Nombre'];
        $ape = $array['Apellido'];
        $correo = $array['Correo'];
        $role = $array['Role'];
        $contr = $array['Contrasena'];
        $cn = $this->Conexion();
        $stm=$cn->prepare("call sp_Nuevo(:d1, :d2, :d3, :d4, :d5, :d6, :d7)");
        $stm->bindParam(':d1', $id);
        $stm->bindParam(':d2', $title);
        $stm->bindParam(':d3', $nom);
        $stm->bindParam(':d4', $ape);
        $stm->bindParam(':d5', $correo);
        $stm->bindParam(':d6', $role);
        $stm->bindParam(':d7', $contr);
        $stm->execute();
        return $stm;
    }


    // Funcion para ejecutar el sp_Actualizar
    function Actualizar($array){
        $id = $array['Id'];
        $title = $array['Title'];
        $nom = $array['Nombre'];
        $ape = $array['Apellido'];
        $correo = $array['Correo'];
        $role = $array['Role'];
        $contr = $array['Contrasena'];
        $cn = $this->Conexion();
        $stm=$cn->prepare("call sp_Actualizar(:d1, :d2, :d3, :d4, :d5, :d6, :d7)");
        $stm->bindParam(':d1', $id);
        $stm->bindParam(':d2', $title);
        $stm->bindParam(':d3', $nom);
        $stm->bindParam(':d4', $ape);
        $stm->bindParam(':d5', $correo);
        $stm->bindParam(':d6', $role);
        $stm->bindParam(':d7', $contr);
        $stm->execute();
        return $stm;
    }


    // Funcion para ejecutar el sp_Buscar
    function Buscar($cod){
        $cn=$this->Conexion();
        $stm=$cn->prepare("call sp_Buscar(:d1)");
        $stm->bindParam(':d1', $cod);
        $stm->execute();
        return $stm;
    }

    // funcion para ejecutar el sp_eliminar
    function Eliminar($id){
        $cn = $this->Conexion();
        $stm = $cn->prepare('call sp_Eliminar(:d1)');
        $stm->bindParam(':d1', $id);
        $stm -> execute();
        return $stm;
    }
}