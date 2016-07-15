<?php
	//Faz a chamada da pagina requisitada, apenas carrega a parte de layout necessaria
	switch(action){
		//Chama apenas a pagina com informações referente a edição de usuario
		case 'editar':
			require_once('app/template/Usuarios/editar.php');
		break;
		
		case 'apagar':
			//Apresenta o layout referente apenas a apagar um usuário
			require_once('app/template/Usuarios/apagar.php');
		break;
		
		default:
			//Apresenta todas informações diretamente na página
			require_once('app/template/Usuarios/usuario.php');
		break;
	}
?>