<?php
	//Tratar dos dados referente a pagina do produto
	class Produto extends Padrao{
		//Recura informações de um produto a partir do seu id passado como parametro
		function getProdutoPorId($id){
			//Consulta selecionando todos os dados da tabela produto, onde o id do produto é igual ao q foi passado por parametro
			$q = "SELECT * FROM produtos WHERE id_produto='$id'";
			$r = $this->Dbc->query($q);
			
			//Passa todos os dados recuperados para a variavel como uma array
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			
			//Retorna para a chamada da função a array $row, com dados do produto
			return $row;
		}
		
		//Adiciona produto ao carrinho, passando por parametro a id do produto e a quantidade a ser adicionada
		function addCarrinho($id, $quantidade){
			//Caso não tenha sido definido ainda a sessao de carrinho, cria a variavel como arrray
			if(!isset($_SESSION['carrinho']))
			$_SESSION['carrinho'] = array();
			
			//Recebe o valor inteiro do id passado por parametro
			$_id = intval($id);
			//Caso não tenha sido definido um valor pra posição da array de acordo com o id, o define com a quantidade passada por parametro
			if(!isset($_SESSION['carrinho'][$_id])):
				$_SESSION['carrinho'][$_id] = $quantidade;
			//Caso ja tenha sido definido um valor, apenas vai somar a nova quantidade, com a anterior
			else:
				$_SESSION['carrinho'][$_id] += $quantidade;
			endif;
		}
		
		//Adicionar comentario a um produto, passando por parametro o id do produto, o id do usuario q comentou e o comentario
		function addComentario($idProduto, $idUsuario, $comentario){
			try{
				//Caso o campo do comentario esteja vazio, avisa ao usuario
				if(empty($comentario))
					throw new Exception("Por favor, não deixe o campo de comentário vazio.");
				
				//Utiliza função para verificar se dados do comentario serao aceitos pelo mysql
				$_comentario = $this->veriCampo($comentario);
				
				//query para inserir os dados no banco de dados
				$q = "INSERT INTO comentarios(id_usuario, mensagem, id_produto, data_comentario) VALUES ('$idUsuario', '$_comentario', '$idProduto', NOW())";
				$r = $this->Dbc->query($q);
			
			//Caso entre em um throw new Exception, pula direto para o catch	
			}catch(Exception $e){
				//Chama a função da classe estatica para apresentar mensagem de erro
				MsgHandler::setError($e->getMessage());
			}
		}
		
		//Recebe todos os comentarios de um produto especifico, de acordo com o id do produto que é passado por parametro 
		function getComentarios($id){
			//Query para recuperar comentarios, utiliando date_formate para ajustar o formato q a data sera apresentado
			//Utiliza Inner Join para ligar o campo id_usuario, para que retorne o nome do usuario que fez o comentario
			$q = "SELECT *, DATE_FORMAT(comentarios.data_comentario, '%k:%i - %d/%m/%Y') AS data FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario=usuarios.id_usuario WHERE comentarios.id_produto='$id'";
			$r = $this->Dbc->query($q);
			
			//Retorna diretamente o valor que foi retornado da consulta
			return $r;
		}
		
		//Deleta um comentario de acordo com o id do comentario passado por parametro
		function delComentario($id){
			//Query para deletar o comentario do banco de dados de acord com o id passado
			$q = "DELETE FROM comentarios WHERE id_comentario='$id'";
			//Executa a query no mysql
			$r = $this->Dbc->query($q);
		}
	}

?>