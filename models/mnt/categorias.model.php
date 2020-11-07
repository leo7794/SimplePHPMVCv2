<?php
require_once "libs/dao.php";

function getAllCategories(){
    $sqlstr = "SELECT * FROM categories;";
    $resultSet = array();
    $resultSet = obtenerRegistros($sqlstr);
    return $resultSet;
}

function addNewCategory($catenom, $cateest){
    $insSql = "INSERT INTO categories (catecod, catenom, cateest) VALUES (NULL, '%s', '%s');";
    return ejecutarNonQuery(sprintf($insSql,$catenom, $cateest ));

}

function getCategoryByCod($catecod){
    $sqlstr = "SELECT * FROM categories WHERE catecod = %d;";
    return obtenerUnRegistro(sprintf($sqlstr,$catecod));
}

function updateCategory($catenom,$cateest,$catecod){
    $updSql = "UPDATE categories SET catenom='%s', cateest='%s'	WHERE catecod=%d;";
    return ejecutarNonQuery(sprintf($updSql,$catenom,$cateest,$catecod));
}

function getCategoriesByFilter($filtro){
    $ffiltro = $filtro.'%';
    $sqlstr = "SELECT * FROM categories WHERE catecod LIKE %d or catenom LIKE '%s';";
    return obtenerRegistros(sprintf($sqlstr,$ffiltro,$ffiltro));
}
    
?>