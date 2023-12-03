<?php

require_once "ConDB.php";

class ServiceModel {

    public static function all(){
        $query = "SELECT * FROM services";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $services = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $services;
    }

    public static function find($id){
        $query = "SELECT * FROM services WHERE pame_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $service = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $service;
    }

    public static function create($data){
        $query = "INSERT INTO `services`(`pame_service`) VALUES ('".$data['pame_service']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("service created successfully");
        return $message;
    }

    public static function update($id,$data){
        $query = "UPDATE `services` SET `pame_service`='".$data['pame_service']."' WHERE pame_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("service updated successfully");
        return $message;
    }
}
?>