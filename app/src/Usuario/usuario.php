<?php
	//Classe responsavel pelo controle de dados do usuario logado
	class Usuario extends Padrao{
		//Receber dados do usuario de acordo com o id passado por parametro
		function getUsuarioPorId($id){
			//Query de consulta de usuarios de acordo com id
			$q = "SELECT * FROM usuarios WHERE id_usuario='$id'";
			$r = $this->Dbc->query($q);
			
			//Transforma a variavel em array com os dados recuperados na consulta
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			
			//Retorna a array para quem fez a chamada da função
			return $row;
		}
		//Altera as informações de cadastro do usuario
		function editarUsuario($id, $nome, $sobrenome, $email, $senha, $csenha){
			try{
				//Verifica se algum dos campos necessarios estão vazios, caso esteja, alerta o usuario
				if(empty($nome) || empty($sobrenome) || empty($email))
					throw new Exception("Por favor, preencha todos os campos corretamente.");
				
				//Verifica se os campos de senha e confirmação estão vazios, caso estejam, faz a variavel de $s ser falsa, caso não estejam, a variavel se torna verdadeira
				if(empty($senha) && empty($csenha)):
					$s = FALSE;
				else:
					$s = TRUE;
				endif;
				
				//Faz a chamada da função veriCampo para verificar e alterar caso necessario os dados inseridos para que seja aceito pelo mysql
				$_nome = $this->veriCampo($nome);
				$_sobrenome = $this->veriCampo($sobrenome);
				$_email = $this->veriCampo($email);
				
				//Caso os campos de senha e confirmação tenham dados diferentes, avisar ao usuario
				if($senha != $csenha)
					throw new Exception("Senhas não coincidem, favor verificar.");
				
				//Caso a variavel $s seja verdadeira, criptografa a senha em md5 e armazena na variavel
				if($s = TRUE)
					$_senha = md5($senha);
				
				//Query que verifica se ja existe um email igual no banco de dados e seja diferente do usuario editado no momento
				$q = "SELECT * FROM usuarios WHERE email='$_email' AND id_usuario!='$id'";
				$r = $this->Dbc->query($q);
				
				//Caso retorne mais de um valor, avisa ao usuario que o email já esta sendo utilizado por outro usuario
				if(mysqli_num_rows($r) > 0)
					throw new Exception("Email já utilizado por outro usuário.");
				//Caso a variavel $s seja verdadediro, passa a query de update com a senha inserida
				if($s = TRUE):
					$q = "UPDATE usuarios SET nome='$_nome', sobrenome='$_sobrenome', email='$_email', pass='$_senha' WHERE id_usuario='$id'";
				//Caso seja falso, passa a query dando update nos dados, menos na senha
				else:
					$q = "UPDATE usuarios SET nome='$_nome', sobrenome='$_sobrenome', email='$_email' WHERE id_usuario='$id'";
				endif;
				
				//Faz a consulta da query no banco de dados
				$r = $this->Dbc->query($q);
				
			}catch(Exception $e){
				//Classe estatica para tratar a mensagem de erro
				MsgHandler::setError($e->getMessage());
			}
		}
	}

?>