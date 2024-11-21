<?php
/*
    Conexão com BD usando PDO : PDO permite acessar qualquer banco de dados.
    PDO = PHP Data Objects = PHP objetos de dados 
    */ 

    // Declara as variáveis com os dados de conexão
    $host = 'localhost';
    $dbname = 't57_login';
    $usuario = 'root';
    $senha = '';

     // Data Source Name = Nome da origem dos dados
     $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

     try{
        // Cria conexão
        $conn = new PDO($dsn,$usuario,$senha);

        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
     }catch(PDOException $e){
        die("ERRO de Conexão".$e->getMessage());  // die (mostre o erro e morra o codigo "o código para por segurança dos dados")
     }