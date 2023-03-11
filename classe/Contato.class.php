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
            $cmd = $this->pdo->query(" SELECT `idContato`,`nome` ,`empresa`,`identificacao`,`apartamento`,`bloco`,DATE_FORMAT(`data_cadastro`, '%d%/%m/%Y - %h:%i') as data_formatada FROM contato ORDER BY idContato");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        //FUNÇÃO CADASTRA CONTATO NO BANCO DE DADOS
        public function cadastrarContato($nome, $empresa, $identificacao, $apartamento, $bloco){
            
            $cmd = $this->pdo->prepare("INSERT INTO contato (nome, empresa, identificacao, apartamento, bloco) VALUES (:n, :e, :i, :a, :b)");
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":e", $empresa);
            $cmd->bindValue(":i", $identificacao);
            $cmd->bindValue(":a", $apartamento);
            $cmd->bindValue(":b", $bloco);
                
            $cmd->execute();
                
            return true;            
        }

        public function excluirContato($id){
            $cmd = $this->pdo->prepare("DELETE FROM contato WHERE idContato = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }

        public function buscarDadosContato($id){

            $res = array();
            $cmd = $this->pdo->prepare("SELECT * FROM contato WHERE idContato = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $res = $cmd->fetch(PDO::FETCH_ASSOC);
            return $res;
        }

        public function atualizarDados($id, $nome, $sobrenome, $email, $telefone){
            
                $cmd = $this->pdo->prepare("UPDATE contato SET nome = :n, sobrenome = :s, email = :e, telefone = :t WHERE idContato = :id");
                $cmd->bindValue(":id", $id);
                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":s", $sobrenome);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":t", $telefone);                
                
                $cmd->execute();

                return true;
            
        }

        

        

       
    }
   
?>


