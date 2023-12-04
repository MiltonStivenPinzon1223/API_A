<?php

require_once "ConDB.php";

class PaymentMethodModel {

    public static function all(){
        $query = "SELECT * FROM payment_method";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $methods = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $methods;
    }

    public static function find($id){
        $query = "SELECT * FROM payment_method WHERE pame_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $method = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $method;
    }
}
?>