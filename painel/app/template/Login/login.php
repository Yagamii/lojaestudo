<form name="login" action="index.php?page=login&action=logar" method="POST">
<div class="login-form">
	<h1>Login</h1>
    	<div class="login-label">
        	<ul>
            	<li>Login</li>
                <li>Senha</li>
            </ul>
    	</div>
        
        <div class="login-input">
        	<input type="text" name="usuario" />
            <input type="password" name="senha" />
        </div>
        
        <div class="login-submit">
        	<input type="hidden" name="enviar" value="TRUE" />
            <input type="submit" name="login" value="Login" />
        </div>

</div>
</form>