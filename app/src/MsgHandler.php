<?php
	/*
		Classe estatica para manipular mensagens de erro e sucesso para todo o site
	*/
	class MsgHandler{
		static $error = [];
		static $sucess = [];
		
		public static function getError(){
			return self::$error;
		}
		
		public static function setError($erro){
			self::$error[] = $erro;
		}
		
		public static function getSucess(){
			return self::$sucess;
		}
		
		public static function setSucess($sucesso){
			self::$sucess[] = $sucesso;
		}
	}

?>