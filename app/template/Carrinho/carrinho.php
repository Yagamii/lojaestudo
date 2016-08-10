<h1 align="center">Carrinho</h1>
	<br/>
	<table width="100%">
		<tr>
			<th>Produto</th>
			<th>Descrição</th>
			<th>Valor</th>
			<th>Quantidade</th>
			<th></th>
		</tr>
	
	<?php if(!isset($_SESSION['carrinho']) or empty($_SESSION['carrinho'])):?>
		<tr>
			<td colspan="5"><p>Seu carrinho está vazio no momento. :(</p></td>
		</tr>
	</table>
	<?php 
		else:
			foreach($_SESSION['carrinho'] as $id => $qnt):
				$row = $Carrinho->getProduto($id);
	?>
		<tr>
			<td style="border-bottom: 1px dashed grey;"><?php echo $row['nome_produto'];?></td>
			<td style="border-bottom: 1px dashed grey;"><?php echo $row['descricao']; ?></td>
			<td style="border-bottom: 1px dashed grey;"><?php echo $row['valor']; ?></td>
			<td style="border-bottom: 1px dashed grey;"><?php echo $qnt;?></td>
			<td style="border-bottom: 1px dashed grey;"><a href="index.php?page=carrinho&action=remover&id=<?php echo $id;?>">Remover</a></td>
		</tr>
	<?php 
		endforeach;
	?>
	</table>
	<form action="index.php?page=carrinho&action=confirma" method="POST" name="confirmarCompra">
		<p align="right">
			<input type="hidden" name="confirma" value="TRUE" />
			<input type="submit" name="confirmaCompra" value="Finalizar compra" style="padding: 5px 5px; border-radius: 5px 5px 5px 5px"/>
		</p>
	</form>
	<?php
		endif;
	?>
	
	
