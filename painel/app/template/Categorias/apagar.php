<div class="content-border">
	<div class="content-user">
		<h1>Apagar categoria</h1>
		<p>Tem certeza que deseja apagar a categoria:<b><?php echo $catInfo['categoria'];?></b>?</p><br/>
		<form action="index.php?page=categorias&action=apagar&id=<?php echo $_GET['id'];?>" method="POST" name="apagarCategoria">
			<input type="hidden" name="apagarCate" value="TRUE" />
			<input type="submit" name="apagar" value="Apagar" />
			<br/><br/>
		</form>
	</div>
</div>
