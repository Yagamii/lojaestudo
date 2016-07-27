<?php
	//Verifica pagina que sera carregada de acordo com a chamada sobre produtos
	switch(action){
		//Apresenta layout da pagina de editar
		case 'editar':
			require_once("app/template/Produtos/editar.php");
		break;
		//Apresenta layout da pagina de apagar
		case 'apagar':
			require_once("app/template/Produtos/apagar.php");
		break;
		//Por padrao apresenta layout de todas informações de produtos
		default:
			require_once("app/template/Produtos/produto.php");
		break;
	}

?>