<?php
/**
 * Created by PhpStorm.
 * User: mateus castanho
 * Date: 11/08/2018
 * Time: 23:35
 */



//verifica se veio algum paremetro pra busca
if($_POST){

    //faz requisição da class Clientes
    require_once 'Clientes_db.php';

    //instancia a classe de Clientes
    $class = new Clientes_db();


    //chama o metodo buscaClientes da Classe Clientes e armazena o resultado em uma variavel
    $var = $class->buscaCliente($_POST['Cliente']);


    //prinsta o resultado na tela para ser usado na função ajax
    print_r($var);



}