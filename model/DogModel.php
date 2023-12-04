<?php

require_once "ConDB.php";

class DogModel {

    public static function all(){
        $query = "SELECT dogs.*, breeds.bre_breed, users.use_name FROM `dogs` INNER JOIN breeds ON breeds.bre_id = dogs.bre_id INNER JOIN users ON users.use_id = dogs.use_id;";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $dogs = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $dogs;
    }

    public static function find($id){
        $query = "SELECT dogs.*, breeds.bre_breed, users.use_name FROM `dogs` INNER JOIN breeds ON breeds.bre_id = dogs.bre_id INNER JOIN users ON users.use_id = dogs.use_id WHERE dogs.dog_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $dog = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $dog;
    }

    public static function create($data){
        $query = "INSERT INTO `dogs`(`dog_name`, `dog_height`, `dog_comment`, `bre_id`, `use_id`) VALUES ('".$data['dog_name']."','".$data['dog_height']."','".$data['dog_comment']."','".$data['bre_id']."','".$data['use_id']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("dog created successfully");
        return $message;
    }

    public static function update($id,$data){
        $query = "UPDATE `dogs` SET `dog_name`='".$data['dog_name']."',`dog_height`='".$data['dog_height']."',`dog_comment`='".$data['dog_comment']."',`bre_id`='".$data['bre_id']."',`use_id`='".$data['use_id']."' WHERE dog_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("dog updated successfully");
        return $message;
    }
}
?>