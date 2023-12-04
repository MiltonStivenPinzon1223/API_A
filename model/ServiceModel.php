<?php

require_once "ConDB.php";

class ServiceModel {

    public static function all(){
        $query = "SELECT solicitudes.*, dogs.dog_name, (SELECT breeds.bre_breed FROM `dogs` INNER JOIN breeds ON breeds.bre_id = dogs.bre_id WHERE dogs.dog_id =solicitudes.dog_id) as breed, status.sta_status, payment_method.pame_method, (SELECT users.use_name from users INNER JOIN users ON users.use_id = services.use_id) FROM `solicitudes` INNER JOIN dogs ON dogs.dog_id = solicitudes.dog_id INNER JOIN status ON status.sta_id = solicitudes.sta_id INNER JOIN payment_method ON payment_method.pame_id = solicitudes.pame_id";
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
}
?>