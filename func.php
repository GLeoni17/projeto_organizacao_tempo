<?php
        $dias=array("Segunda", "Terça", "Quarta", "Quinta", "Sexta");
        $horarios=array("#", "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00");
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
                <th class=\"th\" > <span id=\"p".$j."\" >".$tabela[0][$j]." </span> </th>";
            for($i=1; $i<25; $i++){
                if($j==0){
                    echo"<th class=\"th\"><span id=$i$j onclick=' aparece(this.id, 2)'>".$tabela[$i][$j]."</span></th>";
                    continue;
                }
                echo"<td><span id=$i$j class=\"td\" onclick='aparece(this.id, 1)'>".$tabela[$i][$j]."</span></td>";
            }
            echo "</tr>";  
        }        
    
?>