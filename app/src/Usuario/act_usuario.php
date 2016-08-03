<?php
	//Instancia a classe usuario
	$Usuario = new Usuario;
	//Passa para a variavel dados, o que for retornado da função chamada para recuperar dados do usuario a ser editado
	$dados = $Usuario->getUsuarioPorId($_GET['id']);
	//Swtich para verificar qual ação será executada
	switch(action){
		//Caso seja editar, verifica se foi enviado formulario de alteração, caso tenha enviado, faz a chamada da função
		case 'editar':
			if(isset($_POST['editarUsuario']))
			$Usuario->editarUsuario($_GET['id'], $_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['senha'], $_POST['csenha']);
		break;
	}
?>