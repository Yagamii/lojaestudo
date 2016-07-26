<?php
	//Instancia a classe categorias para fazer uso dela e chamar suas funções
	$Categorias = new Categorias;
	//Faz a categoria receber o valor de todas categorias contidas no banco de dados
	$categoria = $Categorias->getCategorias();
	//Utilizado para buscar categoria de acordo com seu id
	$catId = $Categorias->getCategoriaPorId(@$_GET['id']);
	//Guarda informações na variavel como array, utilizando os dados da categoria que foi recuperada por id
	$catInfo = mysqli_fetch_array($catId, MYSQLI_ASSOC);
	
	//Utiliza alternancia da função switch para chamar a função necessaria
	switch(action){
		//Adiciona a categoria ao banco de dados
		case 'adicionar':
			$Categorias->addCategoria($_POST['categoria']);
		break;
		//Edita uma categoria ja existente e caso tudo esteja correto, retorna para pagina principal de categorias
		case 'editar':
			//Verifica se foi enviado o formulario de edição de categoria
			if(isset($_POST['editarCate'])){
				$Categorias->editCategoria($_GET['id'], $_POST['categoria']);
				
				header("Location: index.php?page=categorias");
			}
		break;
		//Apaga uma categoria a partir de sua id
		case 'apagar':
			//Verifica se foi enviado o formulario da pagina que confirma a exclusão da categoria
			if(isset($_POST['apagarCate'])){
				$Categorias->delCategoria($_GET['id']);
				
				header("Location: index.php?page=categorias");
			}
		break;
	}
?>