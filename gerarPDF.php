<?php
    //Carregar o composer
    require './vendor/autoload.php';

    use Dompdf\Dompdf;
    use Dompdf\Options;

    
    $options = new Options();

    $pdf = new DOMPDF($options);

    $pdo = new PDO('mysql:host=localhost; dbname=agenda', 'root', 'root');

    $sql = $pdo->query(" SELECT `idContato`,`nome` ,`empresa`,`identificacao`,`apartamento`,`bloco`,DATE_FORMAT(`data_cadastro`, '%d%/%m/%Y - %h:%i') as data_formatada FROM contato ORDER BY idContato");

    $html = '<table border=1 width=100%>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>Nome</th>';
        $html .= '<th>Empresa</th>';
        $html .= '<th>Identificação</th>';
        $html .= '<th>Apartamento</th>';
        $html .= '<th>Bloco</th>';
        $html .= '<th>Data / Hora</th>';
        $html .= '</thead>';
        $html .= '<tbody>';
        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $html .= '<tr><td>'. $linha['nome'] . '</td>';
            $html .= '<td>'. $linha['empresa'] . '</td>';
            $html .= '<td>'. $linha['identificacao'] . '</td>';
            $html .= '<td>'. $linha['apartamento'] . '</td>';
            $html .= '<td>'. $linha['bloco'] . '</td>';
            $html .= '<td>'. $linha['data_formatada'] . '</td></tr>';
            
        }
        $html .= '</tbody>';
    $html .= '</table>';

    $dompdf = new DOMPDF();

    $dompdf->loadHtml('<h1 style="text-align: center;"> Lista de Cadastro Portaria</h1>
    '. $html .'');

    $dompdf->render();

    $dompdf->stream("cadastros.pdf", array("Attachment" => true));
?>