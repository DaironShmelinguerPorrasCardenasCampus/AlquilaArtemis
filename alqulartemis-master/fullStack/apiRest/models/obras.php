<?php

require_once("../config/Conectar.php");

class Obras extends Conectar{

    private $Obras_ID;
    private $Cliente_ID;
    private $Nombre_Obra;


    public function __construct($Obras_ID = 0,$Cliente_ID = "",$Nombre_Obra= "")
    {
        $this->Obras_ID = $Obras_ID;
        $this->Cliente_ID = $Cliente_ID;
        $this->Nombre_Obra = $Nombre_Obra;

    }

    // Funciones

    public function get_Obra()
    {
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = $conectar->prepare("SELECT * FROM Obra");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_Obras_ID($Obras_ID)
    {
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = $conectar->prepare("SELECT * FROM Obra WHERE Obras_ID = ?");
        $stm ->bindValue(1,$Obras_ID);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function InsertObra($Cliente_ID, $Nombre_Obra)
    {
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = "INSERT INTO Obra (Cliente_ID, Nombre_Obra) VALUES(?,?)";
        $stm = $conectar->prepare($stm);
        $stm->bindValue(1,$Cliente_ID);
        $stm->bindValue(2,$Nombre_Obra);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteObra($Obras_ID)
    {
        $conectar = parent::Conexion();
        parent::set_name();
        $stm= $conectar->prepare("DELETE FROM Obra WHERE Obras_ID=?");
        $stm->bindValue(1,$Obras_ID);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    

}

?>