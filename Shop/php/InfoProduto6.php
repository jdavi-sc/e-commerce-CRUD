<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="../css/infoProduto6.css">
    <title>JAQUETA NIKE X CORTEIZ | infos</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body>

   <?php
    
        include 'Cabecalho.php';
    
    ?>

    <div class="container">
        <div class="produto">
            <img class="imagemProduto" src="../img/img6.png" alt="Produto escolhido"><br>
            <img class="imagemProdutoCostas" src="../img/img6back.png" alt="JAQUETA NIKE X CORTEIZ">
        </div>
        <div class="infos">

            <form action="AdicionaNoCarrinho.php" method="post">
                
                <h3>JAQUETA NIKE X CORTEIZ [CINZA]</h3>
                <input type="hidden" name="nomeProduto" value="JAQUETA NIKE X CORTEIZ [CINZA]">
                <input type="hidden" name="precoProduto" value="819,00">


                
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
                <li>Nylon Windbreaker</li>
                <li>Water Resistant</li>
                <li>Two side zipper pockets</li>
            </ul>

        </div>

    </div>

 <?php

        include 'Footer.php';
    
    ?>

</body>
</html>