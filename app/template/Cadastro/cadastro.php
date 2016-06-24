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
        	<input type="text" name="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>"/><br/>
            <input type="text" name="sobrenome" value="<?php if(isset($_POST['sobrenome'])) echo $_POST['sobrenome']; ?>"/><br/>
            <input type="text" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>"/><br/>
            <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/><br/>
            <input type="password" name="senha" /><br/>
            <input type="password" name="csenha" />
        </div>
        
        <div class="botao-cadastro">
        	<input type="hidden" name="cadastrar" value="TRUE" />
            <input type="submit" name="cadastro" value="Cadastrar" />
        </div>
	</div>
</form>