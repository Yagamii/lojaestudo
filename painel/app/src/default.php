<?php
	//Classe padrão assim como para pagina normal, sera utilizada para auxiliar na conexão ao banco de dados
	//Alem de conter funções de uso comum
	class Padrao{
		public $Dbc;
		//Construct para efetuar conexão ao banco de dados e guarda-la na variavel $Dbc da classe padrao
		public function __construct(){
			$connect = new Connect;
			$this->Dbc = $connect->connectToDb();
		}
		//Função para verificar e ajustar os dados inseridos para serem aceitos pelo mysqli
		public function verificarCampo($dado){
			$_dado = @mysqli_real_escape_string($this->Dbc->getConnection(), $dado);
			
			return $_dado;
		}
		//Verificar se a imagem inserida esta no formato correto e aceito
		public function verificarImagem($imagem, $name, $tpmname){
			$permitido = array('image/jpeg', 'image/jpg', 'image/JPG', 'image/png', 'imagem/PNG');
				
				//Verifica se o formato da imagem upada corresponde aos formatos inseridos na array
				if(in_array($imagem, $permitido)){					
					
					//Tenta mover o arquivo de nome temporario para seu diretorio
					if(move_uploaded_file($tpmname, "../app/template/includes/uploads/thumb/".$name."")){
						
						//Caso bem sucessido, retorna para variavel que chamar a função o nome do arquivo que foi upado
						return $name;
					}
				}else{
					
				//caso o formato do arquivo upado não esteja dentro da array, retornara falso, definindo assim que o formato do arquivo é invalido
				return false;
				}
		}
		
	}
	
?>