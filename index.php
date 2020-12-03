<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montando a Tabela</title>
    <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' />   
    <script src="jquery-3.5.1.min.js"></script>

    <script>

        $(function(){
            $("#montar").click(function(){
                var data = new Date();
                var mes = data.getMonth();
                var ano = data.getFullYear();

                var dias_meses = new Array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");

                var dia_semana = 1 + parseInt(mes) + parseInt(ano);

                dia_semana = (dia_semana - (7 * Math.floor(dia_semana/7)) );      
                
                $("#quando_comeca_mes").val(dia_semana+1);

                if(mes == 1 && ano % 4 == 0){ // Fev + Ano Bisexto
                    $("#dia_acaba_mes").val("29");
                }else{
                    $("#dia_acaba_mes").val(dias_meses[mes]);
                }

                $("form[name='form']").submit();
                
            });
        });

    </script>

</head>
<body>

<!--
    nome = Nome da pessoa
    corp_tabela = Cor Primaria da tabela
    cors_tabela = Cor Secundaria da Tabela
    corf_tabela = Cor da Fonte da tabela
-->

    <form name="form" action="montar_tabela.php" method="post">

        <label for="nome">Tabela para:</label>
        <input type="text" name="nome" id="nome">

        <br><br>

        <label for="corp_tabela">Cor primária da tabela:</label>
        <input type="color" name="corp_tabela" id="corp_tabela">

        <br><br>

        <label for="cors_tabela">Cor secundária da tabela:</label>
        <input type="color" name="cors_tabela" id="cors_tabela">
        
        <br><br>

        <label for="corf_tabela">Cor da fonte da tabela:</label>
        <input type="color" name="corf_tabela" id="corf_tabela">
        
        <br><br>    

        <input type="hidden" name="quando_comeca_mes" id="quando_comeca_mes">
        <input type="hidden" name="dia_acaba_mes" id="dia_acaba_mes">

    </form>

    <button id="montar">Montar</button>

</body>
</html>