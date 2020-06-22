<!--Feito por Gabriel Leoni Duarte-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Organize suas atividades</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script>
            aparecer=0;
            id_m=0;
            muda=0
            function aparece(id){
                id_m=id; //1 muda 2 nao
                if(aparecer==0){
                    document.getElementById('nova_palavra').style.display='block';
                    document.getElementById('enviar_nova_palavra').style.display='block';
                    document.getElementById('n_enviar_nova_palavra').style.display='block';
                    aparecer++;
                }
                
            }

            function desaparece(){
                aparecer--;
                document.getElementById('nova_palavra').style.display='none';
                document.getElementById('enviar_nova_palavra').style.display='none';
                document.getElementById('n_enviar_nova_palavra').style.display='none';
            }

            function mudar_nome(s_n){
                if(s_n==1){
                    document.getElementById(id_m).innerHTML=document.getElementById('nova_palavra').value;
                    document.getElementById('nova_palavra').value=' ';
                }
                desaparece();

            }
        </script>
        <script src="jquery-3.5.1.min"></script>
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

    </head>
    <body>
    <form name="form">
            Nome: <input type="text" id="nome" /> <br><br>
            <table border="1px solid black" name="tabela" class="table table-striped">
                <tr>
                    <?php
                    $dias=array("Segunda", "Terça", "Quarta", "Quinta", "Sexta");
                    $horarios=array(" ", "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00");
                        for($i=0; $i<6; $i++){
                            for($j=0; $j<25; $j++){
                                if($i==0){
                                    $tabela[$i][$j]=$horarios[$j];
                                    continue;
                                }
                                if($j==0 && $i>0){
                                    $tabela[$i][$j]=$dias[$i-1];
                                }else if(($j>0 && $j<8) || $j>21){
                                    $tabela[$i][$j]="Dormir";
                                }else{
                                    $tabela[$i][$j]="Nada";
                                }
                            }
                        }

                        for($i=0; $i<25; $i++){
                            echo "<tr>
                                <th scope=\"row\"> <span  >".$tabela[0][$i]." </span> </th>";
                                for($j=1; $j<6; $j++){
                                    echo"<td><span id=$j$i onclick='aparece(this.id)'>".$tabela[$j][$i]."</span></td>";
                                }
                                echo "</tr>";
                            
                        }
                    ?>
            </table>
            <br>
            <input type="submit" value="Registrar" >
            <br> <br>
            <input type="text" class="trocar_nome" id="nova_palavra" placeholder="Coloque a nova atividade aqui">
            <br>
            <input type="button" class="trocar_nome" value="Mudar atividade" onclick="mudar_nome(1)" id="enviar_nova_palavra">
            <br>
            <input type="button" class="trocar_nome" value="Nao mudar atividade" onclick="mudar_nome(0)" id="n_enviar_nova_palavra">    
        </form>
    </body>
</html>