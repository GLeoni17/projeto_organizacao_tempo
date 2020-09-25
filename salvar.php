<?php
    require_once 'vendor/autoload.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $tabela = $_POST["conteudo"];
    $dompdf->loadhtml($tabela);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream();
    file_put_contents('Tabela.pdf'.$_POST["data_y"].$_POST["data_m"].$_POST["data_d"], $dompdf->output());
?>