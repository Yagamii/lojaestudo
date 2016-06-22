<?php
	//Instancia a classe login, para fazer chamadas de funções da classe como logar e logout
	$Login = new Login;
	
	switch(action){
		case 'logar':
			$Login->logar($_POST['user'], $_POST['pass']);
		break;
		case 'logout':
			$Login->logout();
		break;
	}
?>