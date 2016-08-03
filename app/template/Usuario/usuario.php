<?php
	//Switch para fazer chamada da pagina a ser exibida de acordo com o action
	switch(action){
		//Caso editar, chama o template da pagina de editar
		case 'editar':
			require_once("app/template/Usuario/editar.php");
		break;
	}

?>