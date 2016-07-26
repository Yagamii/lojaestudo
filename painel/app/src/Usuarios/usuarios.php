<?php
	//Classe de usuarios, responsavel por tratar toda informação que transita pela area de usuarios do painel
	//Fazendo verificações, consultas, atualizações e exclusões de dados
	class Usuarios extends Padrao{
		
		//Recupera todos os dados de todos usuarios, concatenando o nome e sobrenome com um espaço entre eles e dando o alias de nometodo, ajustado também melhor formato de exibição de data
		//Fazendo inner join com a tabela de niveis de usuario para recuperar tal informação para se exibir na tabela de todos usuarios
		function getUsuarios(){
			$q = "SELECT *, CONCAT_WS(' ', `nome`, `sobrenome`) AS nometodo, DATE_FORMAT(u.data_registro, '%d/%b/%Y %H:%i') AS data FROM usuarios AS u INNER JOIN nivel_usuario ON u.id_nivel = nivel_usuario.id_nivel ORDER BY u.data_registro ASC";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
		
		//Todas funções para recuperar quantidade são utilizadas apenas na estatistica mostrada na pagina de usuarios
		//Recupera quantidade de usuarios que tem nivel de usuario comum
		function getUsers(){
			$q = "SELECT COUNT(id_usuario) FROM usuarios WHERE id_nivel = '1'";
			$r = $this->Dbc->query($q);
			
			//Utiliza dado recuperado do banco de dados e o armazena em uma array, podendo ser acessada de forma numerica
			$row = mysqli_fetch_array($r, MYSQLI_NUM);
			return $row[0];
		}
		
		//Recupera quantidade de usuarios que tem nivel de usuario de vendedor
		function getVendedores(){
			$q = "SELECT COUNT(id_usuario) FROM usuarios WHERE id_nivel = '2'";
			$r = $this->Dbc->query($q);
			
			$row = mysqli_fetch_array($r, MYSQLI_NUM);
			return $row[0];
		}
		
		//Recupera quantidade de usuarios que tem nivel de administrador
		function getAdmins(){
			$q = "SELECT COUNT(id_usuario) FROM usuarios WHERE id_nivel = '3'";
			$r = $this->Dbc->query($q);
			
			$row = mysqli_fetch_array($r, MYSQLI_NUM);
			return $row[0];
		}
		
		//Função para adicionar diretamente um usuário como administrador, feito cadastro direto do painel
		function addAdmin($nome, $sobrenome, $usuario, $email, $senha){
			try{
				//Verifica se algum campo esta vazio
				if(empty($nome) || empty($sobrenome) || empty($usuario) || empty($email) || empty($senha))
					throw new Exception("Por favor, preencha todos os dados corretamente");
				
				//Dados tratados pela função de verificarCampo, tratando dados inseridos e os modificando de modo que sejam aceitos pelo sql
				$_nome = $this->verificarCampo($nome);
				$_sobrenome = $this->verificarCampo($sobrenome);
				$_usuario = $this->verificarCampo($usuario);
				$_email = $this->verificarCampo($email);
				//Criptografa senha inserida em md5
				$_senha = md5($senha);
				
				//Faz busca no banco de dados para verificar se já existe algum usuário utilizando o nome de usuario inserido no cadastro
				$q = "SELECT usuario FROM usuarios WHERE usuario='$_usuario'";
				$r = $this->Dbc->query($q);
				
				//Caso retorne 1 valor ou mais, informa que o nome de usuário ja esta cadastrado no sistema
				if(mysqli_num_rows($r) >= 1)
					throw new Exception("Nome de usuário já cadastrado!");
				
				//Efetua busca para verificar se email inserido no cadastro ja esta sendo utilizado por outro usuario
				$q = "SELECT email FROM usuarios WHERE email='$_email'";
				$r = $this->Dbc->query($q);
				
				//Caso retorne 1 email ou mais, informa que email inserido ja esta sendo utilizado por outro usuario
				if(mysqli_num_rows($r) >= 1)
					throw new Exception("Email já cadastrado!");
				
				//Caso não tenha encontrado nenhum problema e parando em um throw, prossegue para inserir os valores do cadastro na tabela de usuarios do banco de dados
				$q = "INSERT INTO usuarios(nome, sobrenome, usuario, email, pass, data_registro, id_nivel) VALUES ('$_nome', '$_sobrenome', '$_usuario', '$_email', '$_senha', NOW(), 3)";
				$r = $this->Dbc->query($q);
				
				//Utiliza uma função da classe estatica para exibir mensagem de sucesso
				MsgHandler::setSucess("Cadastro de Admin feito com sucesso!");
			}catch(Exception $e){
				//Caso tenha parado com erro em um throw, entra no catch e utiliza a classe estatica para definir mensagem de erro
				MsgHandler::setError($e->getMessage());
			}
		}
			
			//Recupera informações de um usuario especifico, de acordo com id inserida como parametro
			function getUserInfo($id){
				$q = "SELECT * FROM usuarios WHERE id_usuario='$id'";
				$r = $this->Dbc->query($q);
				
				//retorna valores consultados no banco de dados
				return $r;
			}
			
			//Recupera todos os dados relacionado aos niveis de usuario contidos no banco de dados
			function getNiveis(){
				$q = "SELECT * FROM nivel_usuario";
				$r = $this->Dbc->query($q);
				
				//Retorna todas informações consultadas
				return $r;
			}
			
			//Edita dados de um usuário especifico, sendo passado por parametro todas informações contidas no formulario e mais o id do usuario
			function editUsuario($id, $nome, $sobrenome, $usuario, $email, $nivel){
				try{
					//Faz todas variaveis passarem pela função para verificar campo e modifica-los para que sejam aceitos no banco de dados
					$_nome = $this->verificarCampo($nome);
					$_sobrenome = $this->verificarCampo($sobrenome);
					$_usuario = $this->verificarCampo($usuario);
					$_email = $this->verificarCampo($email);
					
					//Faz consulta para verificar se algum usuario utiliza o nome de usuario inserido e que não seja o usuario que estamos modificando no momento
					$q = "SELECT usuario FROM usuarios WHERE usuario='$_usuario' AND id_usuario!='$id'";
					$r = $this->Dbc->query($q);
					
					//Caso retorne 1 valor ou mais, para a função com o throw e informa que o nome de usuario ja esta sendo utilizado por outro usuario
					if(mysqli_num_rows($r) >= 1)
						throw new Exception("Nome de usuário já cadastrado!");
					
					//Semelhante ao anterior, verifica se email é utilizado por outro usuario sem ser o que esta sendo modificado no momento
					$q = "SELECT email FROM usuarios WHERE email='$_email' AND id_usuario!='$id'";
					$r = $this->Dbc->query($q);
				
					//Se retornar 1 ou mais valores, encerra função com o throw e informa mensagem de erro
					if(mysqli_num_rows($r) >= 1)
						throw new Exception("Email já cadastrado!");
					
					//Caso função não tenha sido enterrompida em nenhum throw, faz o update das informações do usuário no banco de dados
					$q = "UPDATE usuarios SET nome='$_nome', sobrenome='$_sobrenome', usuario='$_usuario', email='$_email', id_nivel='$nivel' WHERE id_usuario='$id'";
					$r = $this->Dbc->query($q);
					
					//Utiliza função da classe estatica para informar sucesso na alteração
					MsgHandler::setSucess("Alterações realizadas com sucesso!");
					
					//Caso execute algum throw, sera jogado para o catch do codigo, parando o restante da execução e exibindo mensagem de erro
				}catch(Exception $e){
					MsgHandler::setError($e->getMessage());
				}
			}
			
			//Executa exclusão de usuario de acordo com a id que foi passada como parametro
			function delUsuario($id){
				$q = "DELETE FROM usuarios WHERE id_usuario='$id'";
				$r = $this->Dbc->query($q);
			}
			
	}

?>