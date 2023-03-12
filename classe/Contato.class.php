<?php

    class Contato{
        private $pdo;
        
        //CONEXAO BANCO DE DADOS
        public function __construct($dbname, $host, $user, $senha){
            try {
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
            } catch (PDOException $e) {
                echo "Erro com banco de dados: ".$e->getMessage();
            } catch (Exception $e) {
                echo "Erro generico: ".$e->getMessage();
            }
        }

        //BUSCAR DADOS DO BANCO E MOSTRAR NA TABELA DA TELA
        public function buscarDados(){

            $res = array();
            $cmd = $this->pdo->query(" SELECT `idContato`,`nome` ,`empresa`,`identificacao`,`apartamento`,`bloco`,DATE_FORMAT(`data_cadastro`, '%d%/%m/%Y%  %H:%I') as data_formatada, `saida` FROM contato ORDER BY  `idContato` ASC");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        //FUNÇÃO CADASTRA CONTATO NO BANCO DE DADOS
        public function cadastrarContato($nome, $empresa, $identificacao, $apartamento, $bloco, $saida){
            
            $cmd = $this->pdo->prepare("INSERT INTO contato (nome, empresa, identificacao, apartamento, bloco, saida) VALUES (:n, :e, :i, :a, :b, :s)");
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":e", $empresa);
            $cmd->bindValue(":i", $identificacao);
            $cmd->bindValue(":a", $apartamento);
            $cmd->bindValue(":b", $bloco);
            $cmd->bindValue(":s", $saida);
                
            $cmd->execute();
                
            return true;            
        }

     

        public function buscarDadosContato($id){

            $res = array();
            $cmd = $this->pdo->prepare("SELECT * FROM contato WHERE idContato = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $res = $cmd->fetch(PDO::FETCH_ASSOC);
            return $res;
        }

        public function saida($id, $nome, $empresa, $identificacao, $apartamento, $bloco, $saida){
            $cmd = $this->pdo->prepare("UPDATE contato SET nome = :n, empresa = :e, identificacao = :i, apartamento = :a, bloco = :b, saida = :s WHERE idContato = :id");

            $cmd->bindValue(":id", $id);
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":e", $empresa);
            $cmd->bindValue(":i", $identificacao);
            $cmd->bindValue(":a", $apartamento);
            $cmd->bindValue(":b", $bloco);
            $cmd->bindValue(":s", $saida);

            $cmd->execute();

            return true;
        }

      
       
    }
   
?>


