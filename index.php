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
            $(document).ready(function(){
                $("#salvar").click(function(){
                    var conteudo = "<link rel=\"stylesheet\" href=\"style.css\">";
                    conteudo+="<link href=\"bootstrap-4.4.1-dist/css/bootstrap.min.css\" type=\"text/css\" rel=\"stylesheet\" />";
                    conteudo+=$("#table").html();
                    var d = new Date();
                    $.post("salvar.php", {"conteudo":conteudo, "data_y":d.getFullYear(), "data_m":d.getMonth()+1, "data_d":d.getDate()}, function(msg){
                        
                    });
                });
            });
        </script>
    </head>
    <body>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-12" id="table" style="overflow:hidden;">
                <table id="tabela" class="table table-responsive">
                    <?php table();?>
                </table>
            </div>
            <div class="row">
                <span class="col-md-5"></span>
                <button id="salvar" type="button" class="btn btn-lg btn-dark btn-block outra-cor col-md-1">Salvar</button>
                <span class="col-md-5"></span>
            </div>
        </div>
        
    </body>
</html>