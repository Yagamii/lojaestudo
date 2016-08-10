<?php
	//Instancia a classe produto
	$Produto = new Produto;
	//Recebe o valor retornado da chamada de função, armazenando já todas informações do produto que foi passado como array
	$dadosProduto = $Produto->getProdutoPorId($_GET['id']);
	//Recebo o valor retornado da chamada de função, armazenando os dados da consulta
	$comentario = $Produto->getComentarios($_GET['id']);
	
	//Switch para verificar chamadas de funções de acordo com o action
	switch(action){
		//Addcarrinho adiciona a quantidade de produtos que o usuario desejar ao seu carrinho
		case 'addcarrinho':
			//Verifica se o input hidden foi enviado do form que acompanha o botão que executa a ação de adicionar ao carrinho
			if(isset($_POST['addCarrinho']))
				$Produto->addCarrinho($_GET['id'], $_POST['quantidade']);
		break;
		//Caso comentar, vai fazer a chamada da função para adicionar um novo comentario do usuario
		case 'comentar':
			//Verifica o input hidden do form de comentar
			if(isset($_POST['addcomentario']))
				$Produto->addComentario($_GET['id'], $_SESSION['id_usuario'], $_POST['comentario']);
		break;
		//Caso delcomentario, apenas apaga direto o comentario selecionado pelo admin para ser apagado
		case 'delcomentario':
			$Produto->delComentario($_GET['cid']);
		break;
	}
?>