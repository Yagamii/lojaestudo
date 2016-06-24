<?php

	$categorias = new Categorias();
	$categoria = $categorias->getCategorias();
	
	switch(action){
		case 'listar':
			$produtos = $categorias->listCategoria($_GET['id']);
		break;
	}

?>