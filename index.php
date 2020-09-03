<!--Feito por Gabriel Leoni Duarte-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Organize suas atividades</title>
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $.getJSON('http://ip-api.com/json?callback=?', function(data) {
                    console.log(JSON.stringify(data, null, 2));
                });
            });
            aparecer=0;
            id_m=0;
            muda=0
            function aparece(id, h){
                id_m=id; //1 muda 2 nao
                if(aparecer==0){
                    if(h==2){
                        document.getElementById('trocar_hora').style.display='block';
                    }else{
                        document.getElementById('nova_palavra').style.display='block';
                    }
                    document.getElementById('enviar_nova_palavra').style.display='block';
                    document.getElementById('n_enviar_nova_palavra').style.display='block';
                    aparecer++;
                }
                
            }

            function desaparece(a){
                if(a==1){
                    aparecer--;
                }
                document.getElementById('nova_palavra').style.display='none';
                document.getElementById('trocar_hora').style.display='none';
                document.getElementById('enviar_nova_palavra').style.display='none';
                document.getElementById('n_enviar_nova_palavra').style.display='none';
            }

            function mudar_nome(s_n){
                if(s_n==1){
                    if(id_m.charAt(id_m.length-1)==0){
                        document.getElementById(id_m).innerHTML=document.getElementById('trocar_hora').value;
                    }else{
                        document.getElementById(id_m).innerHTML=document.getElementById('nova_palavra').value;
                    }
                }
                document.getElementById('nova_palavra').value='';
                document.getElementById('trocar_hora').value='';
                desaparece(1);

            }
            function termina(id){
                document.getElementById(id).style.display='none';
                s_borda=document.getElementsByClassName("tira_borda");
                s_borda[0].style.borderBottom="none";
                document.getElementById('limpar').style.display='none';
                desaparece(0);
                window.print();
                document.getElementById(id).style.display='block';
                document.getElementById(id).style.marginLeft="923px"
                s_borda[0].style.borderBottom="1px solid black";
                document.getElementById('limpar').style.display='block';
            }
        </script>
        <script src="jquery-3.5.1.min"></script>

    </head>
    <body>
    <form>
            <h3>Tabela para <input type="text" id="nome" class="tira_borda"/></h3>
    </form>
            <table name="tabela" class="table-striped tabela">
                <tr>
                    <?php
                    $dias=array("Segunda", "Terça", "Quarta", "Quinta", "Sexta");
                    $horarios=array(" ", "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00");
                    for($i=0; $i<25; $i++){
                        for($j=0; $j<6; $j++){
                            if($j==0){
                                $tabela[$i][$j]=$horarios[$i];
                                continue;
                            }
                            if($i==0 && $j>0){
                                $tabela[$i][$j]=$dias[$j-1];
                            }else if(($i>0 && $i<8) || $i>21){
                                $tabela[$i][$j]="Dormir";
                            }else{
                                $tabela[$i][$j]="Nada";
                            }
                        }
                    }

                    for($j=0; $j<6; $j++){
                        echo "<tr>
                            <th class=\"outra_cor\" > <span id=\"p".$j."\" >".$tabela[0][$j]." </span> </th>";
                        for($i=1; $i<25; $i++){
                            if($j==0){
                                echo"<td class=\"outra_cor\"><span id=$i$j onclick=' aparece(this.id, 2)'>".$tabela[$i][$j]."</span></th>";
                                continue;
                            }
                            echo"<td><span id=$i$j onclick='aparece(this.id, 1)'>".$tabela[$i][$j]."</span></td>";
                        }
                        echo "</tr>";  
                    }
                            
                    ?>
            </table>
            <br>
            <button class="btn btn-primary active" id="registrar" onclick="termina(this.id)" >Salvar</button>
            <br> <br> 
            <button class="btn btn-primary active" id="limpar" onclick="location.reload()" >Limpar</button>
            <br><br><br>
            <form>
            <input type="text" class="trocar_nome" id="nova_palavra" placeholder="Coloque a nova atividade aqui" required>
            <input type="time" class="trocar_nome" id="trocar_hora" required>
            <br>
            <input type="button" class="trocar_nome" value="Mudar" onclick="mudar_nome(1)" id="enviar_nova_palavra">
            <br>
            <input type="button" class="trocar_nome" value="Nao mudar" onclick="mudar_nome(0)" id="n_enviar_nova_palavra"> 
            </form>   
        </form>
    </body>
</html>

<!--if($i==0){
                                    for($j=1; $j<6; $j++){
                                        echo"<td class=\"outra_cor\"><span id=$j$i  onclick='aparece(this.id)'>".$tabela[$j][$i]."</span></td>";
                                    }
                                    continue;
                                }-->