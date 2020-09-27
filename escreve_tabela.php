<?php
    $dias=array("Segunda", "Terça", "Quarta", "Quinta", "Sexta");
    $horas=array("00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00");
    $horarios=array("#");
    //Dormir de tarde e acordar a noite - dormir<acordar
    //Dormir a noite e acordar de manha/tarde - acordar<dormir
    //23 = h2 01 = h1
    if($_POST["h2"]<$_POST["h1"]){ // dormir<acordar
        for($i=0; $i<24; $i++){
            if($horas[$i]<$_POST["h2"] || $horas[$i]>$_POST["h1"]){
                array_push($horarios, $horas[$i]);
            }else{
                array_push($horarios, $_POST["h2"]." até ".$_POST["h1"]);
                $guardar_pos=$i;
                $i=$_POST["h1"][0].$_POST["h1"][1];
            }
        }
    }else{ // acordar < dormir ERRO AQUI
        for($i=0; $i<24; $i++){
            if($horas[$i]<$_POST["h1"] || $horas[$i]>$_POST["h2"]){
                array_push($horarios, $horas[$i]);
            }else{
                array_push($horarios, $_POST["h2"]." até ".$_POST["h1"]);
                $guardar_pos=$i;
                $i=$_POST["h2"][0].$_POST["h2"][1];
            }
        }
    }

    for($i=0; $i<sizeof($horarios); $i++){ // Precisa testar 
        for($j=0; $j<6; $j++){
            if($j==0){
                $tabela[$i][$j]=$horarios[$i];
                continue;
            }
            if($i==0 && $j>0){
                $tabela[$i][$j]=$dias[$j-1];
            }else if($guardar_pos==$i-1){
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