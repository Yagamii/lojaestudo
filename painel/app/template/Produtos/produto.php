<div class="content-border">
	<div class="content">
		<h1>Adicionar produto</h1>
		<form action="index.php?page=produtos&action=adicionar" enctype="multipart/form-data" method="POST" name="adicionarProduto">
			<p>
				<label style="margin-left: 5px">Nome:</label>
				<input style="margin-left: 5px" type="text" name="nome" size="35px" value="<?php if(isset($_POST['nome']))echo $_POST['nome'];?>"/>
			</p>
			<p>
				<label style="margin-left: -25px;">Descrição:</label>
				<textarea style="margin-left: 5px" name="descricao" cols="37" rows="5" ><?php if(isset($_POST['descricao']))echo $_POST['descricao'];?></textarea>
			</p>
			<p>
				<label style="margin-left: -23px">Categoria:</label>
				<select name="categoria" style="width: 280px; margin-left: 5px">
				<?php while($cat = mysqli_fetch_array($listaCategorias, MYSQLI_ASSOC)): ?>
					<option value="<?php echo $cat['id_categoria'];?>"><?php echo $cat['categoria'];?></option>
				<?php endwhile; ?>
			</select>
			</p>
			<p>
				<label style="margin-left: -19px">Valor(R$):</label>
				<input style="margin-left: 5px" size="35px" type="text" name="valor" value="<?php if(isset($_POST['valor']))echo $_POST['valor'];?>"/>
			</p>
			<p>
				<label style="margin-left: -43px">Quantidade:</label>
				<input style="margin-left: 5px" type="text" name="quantidade" size="35px" value="<?php if(isset($_POST['quantidade']))echo $_POST['quantidade'];?>"/>
			</p>
			<p>
				<label>Imagem:</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
				<input type="file" name="imagem" />
			</p><br/>
			<p>
				<input type="hidden" name="addProduto" value="TRUE" />
				<input type="submit" name="add" value="Adicionar" />
			</p><br/>
		</form>
	</div>
	
	<div class="content">
		<h1>Produtos</h1>
		<br/>
		<table style="margin: 0 auto; width: 100%">
			<tr>
				<th>Nome</th>
				<th>Categoria</th>
				<th>Valor</th>
				<th>Estoque</th>
				<th>Editar</th>
				<th>Apagar</th>
			</tr>
			<?php while($row = mysqli_fetch_array($listaProdutos, MYSQLI_ASSOC)): ?>
				<tr>
					<td><?php echo $row['nome_produto']; ?></td>
					<td><?php echo $row['categoria']; ?></td>
					<td><?php echo 'R$' .$row['valor'];?></td>
					<td><?php echo $row['estoque'];?></td>
					<td><a href="index.php?page=produtos&action=editar&id=<?php echo $row['id_produto'];?>"><img src="app/template/Includes/icone-editar.png" width="18" height="18" /></a></td>
					<td><a href="index.php?page=produtos&action=apagar&id=<?php echo $row['id_produto'];?>"><img src="app/template/Includes/icone-apagar.png" width="18" height="18"/></a></td>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>
	
	<div class="content">
		<h1>Estatisticas</h1>
		
		<?php
		//O while é utilizado para apresentar o nome das categorias, enquanto a função dentro dele faz a contagem de produtos contidos na categoria 
		while($stat = mysqli_fetch_array($numStats, MYSQLI_ASSOC)):
			//Recebe a quantidade de produtos contidos na categoria, utilizando a função countCategoria e passando pra ela o id da categoria
			$count = $Produtos->countCategoria($stat['id_categoria']);
			//Exibe o nome da categoria e a quantidade de produtos nela
			echo '<p>'.$stat['categoria'] . ': <b>'. $count.'</b></p>';
			//Variavel para armazenas a quantidade total de produtos cadastrados
			@$total += $count;
		endwhile;
			echo '<p>Total: <b>'. $total .'</b></p>'?>
	</div>
</div>