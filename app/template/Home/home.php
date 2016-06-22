<h1 align="center">Últimos produtos</h1>
<?php 
	//Verifica cada produto que foi chamado na variavel $produtos que veio do act_home para exibi-lo na tela
	while($row = mysqli_fetch_array($produtos, MYSQLI_ASSOC)): ?>
	<div class="produto-curto">
    	<h3><a href="index.php?page=produto&id=<?php echo $row['id_produto']; ?>" ><?php echo $row['nome_produto']; ?></a></h3>
    	<a href="index.php?page=produto&id=<?php echo $row['id_produto']; ?>" ><img src="app/template/Includes/thumb/<?php echo $row['thumb']; ?>" width="220" height="210"/></a>
        <p class="desc-produto"><?php echo $row['descricao']; ?> </p>
        <div class="valor">R$<?php echo $row['valor']; ?></div>
        <a href="index.php?page=produto&id=<?php echo $row['id_produto']; ?>" ><div class="ver-produto">Ver</div></a>
	</div>
<?php endwhile; ?>
