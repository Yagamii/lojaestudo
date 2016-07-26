<?php
	//Classe responsavel por tratar de todos os dados no painel referente a categorias
	class Categorias extends Padrao{
		
		//Responsavel por recuperar todas as categorias contidas no banco de dados
		function getCategorias(){
			$q = "SELECT * FROM categorias";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
		
		//Recupera informações de uma categoria especifica de acordo com o id passado por parametro
		function getCategoriaPorId($id){
			$q = "SELECT * FROM categorias WHERE id_categoria='$id'";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
		
		//Adiciona uma nova categoria ao banco de dados, recebendo apenas o nome da mesma como parametro
		function addCategoria($nome){
			try{
				//Verifica se o campo de nome da categoria não esta vazio
				if(empty($nome))
					throw new Exception("Por favor, insira um nome de categoria.");
				
				//Utiliza a função verificarCampo para analisar o nome inserido e valida-lo de forma que seja aceito pelo mysql
				$_nome = $this->verificarCampo($nome);				
				
				//Faz uma consulta procurando outra categoria com o mesmo nome da que esta tentando ser cadastrada
				$q = "SELECT * FROM categorias WHERE categoria='$_nome'";
				$r = $this->Dbc->query($q);
				
				//Caso seja encontrado algum valor com o mesmo nome, apresenta mensagem informando
				if(mysqli_num_rows($r) > 0)
					throw new Exception("Categoria já cadastrada.");
				
				//Caso não seja encontrado problemas, insere os dados da categoria no banco de dados
				$q = "INSERT INTO categorias(categoria) VALUES ('$_nome')";
				$r = $this->Dbc->query($q);
				
				//Utiliza a função da classe estatica para mostrar uma mensagem de sucesso do cadastro
				MsgHandler::setSucess("Categoria cadastrada com sucesso!");
			}catch(Exception $e){
				//Utiliza a função da classe estatica para mostrar mennsagem de erro, caso ocorra de parar em um throw na execução
				MsgHandler::setError($e->getMessage());
			}
		}
		//Edita uma categoria, recebendo como parametro id e nome da categoria, nome sera o novo nome e id para localizar a categoria a ser alterada
		function editCategoria($id, $nome){
			try{
				//Caso campo seja enviado vazio, apresentara mensagem
				if(empty($nome))
					throw new Exception("Por favor, não deixe o campo em branco.");
				
				//Verificação do nome de acordo com padrões aceitos pelo mysql
				$_nome = $this->verificarCampo($nome);
				
				//Consulta para verificar se o nome inserido já não esta sendo utilizado por outra categoria
				$q = "SELECT * FROM categorias WHERE categoria = '$_nome'";
				$r = $this->Dbc->query($q);
				
				//Se retornar algum valor, apresenta aviso
				if(mysqli_num_rows($r) > 0)
					throw new Exception("Este nome já esta sendo utilizado.");
				
				//faz a atualização das informações no banco de dados
				$q = "UPDATE categorias SET categoria='$_nome' WHERE id_categoria='$id'";
				$r = $this->Dbc->query($q);
				
			}catch(Exception $e){
				//Tratamento de erro, entra no catch caso algum throw seja ativado e apresenta erro ao usuario
				MsgHandler::setError($e->getMessage());
			}
		}
		
		//Deletar categoria de acordo com id passado por parametro
		function delCategoria($id){
			$q = "DELETE FROM categorias WHERE id_categoria='$id'";
			$r = $this->Dbc->query($q);
		}
	}
?>