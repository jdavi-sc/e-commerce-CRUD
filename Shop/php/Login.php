<?php
session_start();
require_once 'Conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") 

    $email = $_POST["useremail"] ?? '';
    $senha = $_POST["userpassword"] ?? '';

    if (!empty($email) && !empty($senha))
        try {

            $stmt = $conexao->prepare('SELECT * FROM usuarios WHERE email = :email');
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario["senha"])) {

                $_SESSION["id_usuario"] = $usuario["id"];
                $_SESSION["nome_usuario"] = $usuario["nome"];

                header("Location: Home.php");
                exit;

            } else {

                echo' <!DOCTYPE html>
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
                        text: "E-mail ou senha inválidos",
                        icon: "error",
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

            }

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
            text: "Erro ao realizar login",
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
?>