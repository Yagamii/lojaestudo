<div class="content-border">
	<div class="content-user">
		<h1>Apagar produto</h1>
		<p>Você tem certeza que deseja apagar o produto: <b><?php echo $nomePorId['nome_produto'];?></b>?</p>
		<form action="index.php?page=produtos&action=apagar&id=<?php echo $_GET['id'];?>" method="POST" name="delProduto">
			<br/>
			<p>
				<input type="hidden" name="apagarProduto" value="TRUE" />
				<input type="submit" name="apagar" value="Apagar" />
			</p>
			<br/>
		</form>
	</div>
</div>
