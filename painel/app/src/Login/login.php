<?php
	//classe para manipular login no painel de administradores
	class Login extends Padrao{
		//Verifica usuario e senha inseridos, para fazer sua autenticação de acordo com registros do banco de dados
		function logar($usuario, $senha){
			try{
				
				//Variável recebe o valor retornado da função verificarCampo, para verificar e transformar dado num formato aceito pelo mysql
				$_usuario = $this->verificarCampo($usuario);
				
				//Variável recebe o valor da senha criptografada em md5
				$_senha = md5($senha);
				
				//Caso um dos campos esteja vazio ou retorne como false, exibe o aviso
				if(!$_usuario or !$_senha)
					throw new Exception("Por favor, preencha todos os campos.");
				
				//Consulta com os dados inseridos pelo usuario para efetuar login	
				$q = "SELECT * FROM usuarios WHERE usuario='$_usuario' AND pass='$_senha' LIMIT 1";
				
				//Chama função para executar a query no banco de dados
				$r = $this->Dbc->query($q);
				
				//Se o valor retornado for zero, exibe aviso ao usuario
				if(mysqli_num_rows($r) < 1)
					throw new Exception("Combinação de usuário e senha incorreta, por favor tente novamente!");
				
				//preenche a variavel $row como um array, inserindo os dados retornados do banco de dados q podem ser consultador por meio se associação com $row['campo']
				$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
				
				//Se o campo de nivel do usuario que se logou for abaixo do exigido como admin, apresentara advertencia
				if($row['id_nivel'] < 3)
					throw new Exception("Você não tem permissão para acessar essa pagina");
				
				//Define informações do usuario na sessão
				$_SESSION['id_usuario'] = $row['id_usuario'];
				$_SESSION['usuario'] = $row['usuario'];
				$_SESSION['id_nivel'] = $row['id_nivel'];
				
				//Move o usuario logado para pagina inicial do painel
				header("Location: index.php?page=home");
				
				//Catch é ativado caso algum throw seja executado
			}catch(Exception $e){
				//Utiliza a função da classe estatica para definir o erro obtido
				MsgHandler::setError($e->getMessage());
			}
		}
		
		//Função para efetuar logout do usuario
		function logout(){
			//Transforma a sessão em uma array vazia e logo depois a destroi
			$_SESSION = array();
			session_destroy;
			
			//direciona usuario de volta a pagina inicial do painel, no qual sera jogado novamente a pagina de login
			header("Location: index.php");
		}
	}
?>