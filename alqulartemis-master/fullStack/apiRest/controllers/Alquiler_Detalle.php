<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header ('Contet-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/alquiler_detalles.php");

$AlquilerDetalles = new Alquiler_Detalles();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]){
    case 'GetAll':
        $datos = $AlquilerDetalles->get_Alquiler_Detalle();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $AlquilerDetalles->get_Alquiler_Detalle_ID($body["Alquiler_Detalle_ID"]);
        echo json_encode($datos);
        break;
       
    case 'Insert':
        $datos = $AlquilerDetalles->InsertAlquiler_Detalle($body["Alquiler_Detalle_ID"], $body["Alquiler_ID"],$body["Productos_ID"],$body["Obra_ID"],$body["Empleado_ID"],$body["Cantidad_Salida"],$body["Cantidad_Propia"],$body["Cantidad_Subalquilada"],$body["ValorUnida"],$body["Fecha_StanBye"],$body["Estado"]);
        echo json_encode("Detalle Alquiler insertado correctamente..");
        break;
         
    case 'Delete':
        $datos = $AlquilerDetalles->DeleteAlquiler_Detalle($body["Alquiler_Detalle_ID"]);
        echo json_encode("Detalle Alquiler Borrado correctamente..");
        break;
         
    case 'Update':
       
        break;
        
    default:
        break;



}















?>