<?php
	/*
		Classe de funções padrões para ser utilizado em todo o site
	*/
	class Padrao{
		public $Dbc;
		/*Construct para facilitar o uso de conexões ao banco de dados
		Ele instancia a classe Connect e da ao atributo Dbc a função de representar a classe Connect
		Assim facilitando o uso em qualquer função de classe, ja que todas são filhas de Padrao
		*/
		public function __construct(){
			$Connect = new Connect;
			$this->Dbc = $Connect->connectToDb();
		}
	}

?>