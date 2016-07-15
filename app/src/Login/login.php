<?php
	/*
		Classe destinada a tratar qualquer informação referente ao login
		Função de logar efetua a criação de sessão
	*/
	class Login extends Padrao{
		
		function logar($user, $pass){
			try{
				//A função primeiro trata ambos dados inseridos, verificando texto com o escape_string para verificar se o mysql vai aceitar o dado
				$_user = $this->veriCampo($user);
				
				//A senha como é codificada em md5, não tem tanta necessidade ser tratada
				$_pass = md5($pass);
				
				//Caso um dos dois dados retorne como falso ou null, aprensetar mensagem para usuario preencher todas corretamente
				if(!$_user or !$_pass)
					throw new Exception("Por favor, preencha todos os campos.");
				
				//Consulta para verificar login, o usuario podendo ser um nome ou o email e sua senha
				$q = "SELECT * FROM usuarios WHERE usuario='$_user' OR email='$_user' AND pass='$_pass' LIMIT 1";
				$r = $this->Dbc->query($q);
				
				//Caso não retorne nenhuma linha, diz ao usuario que as informações não foram encontradas
				if(mysqli_num_rows($r) < 1)
					throw new Exception("As informações inseridas não coincidem, por favor tente novamente!");
				
				//Alimenta a variavel com os dados do usuario que efeturou login para joga-las na variavel de sessao
				$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
				
				$_SESSION['id_usuario'] = $row['id_usuario'];
				$_SESSION['usuario'] = $row['usuario'];
				$_SESSION['id_nivel'] = $row['id_nivel'];
				
				//Após logar, joga o usuario de volta a pagina inicial
				header("Location: index.php");
				
			}catch(Exception $e){
				MsgHandler::setError($e->getMessage());
			}
		}
		//Função apenas para deslogar, destruindo a sessão e retornando usuario para a pagina inicial
		function logout(){
			$_SESSION = array();
			session_destroy;
			
			header("Location: index.php");
		}
	}

?>