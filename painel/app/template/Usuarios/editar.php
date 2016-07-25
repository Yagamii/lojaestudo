<div class="content-border">
	<div class="content-user">
    	<h1>Editar usuário</h1>
        <form action="index.php?page=usuarios&action=editar&id=<?php echo $_GET['id'];?>" name="editUsuario" method="post">
        <br/>
        <label>Nome:</label><input type="text" name="nome" value="<?php echo $_infos['nome']; ?>" /><br/><br/>
        <label style="margin-left: -32px">Sobrenome:</label><input type="text" name="sobrenome" value="<?php echo $_infos['sobrenome']; ?>" /><br/><br/>
        <label>Email:</label><input type="text" name="email" value="<?php echo $_infos['email']; ?>" /><br/><br/>
        <label style="margin-left: -10px">Usuário:</label><input type="text" name="usuario" value="<?php echo $_infos['usuario']; ?>" /><br/><br/>
        <label style="margin-left: -78px">Função:</label><select name="nivel">
        						<option></option>
        						<?php while($row = mysqli_fetch_array($nivel, MYSQLI_ASSOC)): 
                                	if($_infos['id_nivel'] == $row['id_nivel']){
										echo '<option selected value="'.$_infos['id_nivel'].'">'.$row['nivel'].'</option>';
									}else{
										echo '<option value="'.$row['id_nivel'].'">'.$row['nivel'].'</option>';
									}
                                endwhile; ?>
        					  </select><br/><br/>
        <input type="hidden" name="alterar" value="TRUE" />
        <input type="submit" name="alter" value="Editar" /><br/><br/>
        </form>
    </div>
</div>