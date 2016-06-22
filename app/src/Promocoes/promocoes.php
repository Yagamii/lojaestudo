<?php

	class Promocoes extends Padrao{
		
		function getPromocoes(){
			try{
				$q = "SELECT * FROM produtos WHERE promo='1'";
				$r = $this->Dbc->query($q);
				
				if(mysqli_num_rows($r) < 1)
					throw new Exception("Nenhum produto está em promoção no momento!");
					 
				return $r;
				
			}catch(Exception $e){
				MsgHandler::setError($e->getMessage());
			}
		}
		
	}

?>