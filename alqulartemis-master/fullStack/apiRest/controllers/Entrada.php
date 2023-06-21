<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

header ('Contet-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/entradas.php");

$entradas = new Entrada();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]){
    case 'GetAll':
        $datos = $entradas->get_Entrada();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $entradas->get_Entrada_ID($body["Entrada_ID"]);
        echo json_encode($datos);
        break;
       
    case 'Insert':
        $datos = $entradas->InsertEntrada($body["Entrada_ID"], $body["Cliente_ID"],$body["Fecha_Salida"],$body["Hora_Salida"],$body["SubtotalPeso"],$body["Empleado_ID"],$body["PlacaTransporte"],$body["Observaciones"]);
        echo json_encode("Entrada insertado correctamente..");
        break;
         
    case 'Delete':
        $datos = $entradas->DeleteEntrada($body["Entrada_ID"]);
        echo json_encode("Entrada Borrada correctamente..");
        break;
         
    case 'Update':
       
        break;
        
    default:
        break;



}















?>