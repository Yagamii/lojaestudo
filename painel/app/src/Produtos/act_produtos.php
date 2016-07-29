<?php
	//Instancia a classe
	$Produtos = new Produtos;
	//Chamada a função para listagem de todos produtos
	$listaProdutos = $Produtos->getProdutos();
	//Faz a chamada da função para recuperar todas categorias
	$listaCategorias = $Produtos->getCategorias();
	//Recupera informações das categorias para exibir na area de estatisticas
	$numStats = $Produtos->getCategorias();
	//recupera informações de um produto especifico de acordo com seu id
	$produtoPorId = $Produtos->getProdutoPorId(@$_GET['id']);
	//Preenche a variavel com as informações do produto que foi recuperado na chamada de função anterior
	$nomePorId = mysqli_fetch_array($produtoPorId, MYSQLI_ASSOC);
	
	//Switch para distribuir chamada de funções de acordo com o action
	switch(action){
		//Caso action seja adicionar, chama a função para adicionar produtos e passando as informações de $_POST como parametro da função
		case 'adicionar':
			$Produtos->addProduto($_POST['nome'], $_POST['descricao'], $_POST['categoria'], $_POST['valor'], $_POST['quantidade']);
			header("Location: index.php?page=produtos");
		break;
		
		case 'editar':
			
			if(isset($_POST['editarProduto']))
				$Produtos->editarProduto($_GET['id'], $_POST['nome'], $_POST['descricao'], $_POST['categoria'], $_POST['valor'], $_POST['quantidade'], @$_POST['promo']);
			
		break;
		
		//Caso seja apagar, verifica se o form foi enviado, se sim ira chamar a função para deletar o produto do banco de dados
		case 'apagar':
			//verifica se o input hidden do formulario foi enviado
			if(isset($_POST['apagarProduto']))
				$Produtos->delProduto($_GET['id']);
		break;
	}

?>