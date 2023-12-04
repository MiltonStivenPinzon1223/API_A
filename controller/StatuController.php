<?php

class StatuController{
    private $_method; //get, post, put.
    private $_complement; //get Statu 1 o 2.
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
                        $statu = StatuModel::all(0);
                        $json = $statu;
                        echo json_encode($json);
                        return;
                    default:
                        $statu = StatuModel::find($this->_complement);
                        if ($statu==null)
                            $json = array("response: "=>"Payment method not found");
                        else
                            $json = $statu;
                        echo json_encode($json);
                        return;
                }
                break;
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