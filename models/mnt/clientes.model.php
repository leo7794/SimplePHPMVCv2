<?php

require_once "libs/dao.php";

function getAllClients(){
    $sqlstr = "SELECT * FROM clients";
    $resultSet = array();
    $resultSet = obtenerRegistros($sqlstr);
    return $resultSet;
}

function getClientById($clientid){
    $sqlstr = "SELECT * FROM clients WHERE clientid = %d;";
    return obtenerUnRegistro(sprintf($sqlstr,$clientid));
}

function addNewClient($clientname,$clientgender,$clientphone1,$clientphone2,$clientemail,$clientidnumber,$clientbio,$clientstatus){
    $insSql = "INSERT INTO clients
	(clientname, clientgender, clientphone1, clientphone2, clientemail, clientidnumber, clientbio, clientstatus, clientdatecrt, clientusercrt)
    VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', NOW(), 0);";
    
    return ejecutarNonQuery(
        sprintf(
            $insSql,$clientname,$clientgender,$clientphone1,$clientphone2,$clientemail,$clientidnumber,$clientbio,$clientstatus
        )
    );
} 

function getClientesPorFiltro($filtro){
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * FROM clients WHERE clientidnumber like '%s' or clientname like '%s';";
    return obtenerRegistros(sprintf($sqlstr, $ffiltro, $ffiltro));
}

function updateClient($clientname,$clientgender,$clientphone1,$clientphone2,$clientemail,$clientidnumber,$clientbio,$clientstatus,$clientid){
    $updSql = "UPDATE clients SET clientname='%s', clientgender='%s', clientphone1='%s', clientphone2='%s', "; 
    $updSql = $updSql .= "clientemail='%s', clientidnumber='%s', clientbio='%s', clientstatus='%s' WHERE clientid = %d;";
    return ejecutarNonQuery(
        sprintf(
            $updSql,$clientname,$clientgender,$clientphone1,$clientphone2,$clientemail,$clientidnumber,$clientbio,$clientstatus,$clientid
        )
    );
}

function deleteCliente($clientid){
    return ejecutarNonQuery(sprintf("DELETE FROM clients WHERE clientid = %d;", $clientid));
}
?>