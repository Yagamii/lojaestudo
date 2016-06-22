<h1 align="center">Promocoes</h1>
<?php while($row = mysqli_fetch_array($promocoes, MYSQLI_ASSOC)): ?>

	<div class="produto-curto">
    	<h3><a href="index.php?page=produto&id=<?php echo $row['id_produto']; ?>" ><?php echo $row['nome_produto']; ?></a></h3>
    	<a href="index.php?page=produto&id=<?php echo $row['id_produto']; ?>" ><img src="app/template/Includes/thumb/<?php echo $row['thumb']; ?>" width="220" height="210"/></a>
        <p class="desc-produto"><?php echo $row['descricao']; ?> </p>
        <div class="valor">R$<?php echo $row['valor']; ?></div>
        <a href="index.php?page=produto&id=<?php echo $row['id_produto']; ?>" ><div class="ver-produto">Ver</div></a>
	</div>

<?php endwhile; ?>