$(function () {



    $("#form").submit(function(e) {
		e.preventDefault()

        var serializedData = $(this).serialize();

        $.ajax({
            type: 'post',
            url:  'Clientes_cur.php',
            data: serializedData,
            success: function(data,retorno){

                console.log(retorno);


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

                $('#bodyid').html(json2html.transform(Dados,transform))


            $('.Table').html()
            }
        });

    });



})
