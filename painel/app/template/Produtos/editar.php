<div class="content-border">
	<div class="content-user">
		<h1>Editar produto</h1>
		<form action="index.php?page=produtos&action=editar&id=<?php echo $_GET['id'];?>" enctype="multipart/form-data" method="POST" name="formEditarProduto">
			<p>
				<label>Nome: </label>
				<input type="text" name="nome" size="58px" value="<?php echo $nomePorId['nome_produto'];?>" />
			</p>
			<p>
				<label style="margin-left: -31px">Descrição: </label>
				<textarea name="descricao" cols="60" rows="6"><?php echo $nomePorId['descricao'];?></textarea>
			</p>
			<p>
				<label style="margin-left: -174px">Categoria: </label>
				<select name="categoria" style="width: 300px; margin-left: 5px">
				<?php while($cat = mysqli_fetch_array($listaCategorias, MYSQLI_ASSOC)): ?>
					<?php if($cat['id_categoria'] === $nomePorId['id_categoria']): ?>
					<option selected value="<?php echo $cat['id_categoria'];?>"><?php echo $cat['categoria'];?></option>
					<?php else: ?>
					<option value="<?php echo $cat['id_categoria'];?>"><?php echo $cat['categoria'];?></option>
				<?php 	endif;
						endwhile; ?>
				</select>
			</p>
			<p>
				<label style="margin-left: -287px">Valor(R$): </label>
				<input type="text" name="valor" value="<?php echo $nomePorId['valor']; ?>" />
			</p>
			<p>
				<label style="margin-left: -308px">Quantidade: </label>
				<input type="text" name="quantidade" value="<?php echo $nomePorId['estoque']; ?>" />
			</p>
			<br/>
			<p>
				<img style="border: 1px solid black; border-radius: 5px 5px 5px 5px" src="../app/template/Includes/thumb/<?php echo $nomePorId['thumb']; ?>" width="200px" height="200px" />
			</p>
			<p>
				<label style="margin-left: -50px">Imagem: </label>
				<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
				<input type="file" name="imagem" />
			</p>
			<p>
				<label style="margin-left: -340px">Promoção: </label>
				<?php if($nomePorId['promo'] === 1): ?>
				<input type="checkbox" name="promo" value="1" />
				<?php else: ?>
				<input type="checkbox" checked name="promo" value="1" />
				<?php endif; ?>
			</p>
			<br/>
			<p>
				<input type="hidden" name="editarProduto" value="TRUE" />
				<input type="submit" name="editar" value="Editar" />
			</p>
			<br/>
		</form>
	</div>
</div>
