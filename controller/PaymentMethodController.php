<?php

class PaymentMethodController{
    private $_method; //get, post, put.
    private $_complement; //get PaymentMethod 1 o 2.
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
                        $PaymentMethod = PaymentMethodModel::all(0);
                        $json = $PaymentMethod;
                        echo json_encode($json);
                        return;
                    default:
                        $PaymentMethod = PaymentMethodModel::find($this->_complement);
                        if ($PaymentMethod==null)
                            $json = array("response: "=>"Payment method not found");
                        else
                            $json = $PaymentMethod;
                        echo json_encode($json);
                        return;
                }
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