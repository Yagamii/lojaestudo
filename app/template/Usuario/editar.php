<h1 align="center">Editar dados</h1>

<form name="editar" action="index.php?page=usuario&action=editar&id=<?php echo $_GET['id']; ?>" method="post">
	<div class="form-cadastro">
    	<div class="form-label">
			<span>Nome: </span><br/>
        	<span>Sobrenome: </span><br/>
            <span>Usuário: </span><br/>
            <span>E-mail: </span><br/>
            <p></p><br/>
            <span>Senha: </span><br/>
            <span>Confirmação: </span>
        </div>
        
        <div class="form-input">
        	<input type="text" name="nome" value="<?php echo $dados['nome']; ?>"/><br/>
            <input type="text" name="sobrenome" value="<?php echo $dados['sobrenome']; ?>"/><br/>
            <input type="text" name="usuario" disabled value="<?php echo $dados['usuario']; ?>"/><br/>
            <input type="text" name="email" value="<?php echo $dados['email']; ?>"/><br/>
            <p style="margin-left: -50px; margin-top: -5px; margin-bottom: 5px"><b>Alterar senha(Não obrigatório)</b></p>
            <input type="password" name="senha" /><br/>
            <input type="password" name="csenha" />
        </div>
        
        <div class="botao-cadastro">
        	<br/>
        	<input type="hidden" name="editarUsuario" value="TRUE" />
            <input type="submit" name="editar" value="Editar" />
        </div>
	</div>
</form>