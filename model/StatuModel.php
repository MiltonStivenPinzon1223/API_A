<?php

require_once "ConDB.php";

class StatuModel {

    public static function all(){
        $query = "SELECT * FROM status";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $status = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $status;
    }

    public static function find($id){
        $query = "SELECT * FROM status WHERE pame_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $statu = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $statu;
    }

    public static function create($data){
        $query = "INSERT INTO `status`(`pame_statu`) VALUES ('".$data['pame_statu']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("statu created successfully");
        return $message;
    }

    public static function update($id,$data){
        $query = "UPDATE `status` SET `pame_statu`='".$data['pame_statu']."' WHERE pame_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("statu updated successfully");
        return $message;
    }
}
?>