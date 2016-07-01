<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo ucfirst(Fuseaction);?></title>
	<link rel="stylesheet" href="app/template/Layout/style.css" type="text/css" media="screen" />
</head>

<body>

<?php if(isset($_SESSION['id_usuario'])){ ?>

<div class="header-logo">
	<p>Megatron</p><span>PAINEL</span>
</div>
<div class="header">
	<ul>
    	<li><a href="index.php?page=login&action=logout">Logout</a></li>
        <li>Ola, <?php echo $_SESSION['usuario']; ?></li>
    </ul>
</div>

<div class="sidebar">
	<ul>
    	<li><a href="index.php?page=usuario">Usuario</a></li>
        <li><a href="index.php?page=categoria">Categoria</a></li>
        <li><a href="index.php?page=produto">Produto</a></li>
    </ul>
</div>

<?php 
				if(MsgHandler::getError()){
					foreach(MsgHandler::getError() as $erro){
						echo '<p class="error" align="center">'.$erro.'</p>';
					}
				}elseif(MsgHandler::getSucess()){
					foreach(MsgHandler::getSucess() as $sucess){
						echo '<p class="sucess" align="center">'.$sucess.'</p>';
					}
				}
				
				require_once("app/template/".ucfirst(Fuseaction)."/".strtolower(Fuseaction).".php");
				
    		?>
</div>
</div>
<?php }else{ 
	if(!isset($_GET['action'])){
		MsgHandler::verificarUsuario($_SESSION['id_usuario']);
	}
	
	if(MsgHandler::getError()){
					foreach(MsgHandler::getError() as $erro){
						echo '<p class="error" align="center">'.$erro.'</p>';
					}
				}elseif(MsgHandler::getSucess()){
					foreach(MsgHandler::getSucess() as $sucess){
						echo '<p class="sucess" align="center">'.$sucess.'</p>';
					}
				}
	
	require_once("app/template/".ucfirst(Fuseaction)."/".strtolower(Fuseaction).".php");?>
	
<?php }?>
</body>
</html>