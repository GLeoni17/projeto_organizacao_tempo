<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <?php include "func.php"; ?>
        <script>
            function aparece(id, h){
                console.log(id);
                    if(h==2){
                        var l=prompt("Insira o novo horario");
                    }else{
                        var l=prompt("Insira a nova atividade");
                    }
                if(l[2]!=":" && h==2){ 
                    alert("Insira no formato 00:00");
                }else{
                    $("#"+id).html("<span>"+l+"</span>");
                }
                
            }
            $(document).ready(function(){
                $("#salvar").click(function(){
                    var conteudo = "<table class=\"table table-responsive\">"+$("#tabela").html()+"</table>";
                    var d = new Date();
                    $.post("salvar.php", {"conteudo":conteudo, "data_y":d.getFullYear(), "data_m":d.getMonth()+1, "data_d":d.getDay()}, function(msg){
                        console.log(msg)
                    });
                });
            });
        </script>
    </head>
    <body>
        <div class="row justify-content-center ">
            <div class="col-auto">
                <table id="tabela" class="table table-responsive">
                    <?php table();?>
                </table>
            </div>
        </div>
        <button id="salvar" type="button">Salvar</button>
    </body>
</html>