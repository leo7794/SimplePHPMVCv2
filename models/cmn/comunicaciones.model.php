<?php
require_once "libs/dao.php";

function getComByClient($clientid){
    $sqlstr = "SELECT cmnid, cmnfching, cmnusring, cmntipo  FROM comunicaciones WHERE clientid = %d;";
    return obtenerRegistros(sprintf($sqlstr,$clientid));
}
function getClientById($clientid){
    $sqlstr = "SELECT clientname FROM clients WHERE clientid = %d;";
    return obtenerUnRegistro(sprintf($sqlstr,$clientid));
}
function getUsuarios(){
    $sqlstr = "SELECT * FROM usuario;";
    $resultSet = array();
    $resultSet = obtenerRegistros($sqlstr);
    return $resultSet;
}
function addNewCom($clientid, $cmnnotas, $cmntags, $cmnusring, $cmntipo){
    $sqlstr = "INSERT INTO comunicaciones
	(clientid, cmnnotas, cmntags, cmnfching, cmnusring, cmntipo)
    VALUES (%d, '%s', '%s', NOW(), %d, '%s')";
    return ejecutarNonQuery(sprintf($sqlstr, $clientid, $cmnnotas, $cmntags, $cmnusring, $cmntipo));
}
function getComByCod($codigo){
    $sqlstr = "SELECT * FROM comunicaciones WHERE cmnid = %d";
    return obtenerUnRegistro(sprintf($sqlstr,$codigo));
}
?>