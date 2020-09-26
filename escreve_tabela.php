<?php
    $dias=array("Segunda", "Terça", "Quarta", "Quinta", "Sexta");
    $horas=array("00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00");
    $horarios=array("#");
    $acordar=$_POST["h1"];
    $dormir=$_POST["h2"];
    //Dormir de tarde e acordar a noite - dormir<acordar
    //Dormir a noite e acordar de manha/tarde - acordar<dormir
    if($_POST["h2"]<$_POST["h1"]){ // dormir<acordar
        for($i=0; $i<24; $i++){
            if($horas[$i]<$_POST["h2"] || $horas[$i]>$_POST["h1"]){
                array_push($horarios, $horas[$i]);
            }else{
                array_push($horarios, $_POST["h2"]." até ".$_POST["h1"]);
                $i=$_POST["h1"][0].$_POST["h1"][1];
            }
            echo $horarios[sizeof($horarios)-1]." ";
        }
    }else{ // acordar < dormir
        for($i=0; $i<24; $i++){
            if($horas[$i]>$_POST["h2"] || $horas[$i]<$_POST["h1"]){
                array_push($horarios, $horas[$i]);
            }else{
                array_push($horarios, $_POST["h2"]." até ".$_POST["h1"]);
                $i=$_POST["h2"][0].$_POST["h2"][1];
            }
            echo $horarios[sizeof($horarios)]." ";
        }
    } 
      
?>