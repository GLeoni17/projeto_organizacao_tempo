<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
    <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' />   
    <script src='jquery-3.5.1.min.js'></script>

    <?php
        $principal = $_POST["corp_tabela"];
        $secundaria = $_POST["cors_tabela"];
        $fonte = $_POST["corf_tabela"];
        $quando_comeca_mes = $_POST["quando_comeca_mes"];
        $dias_mes = $_POST["dia_acaba_mes"];
        $conta_dias = 1;


        echo "
        <style>

            th{
                background-color:$principal
            }

            td{
                background-color:$secundaria
            }

            body{
                color:$fonte
            }

        </style>
        ";
    ?>

</head>
<body>
    <table>

        <?php
            echo "
            <tr>
                <th>Domingo|</th>
                <th>Segunda|</th>
                <th>Terça|</th>
                <th>Quarta|</th>
                <th>Quinta|</th>
                <th>Sexta|</th>
                <th>Sabado</th>
            </tr>     
            ";

            for($linha = 0; $linha<=6; $linha++){ // Linha

                echo "<tr>";

                for($coluna = 1; $coluna<=7; $coluna++){ // Coluna

                    echo "<td>";

                    if($linha>0){

                         if($conta_dias<=$dias_mes){
                            echo "|$conta_dias|";
                            $conta_dias++;
                        }
                        
                    }else if($coluna >= $quando_comeca_mes){

                        echo "|$conta_dias|";
                        $conta_dias++;

                    }

                    echo "</td>";

                }

                echo "</tr>";
            }
            
        ?>

    </table>
    
</body>
</html>