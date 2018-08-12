<?php
/**
 * Created by PhpStorm.
 * User: mateus castanho
 * Date: 11/08/2018
 * Time: 19:17
 */

class Clientes_db{


    //metodo Construtor faz conexão com o banco de dados
    function __construct() {
        $host = "localhost";
        $user = "root";
        $senha = "";
        $bd = "dev_teste";

       $this->msqlink = $Msqli = new  mysqli($host,$user,$senha,$bd);

        if($Msqli->connect_errno){
            echo "Falha na connexao:  (".$Msqli->connect_errno.")".$Msqli->connect_error;
        }




    }



    //Funcão realiza a busca de clientes de acordo com o paremetro passado
    public function buscaCliente($where = null){


        //seleciona da tabela os registros
        $query = "Select a.CodCliente,a.Nome,a.Idade,a.Telefone,a.Endereco,b.Nome as Categoria from tbl_clientes a inner join tbl_Categorias b on a.CodCategoria = b.CodCategoria where 1=1 ";

        //caso exista paremetro filtra por cliente
        //se não busca todos
        if($where != null){

            //monta parametro like para buscar os dados da tabela
            $query .= " and a.Nome like '%{$where}%'";

        }
        $sql = mysqli_query($this->msqlink,$query);

        //Armazna o resultado de cada linha do resultado em uma variavel
        while ($row = mysqli_fetch_assoc($sql)){

                $encode[] = ($row);



        }


        //transforma os dados em dados json
        $dadosJ =  json_encode($encode);




        return $dadosJ;
    }

}
