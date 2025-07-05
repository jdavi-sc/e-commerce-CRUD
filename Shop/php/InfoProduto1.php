<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="../css/infoProduto1.css">
    <title>CORTEIZ C-STAR [JEANS] | infos</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body>

    <?php
    
        include 'Cabecalho.php';
    
    ?>

    <div class="container">
        <div class="produto">
            <img class="imagemProduto" src="../img/img1.png" alt="CORTEIZ C-STAR [JEANS]"><br>
        </div>
        <div class="infos">

            <form action="AdicionaNoCarrinho.php" method="post">
                
                <h3>CORTEIZ C-STAR [JEANS]</h3>
                <input type="hidden" name="nomeProduto" value="CORTEIZ C-STAR [JEANS]">
                <input type="hidden" name="precoProduto" value="419,00">


                
                <select name="Tamanhos" id="tamanho">
                    <option selected disabled>SELECT YOUR SIDE</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                </select>
                
                <br><br>

                <button type="submit" class="buttonCart" name="btnenviar">ADD TO CART</button>
            </form>

            <ul class="especificidades">
                <li>Tapered Fit</li>
                <li>Distressed Details</li>
                <li>Embroidered Branding</li>
            </ul>

        </div>

    </div>

    <?php

        include 'Footer.php';
    
    ?>

</body>
</html>