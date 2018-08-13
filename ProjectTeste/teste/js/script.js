$(function () {



    $("#form").submit(function(e) {
		e.preventDefault()

        var serializedData = $(this).serialize();
        //Função ajax para mandar valor do campo de cliente
        $.ajax({
            type: 'post',
            url:  '/ProjectTeste/teste/class/Clientes_cur.php',
            data: serializedData,
            success: function(data,retorno){

                console.log(data);

                //Função usada na aplicação para gerar a tabela por java script
                var transform = {"tag":"table", "children":[
                    {"tag":"tbody","children":[
                        {"tag":"tr","children":[
                            {"tag":"td","html":"${CodCliente}"},
                            {"tag":"td","html":"${Nome}"},
                            {"tag":"td","html":"${Idade}"},
                            {"tag":"td","html":"${Telefone}"},
                            {"tag":"td","html":"${Endereco}"},
                            {"tag":"td","html":"${Categoria}"}
                        ]}
                    ]}
                ]};

                var Dados = data;

                //Ultilizada o json2 para montar a tabela
                $('#bodyid').html(json2html.transform(Dados,transform))


            $('.Table').html()
            }
        });

    });



})
