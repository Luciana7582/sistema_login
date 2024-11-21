<?php
// Código para receber as informações do HTML e fazeer algo 
// Captura oque o usuário digitou e cadastra no bd

// Chama arquivo da conexão
include 'conexao.php';

// Verifica se existe alguma informação chegando pela Rede
if($_SERVER["REQUEST_METHOD"] =="POST"){

    // Recebe o e-mail, filtra e armazena na variável
    $email = htmlspecialchars($_POST['email']); //segurança 

    // Recebe a senha criptografada e armazena em uma variável
    $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT); // mão dupla (garante segurança)

    // Exibe a Variável para testar
    //var_dump($senha ); // enchergar oque está acontecendo (mostra no navegador)
    
    // Bloco tente para cadastrar no banco de dados
    try{
        // Prepara o comando SQL para inserir no banco de dados
        // Utilizar o Prepared para previnir injetar SQL
        $stmt = $conn->prepare("INSERT INTO Usuarios (email, senha) VALUES (:email, :senha)");
        

        // Associa os valores das Variáveis :email e :senha
        $stmt->bindParam(":email",$email); // Vincula o email e limpa
        $stmt->bindParam(":senha",$senha);

        // Executa o código
        $stmt->execute();

        echo "Cadastrado com sucesso";
    }catch(PDOException $e){
        echo "Erro ao cadastrar o usuario :".$e->getMessage();
    }
}