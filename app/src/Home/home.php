<?php
	//Classe da pagina inicial da loja, por enquanto contendo função para chamar todos produtos do banco de dados
	class Home extends Padrao{
		
		function getProdutos(){
			try{
				$q = "SELECT * FROM produtos";
				$r = $this->Dbc->query($q);
				
				if(mysqli_num_rows($r) < 1)
					throw new Exception("Não foi encontrado nenhum produto");
					
				return $r;
			}catch(Exception $e){
				MsgHandler::setError($e->getMessage);
			}
		}
	}

?>
