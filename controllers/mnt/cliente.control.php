<?php

require_once "models/mnt/clientes.model.php";

function run(){
    $viewData = array();
    $viewData["mode"] = "";
    $viewData["modedsc"] = "";
    $viewData["clientid"] = 0;
    $viewData["clientname"] = "";
    $viewData["clientgender"] = "FEM";
    $viewData["clientphone1"] = "";
    $viewData["clientphone2"] = "";
    $viewData["clientemail"] = "";
    $viewData["clientidnumber"] = "";
    $viewData["clientbio"] = "";
    $viewData["clientstatus"] = "ACT";
    $viewData["clientgender_FEM"] = "selected";
    $viewData["clientgender_MSC"] = "";
    $viewData["clientstatus_ACT"] = "selected";
    $viewData["clientstatus_INA"] = "";
    $viewData["readonly"] = "";
    $viewData["deletemsg"] = "";
    
    $modedsc = array(
        "INS"=>"Nuevo Cliente",
        "UPD"=>"Actualizar Cliente %s",
        "DEL"=>"Eliminar Cliente %s",
        "DSP"=>"Detalle de cliente %s"
    );
    if(isset($_GET["mode"])){
        $viewData["mode"] = $_GET["mode"];
        $viewData["clientid"] = intval($_GET["clientid"]);
        if(!isset($modedsc[$viewData["mode"]])){
            redirectWithMessage("No se pede realizar esta operacion.","index.php?page=clientes");
            die();
        }
    }

    if(isset($_POST["btnsubmit"])){
        mergeFullArrayTo($_POST,$viewData);
        //verificacion de xss_token
        if(!(isset($_SESSION["cln_xsstoken"]) && $_SESSION["cln_xsstoken"] == $viewData["xsstoken"])){
            redirectWithMessage("No se puede realizar esta opercaion","index.php?page=clientes");
            die();
        }
        //validacion de entrada de datos
        switch($viewData["mode"]){
            case "INS":
                $result =  addNewClient(
                    $viewData["clientname"],
                    $viewData["clientgender"],
                    $viewData["clientphone1"],
                    $viewData["clientphone2"],
                    $viewData["clientemail"],
                    $viewData["clientidnumber"],
                    $viewData["clientbio"],
                    $viewData["clientstatus"]
                );
                if($result > 0){
                    redirectWithMessage("Guardado Exitosamente","index.php?page=clientes");
                    die();
                }
                break;
            case "UPD": 
                $result =  updateClient(
                    $viewData["clientname"],
                    $viewData["clientgender"],
                    $viewData["clientphone1"],
                    $viewData["clientphone2"],
                    $viewData["clientemail"],
                    $viewData["clientidnumber"],
                    $viewData["clientbio"],
                    $viewData["clientstatus"],
                    $viewData["clientid"]
                );
                if($result >= 0){
                    redirectWithMessage("Actualizado Exitosamente","index.php?page=clientes");
                    die();
                }
                break;  
            case "DEL":
                $result = deleteCliente($viewData["clientid"]);
                if($result >= 0){
                    redirectWithMessage("Eliminado Exitosamente","index.php?page=clientes");
                    die();
                }
                break;     
        }
    }

    if($viewData["mode"] === "INS"){
        $viewData["modedsc"] = $modedsc[$viewData["mode"]];
    }else{
        //-------------------------------------------------Update
        $clientDBData = getClientById($viewData["clientid"]);
        mergeFullArrayTo($clientDBData,$viewData);
        $viewData["modedsc"] = sprintf($modedsc[$viewData["mode"]],$viewData["clientname"]);
        $viewData["clientgender_FEM"] = ($viewData["clientgender"] == "FEM")?"selected":"";
        $viewData["clientgender_MSC"] = ($viewData["clientgender"] == "MSC")?"selected":"";
        $viewData["clientstatus_ACT"] = ($viewData["clientstatus"] == "ACT")?"selected":"";
        $viewData["clientstatus_INA"] = ($viewData["clientstatus"] == "INA")?"selected":"";
        //-------------------------------------------------End of Update

        //-------------------------------------------------Delete
        if($viewData["mode"] != 'UPD'){
            $viewData["readonly"] = "readonly";
        }
        if($viewData["mode"] == 'DEL'){
            $viewData["deletemsg"] = "Esta seguro de eliminar este resgistro, es una operacion definitiva.";
        }
    }
    //Crear un token unico
    //Guardar en sesion ese token para su verificacion posterior
    $viewData["xsstoken"] = uniqid("cln", true);
    $_SESSION["cln_xsstoken"] = $viewData["xsstoken"];
    renderizar("mnt/cliente",$viewData);
}

run();

?>