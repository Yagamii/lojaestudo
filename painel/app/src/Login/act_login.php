<?php
	//Instanciar a classe login
	$Login = new Login;
	
	//Verifica o switch definido na pagina
	switch(action){
		//Caso seja logar, chama a função da classe para efetuar login do usuario, passando informações de user e senha inseridos para que a classe trate os dados, consultando no banco de dados se eles são validos
		case 'logar':
			$Login->logar($_POST['usuario'], $_POST['senha']);
		break;
		
		//Caso seja logout, efetua o logout do usuario e o joga para a pagina de login novamente
		case 'logout':
			$Login->logout();
		break;
	}

?>