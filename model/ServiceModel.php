<?php

require_once "ConDB.php";

class ServiceModel {

    public static function all(){
        $solicitudes = array();
        $query = "SELECT * FROM services";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $services = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($services as $service) {
            $solicitud = SolicitudModel::find($service['sol_id']);
            $user = UserModel::getUsers($service['use_id']);
            $solicitud[0]['use_name'] = $user[0]['use_name'];
            array_push($solicitudes, $solicitud[0]);
        }
        return $solicitudes;
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