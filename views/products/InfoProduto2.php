<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="../css/infoProduto2.css">
    <title>CAMISETA CORTEIZ STAR [PRETA] | infos</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body>

    <?php
    
        include 'Cabecalho.php';
    
    ?>

    <div class="container">
        <div class="produto">
            <img class="imagemProduto" src="../img/img2.png" alt="CAMISETA CORTEIZ STAR [PRETA]"><br>
        </div>
        <div class="infos">

        <form action="AdicionaNoCarrinho.php" method="post">
                
                <h3>CAMISETA CORTEIZ STAR [PRETA]</h3>
                <input type="hidden" name="nomeProduto" value="CAMISETA CORTEIZ STAR [PRETA]">
                <input type="hidden" name="precoProduto" value="299,00">


                
                <select name="Tamanhos" id="tamanho">
                    <option selected disabled>SELECT YOUR SIDE</option>
                    <option value="PP">PP</option>
                    <option value="P">P</option>
                    <option value="M">M</option>
                    <option value="G">G</option>
                    <option value="GG">GG</option>
                </select>
                
                <br><br>

                <button type="submit" class="buttonCart" name="btnenviar">ADD TO CART</button>
            </form>

            <ul class="especificidades">
                <li>Premium Cotton Fabric</li>
                <li>Bold Star Graphic</li>
                <li>Relaxed Fit</li>
            </ul>

        </div>

    </div>

    <?php

        include 'Footer.php';
    
    ?>

</body>
</html>