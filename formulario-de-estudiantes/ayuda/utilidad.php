<?php
$estatus =[1=>"Seleccione",2=>"Activo",3=>"Inactivo"];

$carrera =[1=>"Seleccione",2=>"Redes",3=>"Software",4=>"Multimedia",5=>"Mecatronica",
6=>"Seguridad informática"];




function getLastElement($list){
    $scountList = count($list);
    $lastElement = $list[$scountList - 1];

    return $lastElement;
}

function getEstatusName($EstatusId){
    return $GLOBALS['estatus'] [$EstatusId];
}

function getCarreraName($CarreraId){
    return $GLOBALS['carrera'] [$CarreraId];
}

function searchProperty($list,$property,$value){

    $filter =[];
    foreach($list as $item){
        if($item[$property] == $value){
            array_push($filter,$item);
        }
    }

    return $filter;
}


function getIndexElement($list,$property,$value){

    $index = 0;

    foreach($list as $key => $item){
        if($item[$property] == $value){
        $index = $key;
        }
    }

    return $index;
}

?>