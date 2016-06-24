<?php
	//Instancia a classe e utiliza o switch para chamar o action
	$Cadastro = new Cadastro();
	
	switch(action){
		//chamada da função para cadastrar usuario
		case 'cadastrar':
			$Cadastro->cadastrar($_POST['nome'], $_POST['sobrenome'], $_POST['usuario'], $_POST['email'], $_POST['senha'], $_POST['csenha']);
		break;
	}

?>