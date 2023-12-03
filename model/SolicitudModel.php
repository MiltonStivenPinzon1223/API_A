<?php

require_once "ConDB.php";

class SolicitudModel {

    public static function all(){
        $query = "SELECT * FROM solicitudes";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $solicitudes = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $solicitudes;
    }

    public static function find($id){
        $query = "SELECT * FROM solicitudes WHERE pame_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $solicitud = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $solicitud;
    }

    public static function create($data){
        $query = "INSERT INTO `solicitudes`(`pame_solicitud`) VALUES ('".$data['pame_solicitud']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("solicitud created successfully");
        return $message;
    }

    public static function update($id,$data){
        $query = "UPDATE `solicitudes` SET `pame_solicitud`='".$data['pame_solicitud']."' WHERE pame_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("solicitud updated successfully");
        return $message;
    }
}
?>