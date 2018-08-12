<?php
/**
 * Created by PhpStorm.
 * User: mateus castanho
 * Date: 11/08/2018
 * Time: 23:35
 */




if($_POST){


    require_once 'Clientes_db.php';

    $class = new Clientes_db();


    $var = $class->Buscacliente($_POST['Cliente']);


    print_r($var);



}