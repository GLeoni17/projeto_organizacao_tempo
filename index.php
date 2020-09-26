<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <?php //include "func.php"; ?>
        <script>
            var dormir, acordar, conteudo = "<meta charset=\"UTF-8\">";
            conteudo += "<link rel=\"stylesheet\" href=\"style.css\">";
            conteudo+="<link href=\"bootstrap-4.4.1-dist/css/bootstrap.min.css\" type=\"text/css\" rel=\"stylesheet\" />";
            conteudo+="<div class=\"position-relative p-2 p-md-5 m-md-2 text-center bg-light\">";
            function aparece(id, h){

                    if(h==2){
                        var l=prompt("Insira o novo horario");
                    }else{
                        var l=prompt("Insira a nova atividade");
                    }

                if((l[2]!=":" && h==2) || (l.length > 5 && h==2)){ 
                    alert("Insira no formato 00:00");
                }else if(l[0]=="2" && l[1]=="4"){
                    alert("Insira um horário entre 00:00 a 23:00");
                }else{
                    $("#"+id).html("<span>"+l+"</span>");
                }
                
            }

            function isNumber(n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            }

            function leitura_horario(n){
                if(n==1){
                    n="dorme";
                }else{
                    n="acorda";
                }
                do{
                    var leitura = prompt("Que horas voce "+n+"?");
                    test=true;
                    if(leitura[2]!=":" || leitura.length > 5){
                        alert("Insira no formato 00:00");
                        test=false;
                    }else if(leitura>"23:59"){
                        alert("Insira apenas horarios entre 00:00 e 23:59");
                        test=false;
                    }else{
                        for(i = 0; i<leitura.length; i++){
                            if(!isNumber(leitura[i]) && i!=2){
                                alert("Insira no formato 00:00");
                                test=false;
                                break;
                            }
                        }
                    }
                }while(test!=true);
                return leitura;
            }
            
            $(document).ready(function(){

                dormir=leitura_horario(1);
                acordar=leitura_horario(2);

                $.post("escreve_tabela.php", {"h1":acordar, "h2":dormir}, function(msg){
                    console.log(msg);
                });

                $("#salvar").click(function(){
                    $("#sumir").hide();
                    conteudo+=$("#table").html();
                    conteudo+="</table>";
                    var d = new Date();
                    $.post("salvar.php", {"conteudo":conteudo, "data_y":d.getFullYear(), "data_m":d.getMonth()+1, "data_d":d.getDate()}, function(msg){
                    });
                    window.open("Tabela"+d.getFullYear()+(d.getMonth()+1)+d.getDate()+".html");
                    $("#sumir").show();
                });
            });
        </script>
    </head>
    <body>
    <div class="wrapper">
        <div class="position-relative p-2 p-md-5 m-md-2 text-center bg-light">
            <div class="col-12">
                <table id="tabela_dias" class="table table-responsive">
                </table>
            </div>
        </div>
        <div id="sumir" class="row">
                <span class="col-md-5"></span>
                <button id="salvar" type="button" class="btn btn-lg btn-dark btn-block outra-cor col-md-1">Salvar</button>
                <span class="col-md-5"></span>
            </div>
    </div>
    </body>
</html>