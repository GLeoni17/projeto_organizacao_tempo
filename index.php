<!--Feito por Gabriel Leoni Duarte-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Organize suas atividades</title>
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script>
            function troca_cor_principal(id){
                document.getElementById(id).style.backgroundColor="blue";
            }

            aparecer=0;
            id_m=0;
            muda=0
            function aparece(id){
                id_m=id; //1 muda 2 nao
                if(aparecer==0){
                    if(id.charAt(0)==0){
                        document.getElementById('trocar_hora').style.display='block';
                    }else{
                        document.getElementById('nova_palavra').style.display='block';
                    }
                    document.getElementById('enviar_nova_palavra').style.display='block';
                    document.getElementById('n_enviar_nova_palavra').style.display='block';
                    aparecer++;
                }
                
            }

            function desaparece(){
                aparecer--;
                document.getElementById('nova_palavra').style.display='none';
                document.getElementById('trocar_hora').style.display='none';
                document.getElementById('enviar_nova_palavra').style.display='none';
                document.getElementById('n_enviar_nova_palavra').style.display='none';
            }

            function mudar_nome(s_n){
                if(s_n==1){
                    if(id_m.charAt(0)==0){
                        document.getElementById(id_m).innerHTML=document.getElementById('trocar_hora').value;
                    }else{
                        document.getElementById(id_m).innerHTML=document.getElementById('nova_palavra').value;
                    }
                }
                document.getElementById('nova_palavra').value=' ';
                document.getElementById('trocar_hora').value=' ';
                desaparece();

            }
            function termina(id){
                document.getElementById(id).style.display='none';
                desaparece();
                window.print();
                window.refresh();
            }
        </script>
        <script src="jquery-3.5.1.min"></script>

    </head>
    <body onload="inicia()">
    <form name="form">
            <h3>Tabela para: <input type="text" id="nome" class="tira_borda"/> </h3>
            <table name="tabela" class="table table-striped">
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

                        for($i=0; $i<6; $i++){
                            echo "<tr>
                                <th class=\"outra_cor\" > <span id=\"p".$i.$j."\" >".$tabela[$i][0]." </span> </th>";
                                if($i==0){
                                    for($j=1; $j<25; $j++){
                                        echo"<td class=\"outra_cor\"><span id=$i$j  onclick='aparece(this.id)'>".$tabela[$i][$j]."</span></td>";
                                    }
                                    continue;
                                }
                                for($j=1; $j<25; $j++){
                                    echo"<td><span id=$i$j onclick='aparece(this.id)'>".$tabela[$i][$j]."</span></td>";
                                }
                            echo "</tr>";  
                        }
                        
                    ?>
            </table>
            <br>
            <button class="btn btn-primary active" id="registrar" onclick="termina(this.id)" value="Registrar" >Salvar</button>
            <br> <br> <br>
            <input type="text" class="trocar_nome" id="nova_palavra" placeholder="Coloque a nova atividade aqui">
            <input type="time" class="trocar_nome" id="trocar_hora" >
            <br>
            <input type="button" class="trocar_nome" value="Mudar" onclick="mudar_nome(1)" id="enviar_nova_palavra">
            <br>
            <input type="button" class="trocar_nome" value="Nao mudar" onclick="mudar_nome(0)" id="n_enviar_nova_palavra">    
        </form>
    </body>
</html>