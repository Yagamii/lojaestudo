<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php 
				//Utiliza o a pagina do Fuseaction para alterar o titulo da pagina no navegador
				echo ucfirst(Fuseaction);
			?>
    </title>
	<link rel="stylesheet" href="app/template/Layout/style.css" type="text/css" media="screen" />
</head>

<body>
	<div id="header">
		<h1>Mercatron</h1>
		<h2>Apenas para testes</h2>
	</div>
	<div id="navigation">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="index.php?page=promocoes">Promoções</a></li>
            <li><a href="index.php?page=categorias">Categorias</a></li>
			<li><a href="index.php?page=cadastro">Cadastro</a></li>
			<li><?php if(isset($_SESSION['id_usuario'])){
            			echo '<div class="dropdown"><a href="#"><div class="dropbtn">'.$_SESSION['usuario'].'</div></a>
								<div class="dropdown-content">';
									if($_SESSION['id_nivel'] == 3){
										echo '<a href="painel/index.php?page=home">Admin</a>';
									}
									echo '
									<a href="index.php?page=carrinho&id='.$_SESSION['id_usuario'].'">Carrinho</a>
									<a href="index.php?page=usuario&action=editar&id='.$_SESSION['id_usuario'].'">Editar dados</a>
									<a href="index.php?page=login&action=logout">Logout</a>
								</div>
								</div>';
						}else{ 
						echo '<a href="index.php?page=login">Login</a>';
						}
                        ?></li>
		</ul>
	</div>
    	<div id="content">
    		<?php 
				//Classe estatica sempre verificada para reconhecer mensagem de errou ou sucesso
				if(MsgHandler::getError()){
					foreach(MsgHandler::getError() as $erro){
						echo '<p class="error" align="center">'.$erro.'</p>';
					}
				}elseif(MsgHandler::getSucess()){
					foreach(MsgHandler::getSucess() as $sucess){
						echo '<p class="sucess">'.$sucess.'</p>';
					}
				}
				//Chamada para o layout da pagina chamada do Fuseaction
				require_once("app/template/".ucfirst(Fuseaction)."/".strtolower(Fuseaction).".php");
				
    		?>
    	</div>
    <div id="footer">
    </div>
</body>
</html>