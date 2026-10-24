<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/UsuariosController.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <title>GreenSmiley</title>
</head>
<body>
    <div class="container-principal">

        <header>
            <ul class="listHeader">
                <li class="liHeader">
                    <a href="#">
                        <img src="../img/iconeUsuarios.png" alt="icone usuarios" title="Usuários">
                        <p>Usuarios</p>
                    </a>
                </li>
                <li class="liHeader">
                    <a href="#">
                        <img src="../img/iconeProdutos.png" alt="Icone Produtos" title="Produtos">
                        <p>Produtos</p>
                    </a>
                </li>
                <li class="liHeader">
                    <a href="#">
                        <img src="../img/iconeFornecedores.png" alt="Icone Fornecedores" title="Fornecedores">
                        <p>Fornecedores</p>
                    </a>
                </li>
                <li class="liHeader">
                    <a href="../index.html">
                        <img src="../img/iconeSair.png" alt="Icone Sair" title="Sair">
                        <p>Sair</p>
                    </a>
                </li>
            </ul>
        </header>

        <hr>

            <div class="formulario">
                <form action="ControllerAdmin.php" method="post">
                    <input type="text" name="nome" placeholder="Informe o nome do usuario:"><br><br>
                    <input type="email" name="email" placeholder="Informe o email do usuario:"><br><br>
                    <input type="password" name="senha" placeholder="Informe a nova senha do usuario:"><br><br>
                    <input type="submit" name="requisicao" value="Consultar"> <input type="submit" name="requisicao" value="Atualizar"> <input type="submit" name="requisicao" value="Deletar">
                </form>
            </div>   

    </div>

</body>
</html>