
<?php

    require_once 'Conexao.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $novaSenha = $_POST['senha'];


    if (!empty($nome) && !empty($email)) {

        if(!empty($novaSenha)) {
            $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $sql = 'UPDATE usuarios SET nome = :nome, senha = :senha WHERE email = :email';

        } else {
            $sql = 'UPDATE usuarios SET nome = :nome WHERE email = :email';
        }
        $requisicao = $conexao->prepare($sql);
        $requisicao->bindParam(':nome', $nome);
        $requisicao->bindParam(':email', $email);
        
        if (!empty($novaSenha)) {
            $requisicao->bindParam(':senha', $senhaHash);
        }

        try {
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
                        title: "Atualização Realizada",
                        text: "Atualização concluída com Sucesso.",
                        icon: "success",
                        confirmButtomText: "OK",
                        confirmButtonColor: "#20C20E",
                        background: "#000000",
                        color: "#20C20E"
                    }).then(function() {
                         location.href = "UsuariosController.php"
                    });
                </script>
            </body>
        </html>';
        } catch (PDOException $e) {
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
                text: "Erro ao Atualizar",
                icon: "error",
                confirmButtomText: "OK",
                confirmButtonColor: "#20C20E",
                background: "#000000",
                color: "#20C20E"
                }).then(function() {
                    location.href = "UsuariosController.php"
                });
            </script>
        </body>
    </html>' . $e->getMessage();
        }
    } else {
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
            text: "Preencha todos os campos",
            icon: "error",
            confirmButtomText: "OK",
            confirmButtonColor: "#20C20E",
            background: "#000000",
            color: "#20C20E"
        }).then(function() {
            location.href = "UsuariosController.php"
        });
        </script>
    </body>
    </html>';
    }

?>
