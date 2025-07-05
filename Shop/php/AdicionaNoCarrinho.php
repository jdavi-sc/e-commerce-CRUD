<?php
    require_once 'Conexao.php';

    $produto = $_POST['nomeProduto'];
    $preco = $_POST['precoProduto'];
    $tamanho = $_POST['Tamanhos'];

    
    if(!empty($tamanho)) {

        $sql = "INSERT INTO carrinho (produto, preco, tamanho) VALUES (:produto, :preco, :tamanho)";    

        $requisicao = $conexao->prepare($sql);

        $requisicao->bindParam(':produto', $produto);
        $requisicao->bindParam(':preco', $preco);
        $requisicao->bindParam(':tamanho', $tamanho);

        try{
            $requisicao->execute();
            echo '<!DOCTYPE html>
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
                        title: "Produto adicionado ao carrinho!",
                        text: "Produto adicionado ao carrinho com sucesso",
                        icon: "success",
                        confirmButtomText: "OK",
                        confirmButtonColor: "#20C20E",
                        background: "#000000",
                        color: "#20C20E"
                    }).then(function() {
                         location.href = "Home.php";
                    });
                </script>
            </body>
        </html>';
        }catch(PDOException $e){
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
                        title: "Erro ao adicionar no carrinho",
                        text: "Tente novamente.",
                        icon: "error",
                        confirmButtomText: "OK",
                        confirmButtonColor: "#20C20E",
                        background: "#000000",
                        color: "#20C20E"
                    }).then(function() {
                         location.href = "Home.php";
                    });
                </script>
            </body>
        </html>' . $e->getMessage();
        }
        
    }else{
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
                        title: "Erro",
                        text: "Escolha um tamanho",
                        icon: "error",
                        confirmButtomText: "OK",
                        confirmButtonColor: "#20C20E",
                        background: "#000000",
                        color: "#20C20E"
                    }).then(function() {
                         location.href = "Home.php";
                    });
                </script>
            </body>
        </html>';
    }  
?>