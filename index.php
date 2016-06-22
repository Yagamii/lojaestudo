<?php
	/*
		Site de loja genérico feito para testes
		utilizando metodo "meio mvc" para organização de pastas
	*/
	
	//chamada de arquivo de conexão de banco de dados e classe padrão
	require('app/config/connect.php');
	require('app/src/default.php');
	
	//Utilizar fuseaction para melhor funcionamento do site, direcionando melhor a url
	define("Fuseaction", $_REQUEST['page']);
	//action sera definido e utilizado para chamar uma ação da classe exibida
	@define("action", $_REQUEST['action']);
	
	//Se não estiver definido, alterar para home automaticamente
	if(!Fuseaction){
		header("Location: index.php?page=home");
	}
	
	//Chamada de classe estatica para melhor tratamento de mensagens de erro e sucesso
	require_once('app/src/MsgHandler.php');
	
	session_start();
	
	//Chamada de arquivo de classe do fuseaction(pagina) que foi definido
	require_once("app/src/".ucfirst(Fuseaction)."/".strtolower(Fuseaction).".php");
	//Chamada do arquivo de act que instancia a classe ja definida no fuseaction(pagina)
	require_once("app/src/".ucfirst(Fuseaction)."/act_".strtolower(Fuseaction).".php");
	
	//Chamada de layout padrão de todo o site
	require_once("app/template/layout/layout.php");
	
	
?>