<?php
	//Instancia a classe usuarios
	$Usuarios = new Usuarios();
	//Armazena na variavel as informações de todos usuarios contidos no banco de dados
	$Usuario = $Usuarios->getUsuarios();
	
	//Armazena quantidade de usuarios de nivel comum
	$comuns = $Usuarios->getUsers();
	//Armazena quantidade de usuarios de nivel vendedor
	$vendedores = $Usuarios->getVendedores();
	//Armazena quantidade de usuarios de nivel admin
	$admins = $Usuarios->getAdmins();
	
	//Armazena informações de um usuario especifico, a partir de sua id
	$infos = $Usuarios->getUserInfo(@$_GET['id']);
	//Passa informações guardadas na variavel acima para uma array, podendo ser acessada por associação, de acordo com nome das colunas do banco de dados
	$_infos = mysqli_fetch_array($infos, MYSQLI_ASSOC);
	
	//Verifica action caso setado, para que seja executado alguma função
	switch(action){
		//Faz a chamada da função para adicionar um novo usuario de nivel administrador
		case 'adicionar':
			$Usuarios->addAdmin($_POST['nome'], $_POST['sobrenome'], $_POST['usuario'], $_POST['email'], $_POST['senha']);
		break;
		//Chamada quando acessado pagina de editar
		case 'editar':
			//Armazena todos os niveis de usuario diferente para ser utilizado na pagina
			$nivel = $Usuarios->getNiveis();
			//Caso seja enviado o formulario para editar o usuario, faz a chamada da função para enviar novos dados
			if(isset($_POST['alterar']))
			$Usuarios->editUsuario($_GET['id'], @$_POST['nome'], @$_POST['sobrenome'], @$_POST['usuario'], @$_POST['email'], @$_POST['nivel']);
		break;
		//Faz a chamada da função de deletar usuario de acordo com o id definido e enviado no form da pagina
		case 'apagar':
			if(isset($_POST['apagar'])):
				$Usuarios->delUsuario($_GET['id']);
				header("Location: index.php?page=usuarios");
			endif;
		break;
	}
?>