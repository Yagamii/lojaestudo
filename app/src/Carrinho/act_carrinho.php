<?php
	//Instancia a classe carrinho
	$Carrinho = new Carrinho;
	
	//Se utiliza o switch para chamar funções especificas de acordo com o action
	switch(action){
		//Se for remover, executa a função para diminuir a quantidade ou remover produto do carrinho e carrega a pagina novamente com os numeros atualizados
		case 'remover':
			$Carrinho->removeProduto($_GET['id']);
			header("Location: index.php?page=carrinho");
		break;
		
		//Caso seja confirma
		case 'confirma':
			//Verifica se foi enviado o input hidden de nome confirma, caso positivo, faz a chamada para finalizar a compra
			if(isset($_POST['confirma']))
				$Carrinho->finalizaCompra();
		break;
	}

?>