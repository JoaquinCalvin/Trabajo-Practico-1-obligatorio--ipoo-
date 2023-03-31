<?php
class Viaje{
    private $codigoViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros=[];

    public function __construct($codVia,$dest,$cantM,$arregloPasajeros)
    {
        $this->codigoViaje = $codVia;
        $this->destino = $dest;
        $this->cantMaxPasajeros = $cantM;
        $this->pasajeros = $arregloPasajeros;
    }
    public function getCodigoViaje(){
        return $this->codigoViaje;    
    }
    public function getDestino(){
        return $this->destino;    
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;    
    }
    public function getPasajeros(){
        return $this->pasajeros;
    }
    public function setCodigoViaje($codVia){
        $this->codigoViaje = $codVia;
    }
    public function setDestino($dest){
        $this->destino = $dest;
    }
    public function setCantMaxPasajeros($cantM){
        $this->cantMaxPasajeros = $cantM;
    }
    public function setPasajeros($arregloPasajeros){
        $this->pasajeros = $arregloPasajeros;
    }
    public function __toString()
    {
        $cant_pasajeros=count($this->pasajeros);
        $psj="";
        for($i=0;$i<$cant_pasajeros;$i++){
            $psj = $psj."Pasajero ". $i+1 .", DNI: " .$this->pasajeros[$i]['documento'].", Nombre: ".$this->pasajeros[$i]["nombre"].", Apellido: ".$this->pasajeros[$i]["apellido"];
        }
        return "(Codigo de viaje: ".$this->codigoViaje.",\n destino: ".$this->destino.",\n cant pasajeros: ".$this->cantMaxPasajeros.", \n Pasajeros: ".$psj.")";
    }
        
    }
?>