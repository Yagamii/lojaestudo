<h1 align="center">Cadastro</h1>

<form name="cadastro" action="index.php?page=cadastro&action=cadastrar" method="post">
	<div class="form-cadastro">
    	<div class="form-label">
			<span>Nome: </span><br/>
        	<span>Sobrenome: </span><br/>
            <span>Usuário: </span><br/>
            <span>E-mail: </span><br/>
            <span>Senha: </span><br/>
            <span>Confirmação: </span>
        </div>
        
        <div class="form-input">
        	<input type="text" name="nome" /><br/>
            <input type="text" name="sobrenome" /><br/>
            <input type="text" name="usuario" /><br/>
            <input type="text" name="email" /><br/>
            <input type="password" name="pass" /><br/>
            <input type="password" name="cpass" />
        </div>
        
        <div class="botao-cadastro">
        	<input type="hidden" name="cadastrar" value="TRUE" />
            <input type="submit" name="cadastro" value="Cadastrar" />
        </div>
	</div>
</form>