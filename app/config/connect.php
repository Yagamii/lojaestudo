<?php
	/*
		Classe de conexão do banco de dados
	*/
	class Connect{
		
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db = "phploja";
		private $connection;
		
		protected function getHost(){ return $this->host;}
		protected function getUser(){ return $this->user;}
		protected function getPass(){ return $this->pass;}
		protected function getDb(){ return $this->db;}
		
		//A função faz o atributo $connection receber a conexão correta ao banco e logo após retora a própria classe
		//Deste modo a variavel que faz a chamada dessa função trabalha como a própria classe, podendo assim utilizar outras funções da classe, mas ainda mantém os dados de conexão seguros
		public function connectToDb(){
			$this->connection = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getDb());
			return $this;
		}
		
		public function query($query){
			return mysqli_query ($this->connection, $query);
		}
		
		function getConnection(){
			return $this->connection;
		}
	}

?>