<?php

require_once "ConDB.php";

class SolicitudModel {

    public static function all(){
        $query = "SELECT solicitudes.*, dogs.dog_name, (SELECT breeds.bre_breed FROM `dogs` INNER JOIN breeds ON breeds.bre_id = dogs.bre_id WHERE dogs.dog_id =solicitudes.dog_id) as breed, status.sta_status, payment_method.pame_method FROM `solicitudes` INNER JOIN dogs ON dogs.dog_id = solicitudes.dog_id INNER JOIN status ON status.sta_id = solicitudes.sta_id INNER JOIN payment_method ON payment_method.pame_id = solicitudes.pame_id;";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $solicitudes = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $solicitudes;
    }

    public static function find($id){
        $query = "SELECT solicitudes.*, dogs.dog_name, (SELECT breeds.bre_breed FROM `dogs` INNER JOIN breeds ON breeds.bre_id = dogs.bre_id WHERE dogs.dog_id =solicitudes.dog_id) as breed, status.sta_status, payment_method.pame_method FROM `solicitudes` INNER JOIN dogs ON dogs.dog_id = solicitudes.dog_id INNER JOIN status ON status.sta_id = solicitudes.sta_id INNER JOIN payment_method ON payment_method.pame_id = solicitudes.pame_id WHERE solicitudes.sol_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $solicitud = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $solicitud;
    }

    public static function create($data){
        $date = date("Y-m-d");
        $query = "INSERT INTO `solicitudes`(`sol_start`, `sol_end`, `sol_date`, `sol_price`, `dog_id`, `sta_id`, `pame_id`) VALUES ('".$data['sol_start']."','".$data['sol_end']."','".$date."','".$data['sol_price']."','".$data['dog_id']."','1','".$data['pame_id']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("solicitud created successfully");
        return $message;
    }

    public static function update($id,$data){
        $date = date("Y-m-d");
        $query = "UPDATE `solicitudes` SET `sol_start`='".$data['sol_start']."',`sol_end`='".$data['sol_end']."',`sol_date`='".$date."',`sol_price`='".$data['sol_price']."',`dog_id`='".$data['dog_id']."',`sta_id`='".$data['sta_id']."',`pame_id`='".$data['pame_id']."' WHERE sol_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("solicitud updated successfully");
        return $message;
    }
}
?>