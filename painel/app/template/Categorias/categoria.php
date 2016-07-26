<div class="content-border">
	<div class="content">
		<h1>Adicionar categoria</h1>
			<form action="index.php?page=categorias&action=adicionar" method="POST" name="addcategoria">
				<br/>
				<label>Nome: </label><input type="text" name="categoria" />
				<br/><br/>
				<input type="hidden" name="adicionar" value="TRUE" />
				<input type="submit" name="addcat" value="Adicionar" />
				<br/><br/>
			</form>
	</div>
	<div class="content">
		<h1>Categorias</h1>
		<br/>
		<table style="margin: 0 auto; width: 70%">
			<tr>
				<th>Nome</th>
				<th>Editar</th>
				<th>Apagar</th>
			</tr>
			<?php while($row = mysqli_fetch_array($categoria, MYSQLI_ASSOC)): ?>
				<tr>
					<td>
						<?php echo $row['categoria'];?>
					</td>
					<td>
						<a href="index.php?page=categorias&action=editar&id=<?php echo $row['id_categoria'];?>"><img src="app/template/Includes/Editing-Edit-icon.png" width="18" height="18" /></a>
					</td>
					<td>
						<a href="index.php?page=categorias&action=apagar&id=<?php echo $row['id_categoria'];?>"><img src="app/template/Includes/apagar-icon.png" width="18" height="18"/></a>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>
</div>
