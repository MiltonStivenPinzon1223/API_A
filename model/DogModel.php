<?php

require_once "ConDB.php";

class DogModel {

    public static function all(){
        $query = "SELECT * FROM dogs";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $dogs = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $dogs;
    }

    public static function find($id){
        $query = "SELECT * FROM dogs WHERE pame_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $dog = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $dog;
    }

    public static function create($data){
        $query = "INSERT INTO `dogs`(`pame_dog`) VALUES ('".$data['pame_dog']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("dog created successfully");
        return $message;
    }

    public static function update($id,$data){
        $query = "UPDATE `dogs` SET `pame_dog`='".$data['pame_dog']."' WHERE pame_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("dog updated successfully");
        return $message;
    }
}
?>