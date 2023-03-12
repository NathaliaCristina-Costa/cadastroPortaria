<?php

include_once './conexao.php';

$identificacao = filter_input(INPUT_GET, 'identificacao', FILTER_SANITIZE_SPECIAL_CHARS);
if(!empty($identificacao)){
    
    $limit = 1;
    $result_aluno = "SELECT nome, identificacao FROM contato WHERE identificacao =:identificacao LIMIT :limit";
    
    $resultado_aluno = $conn->prepare($result_aluno);
    $resultado_aluno->bindParam(':identificacao', $identificacao, PDO::PARAM_STR);
    $resultado_aluno->bindParam(':limit', $limit, PDO::PARAM_INT);
    $resultado_aluno->execute();
    
    $array_valores = array();
    
    if($resultado_aluno->rowCount() != 0){
        
        $row_aluno = $resultado_aluno->fetch(PDO::FETCH_ASSOC);
        $array_valores['nome'] = $row_aluno['nome'];
    }else{
        $array_valores['nome'] = '';        
    }
    echo json_encode($array_valores);
}