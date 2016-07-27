<?php
	//Classe responsavel por tratar todas funções referentes aos produtos do site
	class Produtos extends Padrao{
		//Recupera todos os produtos contidos no banco de dados, fazendo inner join com a tabela de categorias para recuperar o nome de cada categoria em que estão os produtos
		function getProdutos(){
			$q = "SELECT  * FROM produtos INNER JOIN categorias ON produtos.id_categoria=categorias.id_categoria ORDER BY produtos.nome_produto ASC";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
		//Recupera informações de todas categorias armazenadas no banco de dados
		function getCategorias(){
			$q = "SELECT * FROM categorias ORDER BY categoria ASC";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
		//Recupera uma contagem de quantos produtos estão contidos na categoria especifica, que é passada seu id por parametro
		function countCategoria($id){
			$q = "SELECT COUNT(id_produto) FROM produtos WHERE id_categoria='$id'";
			$r = $this->Dbc->query($q);
			
			$count = mysqli_fetch_array($r, MYSQLI_NUM);
			
			return $count[0];
		}
		//Adiciona um novo produto ao banco de dados, recebendo como parametro todas informações necessarias sobre o produto
		function addProduto($nome, $descricao, $categoria, $valor, $quantidade, $thumb){
			try{
				//Verifica se algum campo esta vazio, caso algum esteja, apresenta mensagem
				if(empty($nome) || empty($descricao) || empty($valor) || empty($quantidade))
					throw new Exception("Por favor, preencha corretamente todos os campos.");
		
				//Todos os campos utilizam a função verificarCampo para o dado ser tratado de forma que seja aceito pelo mysql
				$_nome = $this->verificarCampo($nome);
				$_descricao = $this->verificarCampo($descricao);
				$_valor = $this->verificarCampo($valor);
				$_quantidade = $this->verificarCampo($quantidade);
				
				//Consulta para verificar se ja existe um mesmo nome de produto
				$q = "SELECT * FROM produtos WHERE nome_produto='$_nome'";
				$r = $this->Dbc->query($q);
				//Caso retorne algum valor, apresenta imagem de aviso
				if(mysqli_num_rows($r) > 0)
					throw new Exception("Já existe um produto com esse nome.");
				
				//Verifica validade da imagem, irá verificar se ela esta no formato correto para ser aceita, caso não seja a função retorna false
				$_thumb = $this->verificarImagem($_FILES['imagem']['type'], $_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']);
				
				//Caso a variavel seja false, informa ao usuario que o arquivo esta num formato invalido
				if(!$_thumb)
					throw new Exception("Por favor, insira uma imagem válida.");
				
				//Efetua a inserção do novo produto ao banco de dados
				$q = "INSERT INTO produtos(nome_produto, descricao, id_categoria, valor, thumb, estoque) VALUES ('$_nome', '$_descricao', '$categoria', '$_valor', '$_thumb', '$_quantidade')";
				$r = $this->Dbc->query($q);
				
				MsgHandler::setSucess("Produto cadastrado com sucesso!");
				
			}catch(Exception $e){
				MsgHandler::setError($e->getMessage());
			}
		}
		//Retorna todas informações de um produto especifico, de acordo com a id passada por parametro
		function getProdutoPorId($id){
			$q = "SELECT * FROM produtos WHERE id_produto='$id'";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
		//Apaga um produto e seu arquivo de thumb, de acordo com a id que foi passada por parametro
		function delProduto($id){
			//Recupera o nome do arquivo que sera apagado
			$q = "SELECT thumb FROM produtos WHERE id_produto='$id'";
			$e = $this->Dbc->query($q);
			//Converte o dado recuperado para array
			$d = mysqli_fetch_array($e, MYSQLI_ASSOC);
			//Define o diretorio do arquivo que sera apagado
			$dir = '../app/template/Includes/thumb/'.$d['thumb'];
			//Apaga o arquivo no diretorio especificado
			unlink($dir);
			//Deleta o produto do banco de dados
			$q = "DELETE FROM produtos WHERE id_produto='$id'";
			$r = $this->Dbc->query($q);
			
			header("Location: index.php?page=produtos");
		}
		
	}

?>