<!--Feito por Gabriel Leoni Duarte-->
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <title>Organize suas atividades</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="functions.js"></script>
        <script src="jquery-3.5.1.min"></script>
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

    </head>
    <body>
    <form name="form">
            Nome: <input type="text" id="nome" /> <br><br>
            <table border="1px solid black" name="tabela">
                <tr>
                    <?php
                    $anda_hora=0;
                    $dias=array(" ", "Segunda", "Terça", "Quarta", "Quinta", "Sexta");
                    $horarios=array(" ", "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00");
                        for($linhas=0; $linhas<5; $linhas++){
                            for($colunas=0; $colunas<25; $colunas++){
                                if($linhas==0 && $anda_hora<25){
                                    $tabela[$linhas][$colunas]=$horarios[$anda_hora];
                                    $anda_hora++;
                                }else if($colunas==0){
                                    $tabela[$linhas][$colunas]=$dias[$linhas];
                                }else if(($colunas>=1 && $colunas<=7) || $colunas>=22){
                                    $tabela[$linhas][$colunas]="Dormir "; //Preenche de 21 as 6 com "Dormir"
                                }else{    
                                    $tabela[$linhas][$colunas]="Nada ";
                                }
                            }
                        }
                        for($linhas=0; $linhas<5; $linhas++){
                            for($colunas=0; $colunas<25; $colunas++){
                                if($colunas==0){
                                    echo "<td>";
                                }
                                if($colunas==0 || $linhas==0){
                                    echo "<input type='text' readonly id=$linhas$colunas class=\"dias_semana\" value=".$tabela[$linhas][$colunas].">";
                                }else{
                                    echo "<input type='text' readonly id=$linhas$colunas class=\"normal\"  onclick='aparece(this.id)' value=".$tabela[$linhas][$colunas].">";
                                }
                                if($colunas==24){
                                    echo "</td>";
                                }
                            }
                            if($linhas<5){
                                echo"</tr>
                                 <tr>";
                            }
                        }
                        echo "</tr>";
                    ?>
            </table>
            <br>
            <button value="Registrar">Registrar</button>
            <br> <br>
            <input type="text" class="trocar_nome" id="nova_palavra" placeholder="Coloque a nova atividade aqui">
            <br>
            <input type="button" class="trocar_nome" value="Mudar atividade" onclick="mudar_nome(1)" id="enviar_nova_palavra">
            <br>
            <input type="button" class="trocar_nome" value="Nao mudar atividade" onclick="mudar_nome(0)" id="n_enviar_nova_palavra">
            
        </form>
    </body>
</html>