<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="../css/carrinho.css ">
    <title>Cart</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body>
    <?php
    
    include 'Cabecalho.php';
    
    ?>

    <div class="container">

        <div class="meuCarrinho">

            <h5 class="tituloMeuCarrinho">Meu carrinho</h5>

                <div class="boxProduto">

                    <img src="../img/img6.png" alt="imagemProduto" class="imagemProduto">
                    <span class="nomeProduto">JAQUETA NIKE X CORTEIZ [CINZA]</span>
                    <span class="preco">R$ 819,00</span>

                </div>

                <a href="#" class="linkRemover"><span class="removerProduto">remover</span></a>
                
        </div>
            
        <div class="resumoCarrinho">

            <h5 class="tituloResumo">Resumo do carrinho</h5>

            <div class="boxInfosResumo">

                <span class="qtdItens">itens(1)</span>
                <span class="valorProduto">R$819,00</span>
                
            </div>  
            
            <div class="boxTotalPagar">

                <span class="totalPagar">Total a pagar</span>
                <span class="total">R$819,00</span>

            </div>
            
        <div class="boxBotao">
            <button class="continuarCompra">Continuar compra</button>
        </div>


        </div>


    </div>

    <div>      
        <footer>
            <ul class="listFooter">
              <li class="liFooter"><a href="#">PRIVACY POLICY</a></li>
              <li class="liFooter"><a href="#">TERMS OF USE</a></li>
              <li class="liFooter">Todos os direitos reservados&copy; 2025</li>
            </ul>
          </footer>    
      </div>

</body>
</html>