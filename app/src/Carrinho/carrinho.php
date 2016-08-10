<?php
	//Responsavel por tratar de toda transição de dados referente a pagina do carrinho de compras
	class Carrinho extends Padrao{
		
		//Utilizado para recuperar informações de um produto de acordo com sua id
		function getProduto($id){
			//Query para recuperar apenas informações relevantes sobre o produto para o carrinho
			$q = "SELECT nome_produto, valor, descricao FROM produtos WHERE id_produto='$id'";
			$r = $this->Dbc->query($q);
			
			//Transforma a variavel em array para armazenas os dados retornados da consulta
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			
			//Retorna a array para quem chamou a função
			return $row;
		}
		
		//Responsavel pela remoção/redução de produtos no carrinho
		function removeProduto($id){
			//Reduz em 1 a quantidade do produto no carrinho
			$_SESSION['carrinho'][$id] -= 1;
			
			//Caso a array com o indice do produto esteja vazio, remove o mesmo do carrinho do usuario
			if(empty($_SESSION['carrinho'][$id]))
				unset($_SESSION['carrinho'][$id]);
		}
		
		//Finaliza a compra do usuário
		function finalizaCompra(){
			try{
				//Para cada produto dentro do carrinho, utiliza o id como indice e o valor contido nele como quantidade
				foreach($_SESSION['carrinho'] as $id => $qnt):
					
					//Query para recuperar apenas nome e quantidade do produto no banco de dados de acordo com indice/id
					$q = "SELECT nome_produto, estoque FROM produtos WHERE id_produto='$id'";
					$r = $this->Dbc->query($q);
					//Alimenta a variavel como array com os dados retornados
					$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
					//Caso o numero do estoque esteja abaixo de 1, para o funcionamento da função e exibe mensagem com nome do produto que esta em falta
					if($row['estoque'] < 1)
						throw new Exception("Desculpe, mas o produto ".$row['nome_produto']." está esgotado.");
					
					//Caso não pare em nenhuma falta no estoque, faz o update das quantidades após a compra
					$q = "UPDATE produtos SET estoque = estoque-'$qnt' WHERE id_produto='$id'";
					$r = $this->Dbc->query($q);
					
				endforeach;
				
				//Apos encerrar o foreach, apaga tudo que estava contido no carrinho do usuario
				unset($_SESSION['carrinho']);	
			
			//Caso pare em um throw, pula para o catch e exibe mensagem de erro pela função da classe estatica	
			}catch(Exception $e){
				MsgHandler::setError($e->getMessage());
			}
		}
	}

?>