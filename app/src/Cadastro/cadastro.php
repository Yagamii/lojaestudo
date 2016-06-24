<?php
	//Classe de cadastro utilizada apenas para efetuar cadastro normal, feito pelo proprio usuario
	class Cadastro extends Padrao{
		
		function cadastrar($nome, $snome, $usuario, $email, $senha, $csenha){
			try{
				//Parametros com informações dos usuarios são verificadas pela função veriCampo, que analisa se informações são validas para o mysql
				$_nome = $this->veriCampo($nome);
				$_snome = $this->veriCampo($snome);
				$_usuario = $this->veriCampo($usuario);
				$_email = $this->veriCampo($email);
				
				//simples comparação de senha inserida, verificando informações se senha e confirmação estão igualmente inseridas, caso estejam iguais, apenas é criptografada em md5
				if($senha != $csenha)
					throw new Exception("Senha e confirmação não coincidem, favor verificar");
				
				$_senha = md5($senha);
				
				//Verificação de email, para ver se o inserido ja consta no banco de dados
				$q = "SELECT * FROM usuarios WHERE email='$_email'";
				$r = $this->Dbc->query($q);
				
				if(mysqli_num_rows($r) > 0)
					throw new Exception("Já existe um usuario cadastrado com esse email.");
				
				//Com tudo verificado corretamente, inserir dados no banco
				$q = "INSERT INTO usuarios(nome, sobrenome, usuario, email, pass, data_registro) VALUES ('$_nome', '$_snome', '$_usuario', '$_email', '$_senha', NOW())";
				$r = $this->Dbc->query($q);
				
				if(mysqli_affected_rows($this->Dbc->getConnection()))
					MsgHandler::setSucess("Cadastro efetuado com sucesso!");
				
			}catch(Exception $e){
				MsgHandler::setError($e->getMessage());
			}
			
		}
		
	}

?>