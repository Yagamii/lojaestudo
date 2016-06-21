<h1 align="center">Últimos produtos</h1>
<?php 
	//Verifica cada produto que foi chamado na variavel $produtos que veio do act_home para exibi-lo na tela
	while($row = mysqli_fetch_array($produtos, MYSQLI_ASSOC)): ?>
	<div class="produto-curto">
    	<h3><?php echo $row['nome_produto']; ?></h3>
    	<img src="app/template/Includes/thumb/<?php echo $row['thumb']; ?>" width="220" height="210"/>
        <p class="desc-produto"><?php echo $row['descricao']; ?> </p>
        <div class="valor">R$<?php echo $row['valor']; ?></div>
        <div class="ver-produto">Ver</div>
	</div>
<?php endwhile; ?>
