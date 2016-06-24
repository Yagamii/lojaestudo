<h1 align="center">Categorias</h1>
<div class="categorias-sidebar">
	<ul>
	<?php while($row = mysqli_fetch_array($categoria, MYSQLI_ASSOC)): ?>
    
    	<li>- <a href="index.php?page=categorias&action=listar&id=<?php echo $row['id_categoria']; ?>"><?php echo $row['categoria']; ?></a></li>
    
    <?php endwhile; ?>
    </ul>
</div>
<div class="categorias-listar">
	<?php while($rowlist = @mysqli_fetch_array($produtos, MYSQLI_ASSOC)): ?>
	<div class="produto-curto">
    	<h3><a href="index.php?page=produto&id=<?php echo $rowlist['id_produto']; ?>" ><?php echo $rowlist['nome_produto']; ?></a></h3>
    	<a href="index.php?page=produto&id=<?php echo $rowlist['id_produto']; ?>" ><img src="app/template/Includes/thumb/<?php echo $rowlist['thumb']; ?>" width="220" height="210"/></a>
        <p class="desc-produto"><?php echo $rowlist['descricao']; ?> </p>
        <div class="valor">R$<?php echo $rowlist['valor']; ?></div>
        <a href="index.php?page=produto&id=<?php echo $rowlist['id_produto']; ?>" ><div class="ver-produto">Ver</div></a>
	</div>
    <?php endwhile; ?>
</div>