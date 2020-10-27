<?php 
    function run(){
        $viewData = array(
            "cuenta"=>"0801199702110",
            "nombre"=>"Dereck Zavala",
            "correo"=>"zavaladereck70@gmail.com"
        );
        $titulos = array(
            array("No"=>"1","descripcion"=>"Pre-School"),
            array("No"=>"2","descripcion"=>"Elementary School"),
            array("No"=>"3","descripcion"=>"Middle School"),
            array("No"=>"4","descripcion"=>"High School"),
            array("No"=>"5","descripcion"=>"Ingenieria en Ciencias de Computacion"),
            array("No"=>"6","descripcion"=>"Curso de calidad total"),
            array("No"=>"7","descripcion"=>"Cisco CCNA 1")
        );
        $viewData["titulos"] = $titulos;
        renderizar("about",$viewData);
    }
    run();
?>