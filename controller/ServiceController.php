<?php

class ServiceController{
    private $_method; //get, post, put.
    private $_complement; //get Service 1 o 2.
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
                        $service = ServiceModel::all(0);
                        $json = $service;
                        echo json_encode($json);
                        return;
                    default:
                        $service = ServiceModel::find($this->_complement);
                        if ($service==null)
                            $json = array("response: "=>"Payment method not found");
                        else
                            $json = $service;
                        echo json_encode($json);
                        return;
                }
            case "POST":
                $createService = ServiceModel::create($this->_data);
                $json = array(
                    "response: "=>$createService
                );
                echo json_encode($json,true);
                return;
            case "PUT":
                $createService = ServiceModel::update($this->_complement,$this->_data);
                $json = array(
                    "response: "=>$createService
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