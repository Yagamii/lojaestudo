<div class="content-border">
	<div class="content-user">
    <h1>Apagar usuário</h1>
    	<p>Tem certeza que deseja apagar todas informações do usuário: <b><?php echo $_infos['usuario']; ?></b>?<br>
<br>
		<form action="index.php?page=usuarios&action=apagar&id=<?php echo $_GET['id'];?>" name="apagarUsuario" method="post">
        <input type="hidden" name="apagar" value="TRUE" />
        <input type="submit" name="apaga" value="Apagar" /><br/><br/>

        </form>
    </div>
</div>