
<?php

    require_once 'Conexao.php';

    $email = $_POST['email'];

    if(!empty($email)) {
        
        $sql = "DELETE FROM usuarios WHERE email = :email";
        
        $requisicao = $conexao->prepare($sql);
    
        $requisicao->bindParam(':email', $email);
        
        try {
            $requisicao->execute();
            if ($requisicao->rowCount() > 0) {
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
                        title: "Remoção Realizada",
                        text: "Usuario removido com sucesso.",
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
            } else {
                 echo '<!DOCTYPE html>
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
                text: "O usuário não existe",
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
        } catch(PDOException $e){
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
                text: "Erro ao remover",
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
                text: "Informe um e-mail para remover um usuário",
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
