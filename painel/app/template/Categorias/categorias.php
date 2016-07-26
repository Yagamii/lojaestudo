<?php
	//Faz a chamada do layout a ser utilizado no momento, podendo variar de acordo com a função desejada
	switch(action){
		//Caso a ação seja editar, ira fazer a chamada do layout da pagina editar, apresentando na pagina apenas informações referente a função desejada
		case 'editar':
			require_once('app/template/Categorias/editar.php');
		break;
		//Caso a ação seja apagar, ira apresentar o layout que é preparado para receber e tratar apenas essa informação
		case 'apagar':
			require_once('app/template/Categorias/apagar.php');
		break;
		//Por padrão vai ser chamado a aparencia geral, em que exibe todos os quadros necessarios na pagina
		default:
			require_once('app/template/Categorias/categoria.php');
		break;	
	}
?>