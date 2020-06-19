<script src="jquery-3.5.1.min"></script>
aparecer=0;
id_m=0;
muda=0
function aparece(id){
    alert('a');
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
        document.getElementById(id_m).value=document.getElementById('nova_palavra').value;
        document.getElementById('nova_palavra').value=' ';
    }
    desaparece();

}

function CriaPDF() {
    var minhaTabela = document.getElementById('conteudo').innerHTML;
    var style = "<style>";
    style = style + "table {width: 100%;font: 20px Calibri;}";
    style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
    style = style + "padding: 2px 3px;text-align: center;}";
    style = style + "</style>";
    // CRIA UM OBJETO WINDOW
    var win = window.open('', '', 'height=700,width=700');
    win.document.write('<html><head>');
    win.document.write('<title>Empregados</title>');   // <title> CABEÇALHO DO PDF.
    win.document.write(style);                                     // INCLUI UM ESTILO NA TAB HEAD
    win.document.write('</head>');
    win.document.write('<body>');
    win.document.write(minhaTabela);                          // O CONTEUDO DA TABELA DENTRO DA TAG BODY
    win.document.write('</body></html>');
    win.document.close(); 	                                         // FECHA A JANELA
    win.print();                                                            // IMPRIME O CONTEUDO
}