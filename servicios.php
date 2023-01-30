<?php 
// Funciones que serán accedidas por los clientes

header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers:*');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Methods: DELETE');


include_once 'datos.php';

class Servicios{

    // Funcion para la vista
    function getVista(){
        $datos = new Datos();
        $lista = array();
        $res = $datos->Vista()->fetchAll();

        // Recorrer el arreglo de la consulta
        foreach($res as $row){
            // $r un array con la misma estructura de la tabla dbPrueba
            $r["Id"] = $row["Id"];
            $r["Nombre"] = $row["Nombre"];
            $r["Correo"] = $row["Correo"];
            $r["Role"] = $row["Role"];

            array_push($lista, $r);
        }
        // json_encode-> Convertir un arreglo a un objeto JSON
        echo json_encode($lista);
    }


    // Funcion de agregar un dato nuevo
    function getNuevo($array){
        $curso = new Datos();

        try{
            $curso->Nuevo($array);
            echo "El registro se inserto satisfactoriamente";
        }catch(Exception $e){
            echo "El registro no se inserto";
        }
    }

    // Servicio para Buscar Curso -> Luego crear la pagina php que lo ejecute
    function getBuscar($id)
    {
        $curso = new Datos();
        $lista = array();
        $res = $curso->Buscar($id);

        if($res->rowCount()==1){
            $row = $res->fetch();
            $r["Id"]=$row["Id"];
            $r["Title"] = $row["Title"];
            $r["Nombre"] = $row["Nombre"];
            $r["Apellido"] = $row["Apellido"];
            $r["Correo"] = $row["Correo"];
            $r["Role"] = $row["Role"];
            $r["Contrasena"]=$row["Contrasena"];
            array_push($lista, $r);
        }else{
            $r["Id"] = "";
            $r["Title"] = "";
            $r["Nombre"] = "";
            $r["Apellido"] = "";
            $r["Correo"] = "";
            $r["Role"] = "";
            $r["Contrasena"]="";
            array_push($lista, $r);
        }
        echo json_encode($lista);
    }



        // Servicio para Actualizar
        function getActualizar($array)
        {
            $datos = new Datos();
    
            try {
                $datos->Actualizar($array);
                echo "El registro se actualizó satisfactoriamente";
            } catch (Exception $e) {
                echo "El registro no se actualizó";
            }
        }


    // Servicio para eliminar
    function getEliminar($id)
    {
        $datos = new Datos();
        try {
            $datos->Eliminar($id);
            echo "El registro se eliminó satisfactoriamente";
        } catch (Exception $e) {
            echo "El registro no se eliminó";
        }
    }
}
