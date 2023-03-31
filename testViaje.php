<?php
include 'Viaje.php';
$arregloViajes=[];
function cargarViaje(){
    echo "Ingrese codigo de viaje: "."\n";
    $codigoVia = trim(fgets(STDIN));
    echo "Ingrese destino del viaje: "."\n";
    $lugar = trim(fgets(STDIN));
    echo "Ingrese cantidad maxima de pasajeros: "."\n";
    $cantidadMaxPasajeros = trim(fgets(STDIN));
    
    for($i=0;$i<$cantidadMaxPasajeros;$i++){
        echo "Ingrese el pasajero ".($i+1).": ";
        echo "ingrese el nombre del pasajero: ";
        $nombre = trim(fgets(STDIN));
        echo "ingrese el apellido del pasajero: ";
        $apellido = trim(fgets(STDIN));
        echo "ingrese el documento del pasajero: ";
        $dni = trim(fgets(STDIN));
        $pasajeros[$i] = ['nombre'=>$nombre,'apellido'=>$apellido,'documento'=>$dni];
    }
    $viaje = new Viaje($codigoVia,$lugar,$cantidadMaxPasajeros,$pasajeros);
    return $viaje;

}
function modificarViaje($objeto){
    echo "Ingrese destino del viaje: "."\n";
    $lugar = trim(fgets(STDIN));
    echo "Ingrese cantidad maxima de pasajeros: "."\n";
    $cantidadMaxPasajeros = trim(fgets(STDIN));
    
    for($i=0;$i<$cantidadMaxPasajeros;$i++){
        echo "Ingrese el pasajero ".($i+1).": ";
        echo "ingrese el nombre del pasajero";
        $nombre = trim(fgets(STDIN));
        echo "ingrese el apellido del pasajero";
        $apellido = trim(fgets(STDIN));
        echo "ingrese el documento del pasajero";
        $dni = trim(fgets(STDIN));
        $pasajeros[$i] = ['nombre'=>$nombre,'apellido'=>$apellido,'documento'=>$dni];
    }
    $objeto->setDestino($lugar);
    $objeto->setCantMaxPasajeros($cantidadMaxPasajeros);
    $objeto->setPasajeros($pasajeros);
    return $objeto;
}

do{
    echo "1: Cargar informacion de un nuevo viaje!\n";
    echo "2: Modificar informacion del viaje!\n";
    echo "3: Mostrar datos del viaje!\n";
    echo "4: Salir!\n";
    $opc = trim(fgets(STDIN));
    if($opc<1 || $opc>4){
        $bandera = false;
        while($bandera==false){
            echo "Ingrese un opcion valida: ";
            $opc = trim(fgets(STDIN));
            if($opc<1 || $opc>4){
                $bandera = false;
            }else{
                $bandera = true;
            }
        }  
    }
    $salir=false;
    switch($opc){
        case 1: 
            $i=0;
            do{
                $arregloViajes[$i]=cargarViaje();
                echo "Desea cargar otro viaje?(si/no)";
                $cargar = trim(fgets(STDIN));
                $i++;
            }while($cargar=='si');
        break;
        case 2:
            $cant_viajes=count($arregloViajes);
                if($cant_viajes>0){
                    echo "No hay viajes para modificar";
                }else{
                    echo "ingrese el codigo del viaje a modificar: ";
                    $codMod= trim(fgets(STDIN));
                    $cantViajes = count($arregloViajes);
                    for($j=0;$j<$cantViajes;$j++){
                    if($arregloViajes[$j]->getCodigoViaje()==$codMod){
                    $arregloViajes[$j]=modificarViaje($arregloViajes[$j]);
                    echo "El objeto modificado quedo: ".$arregloViajes[$j];
                    $j=$cantViajes;
                }
            }
                }
             
        break;
        case 3: $cant_viajes=count($arregloViajes);
                if($cant_viajes>0){
                    print_r($arregloViajes);
                }else{
                    echo "Aun no hay viajes ingresados \n";
                }
            
        break;
        case 4: $salir=true;
        break;

    }
}while($salir==false);
