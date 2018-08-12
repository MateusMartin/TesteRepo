<?php
/**
 * Created by PhpStorm.
 * User: mateus castanho
 * Date: 11/08/2018
 * Time: 19:17
 */

class Clientes_db{

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




    public function Buscacliente($where = null){

        $query = "Select a.CodCliente,a.Nome,a.Idade,a.Telefone,a.Endereco,b.Nome as Categoria from tbl_clientes a inner join tbl_Categorias b on a.CodCategoria = b.CodCategoria ";

        if($where != null){

            $query .= " Where a.Nome like '%{$where}%'";

        }

        $sql = mysqli_query($this->msqlink,$query);






        while ($row = mysqli_fetch_assoc($sql)){

                $encode[] = ($row);



        }


        $dadosJ =  json_encode($encode);




        return $dadosJ;
    }

}
