<?php

require_once "models/mnt/categorias.model.php";

function run(){
    $viewData = array();
    $viewData["mode"] = "";
    $viewData["modedsc"] = "";
    
    $viewData["catecod"] = 0;
    $viewData["catenom"] = "";
    $viewData["cateest"] = "ACT";

    $viewData["cateest_ACT"] = "selected";
    $viewData["cateest_INA"] = "";

    $viewData["readonly"] = "";
    $viewData["disabled"] = "";
    $viewData["hidden"] = "";

    $modedsc = array(
        "INS"=>"Nueva Categoria",
        "UPD"=>"Actualizar Categoria %s",
        "DSP"=>"Mostrar Categoria %s"
    );
    if(isset($_GET["mode"])){
        $viewData["mode"] = $_GET["mode"];
        $viewData["catecod"] = intval($_GET["catecod"]);
        if(!isset($modedsc[$viewData["mode"]])){
            redirectWithMessage("No se puede realizar esta operacion.","index.php?page=categorias");
            die();
        }
    }

   if(isset($_POST["btnsubmit"])){
        mergeFullArrayTo($_POST,$viewData);
        //Verificacion del XSS_Token
        if(!(isset($_SESSION["cln_csstoken"]) && $_SESSION["cln_csstoken"] == $viewData["xsstoken"])){
            redirectWithMessage("No se puede realizar esta operacion.","index.php?page=categories");
            die();
        }
        //Validaciones de Entrada de Datos
        switch($viewData["mode"]){
            case "INS":
                $result = addNewCategory($viewData["catenom"],$viewData["cateest"]);
                if($result > 0 ){
                    redirectWithMessage("Guardado exitosamente","index.php?page=categorias");
                    die();
                }
            break;

            case "UPD":
                $result = updateCategory($viewData["catenom"],$viewData["cateest"],$viewData["catecod"]);
                if($result > 0 ){
                    redirectWithMessage("Actualizado exitosamente","index.php?page=categorias");
                    die();
                }
            break; 
        }
   }
      
    if($viewData["mode"] === "INS"){
        $viewData["modedsc"] = $modedsc[$viewData["mode"]];
    }else{
        $viewData["modedsc"] = sprintf($modedsc[$viewData["catenom"]],$viewData["catenom"]);
        $catDBData = getCategoryByCod($viewData["catecod"]);
        mergeFullArrayTo($catDBData,$viewData);
        $viewData["cateest_ACT"] = ($viewData["cateest"]=="ACT"?"selected":"");
        $viewData["cateest_INA"] = ($viewData["cateest"]=="INA"?"selected":"");

        if($viewData["mode"] != 'UPD'){
            $viewData["readonly"] = "readonly";
            $viewData["disabled"] = "disabled";
            $viewData["hidden"] = "hidden";
        }
    }
    $viewData["xsstoken"] = uniqid("cln",true);
    $_SESSION["cln_csstoken"] = $viewData["xsstoken"];
    renderizar("mnt/categoria",$viewData);
}

run();

?>