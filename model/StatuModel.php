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
}
?>