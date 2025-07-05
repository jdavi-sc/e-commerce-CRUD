
<?php

    require_once "Conexao.php";

    $emailDoUsuario = $_POST['email'];

    if (!empty($emailDoUsuario)) {

        $sql = "SELECT * FROM usuarios WHERE email = :email";

        $requisicao = $conexao->prepare($sql);

        $requisicao->bindParam(':email', $emailDoUsuario);

        try {
            $requisicao->execute();
            
            $usuario = $requisicao->fetch(PDO::FETCH_ASSOC);
            
            if ($usuario) {
                echo "Nome: " . $usuario['nome'] . "<br>";
                echo "Email: " . $emailDoUsuario['email'] . "<br>";
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
                text: "Usuário não encontrado ou não existe!",
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
    </html>' ;
            }

        } catch(PDOException $e) {
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
                text: "Erro ao Consultar, tente novamente",
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
    </html>'  . $e->getMessage();
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
                text: "Digite um email para realizar a consulta",
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
    </html>' ;
    }

?>