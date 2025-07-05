<?php
    require_once 'Conexao.php';

    $nome = $_POST['nome'];
    $email  = $_POST['email'];
    $senha = $_POST['senha']; 
    $cpf = $_POST['cpf']; 


    
    if(!empty($nome) && !empty($email) && !empty($senha) && !empty($cpf)){

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha, cpf) VALUES (:nome, :email, :senha, :cpf)";

        $requisicao = $conexao->prepare($sql);

        $requisicao->bindParam(':nome', $nome);
        $requisicao->bindParam(':email', $email);
        $requisicao->bindParam(':senha', $senhaHash);
        $requisicao->bindParam(':cpf', $cpf);
        
        try{
            $requisicao->execute();
                echo' <!DOCTYPE html>
        <html>
        <head>
            <title>Sucesso</title>
            <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <style>
                body{background-color: #000000;}
            </style>
        </head>
            <body>
                <script type="text/javascript">
                    Swal.fire({
                        title: "Cadastro Realizado",
                        text: "Cadastro concluído com Sucesso.",
                        icon: "success",
                        confirmButtomText: "OK",
                        confirmButtonColor: "#20C20E",
                        background: "#000000",
                        color: "#20C20E"
                    }).then(function() {
                         location.href = "../index.html";
                    });
                </script>
            </body>
        </html>';
        }catch(PDOException $e){
            echo ' <!DOCTYPE html>
    <html>
    <head>
        <title>Erro</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            body{background-color: #000000;}
        </style>
    </head>
    <body>
        <script type="text/javascript">
              Swal.fire({
            title: "Erro!",
            text: "Erro ao cadastrar",
            icon: "error",
            confirmButtomText: "OK",
            confirmButtonColor: "#20C20E",
            background: "#000000",
            color: "#20C20E"
        }).then(function() {
            location.href = "../html/cadastro.html"
        });
        </script>
    </body>
    </html>' . $e->getMessage();
        }

    }else{
        echo ' <!DOCTYPE html>
    <html>
    <head>
        <title>Erro</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            body{background-color: #000000;}
        </style>
    </head>
    <body>
        <script type="text/javascript">
              Swal.fire({
            title: "Erro!",
            text: "Erro ao cadastrar",
            icon: "error",
            confirmButtomText: "OK",
            confirmButtonColor: "#20C20E",
            background: "#000000",
            color: "#20C20E"
        }).then(function() {
            location.href = "../html/cadastro.html"
        });
        </script>
    </body>
    </html>';
    }

?>