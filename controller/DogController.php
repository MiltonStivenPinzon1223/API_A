<?php

class DogController{
    private $_method; //get, post, put.
    private $_complement; //get Dog 1 o 2.
    private $_data; // datos a insertar o actualizar

    function __construct($method,$complement,$data){
        $this->_method = $method;
        $this->_complement = $complement;
        $this->_data = $data !=0 ? $data : "";
    }

    public function index(){
        switch($this->_method){
            case "GET":
                switch($this->_complement){
                    case 0:
                        $dog = DogModel::all(0);
                        $json = $dog;
                        echo json_encode($json);
                        return;
                    default:
                        $dog = DogModel::find($this->_complement);
                        if ($dog==null)
                            $json = array("response: "=>"Dog not found");
                        else
                            $json = $dog;
                        echo json_encode($json);
                        return;
                }
            case "POST":
                $createDog = DogModel::create($this->_data);
                $json = array(
                    "response: "=>$createDog
                );
                echo json_encode($json,true);
                return;
            case "PUT":
                $createDog = DogModel::update($this->_complement,$this->_data);
                $json = array(
                    "response: "=>$createDog
                );
                echo json_encode($json,true);
                return;
            default:
                $json = array(
                    "ruta: "=>"not found"
                );
                echo json_encode($json,true);
                return;
        }
    }
}
?>