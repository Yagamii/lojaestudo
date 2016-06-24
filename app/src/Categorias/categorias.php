<?php

	class Categorias extends Padrao{
		
		function getCategorias(){
			try{
				
				$q = "SELECT * FROM categorias ORDER BY categoria ASC";
				$r = $this->Dbc->query($q);
				
				if(mysqli_num_rows($r) < 1)
					throw new Exception("Não foi encontrado nenhuma categoria. :(");
				
				return $r;
				
			}catch(Exception $e){
				MsgHandler::setError($e->getMessage());
			}
		}
		
		function listCategoria($id){
			try{
				$q = "SELECT * FROM produtos WHERE id_categoria='$id'";
				$r = $this->Dbc->query($q);
				
				if(mysqli_num_rows($r) < 1)
					throw new Exception("Ainda não temos nenhum produto nessa categoria. :(");
				
				return $r;
			}catch(Exception $e){
				MsgHandler::setError($e->getMessage());
			}
			
		}
		
	}

?>