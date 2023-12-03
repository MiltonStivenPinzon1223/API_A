<?php

class SolicitudController{
    private $_method; //get, post, put.
    private $_complement; //get Solicitud 1 o 2.
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
                        $solicitud = SolicitudModel::all(0);
                        $json = $solicitud;
                        echo json_encode($json);
                        return;
                    default:
                        $solicitud = SolicitudModel::find($this->_complement);
                        if ($solicitud==null)
                            $json = array("response: "=>"Payment method not found");
                        else
                            $json = $solicitud;
                        echo json_encode($json);
                        return;
                }
            case "POST":
                $createSolicitud = SolicitudModel::create($this->_data);
                $json = array(
                    "response: "=>$createSolicitud
                );
                echo json_encode($json,true);
                return;
            case "PUT":
                $createSolicitud = SolicitudModel::update($this->_complement,$this->_data);
                $json = array(
                    "response: "=>$createSolicitud
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