<?php
    /*require_once 'vendor/autoload.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $tabela = $_POST["conteudo"];
    $dompdf->loadhtml($tabela);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream();*/
    $nome_arquivo = "Tabela".$_POST["data_y"].$_POST["data_m"].$_POST["data_d"];
    file_put_contents($nome_arquivo.".html", $_POST["conteudo"]);
?>