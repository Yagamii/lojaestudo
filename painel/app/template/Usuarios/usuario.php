<div class="content-border">
	<div class="content">
    	<h1>Adicionar Administrador</h1>
        <form name="addadmin" action="index.php?page=usuarios&action=adicionar" method="post">
        	<br/>
            <label>Nome:</label><input type="text" name="nome" /><br/><br/>
            <label style="margin-left: -30px">Sobrenome:</label><input type="text" name="sobrenome" /><br/><br/>
        	<label style="margin-left: -10px">Usuario: </label><input type="text" name="usuario" /><br/><br/>
            <label style="margin-left: 4px">Email:</label><input type="text" name="email" /><br/><br/>
        	<label>Senha: </label><input type="password" name="senha" />
            <br/><br/>
            <input type="hidden" name="cadastrar" value="TRUE" />
            <input type="submit" name="cadastro" value="Registrar" />
            <br/><br/>
        </form>
    </div>
    <div class="content">
    	<h1>Usuarios</h1>
        <table style="margin: 0 auto; width: 100%">
        <tr>
        	<th>Nome</th>
            <th>Usuário</th>
            <th>Email</th>
            <th>Registro</th>
            <th>Função</th>
            <th>Editar</th>
            <th>Apagar</th>
        </tr>
        <?php while($row = mysqli_fetch_array($Usuario, MYSQLI_ASSOC)): ?>
        	<tr>
            	<td><?php echo $row['nometodo']; ?></td>
                <td><?php echo $row['usuario'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['data'];?></td>
                <td><?php echo $row['nivel']; ?></td>
                <td><a href="index.php?page=usuarios&action=editar&id=<?php echo $row['id_usuario']; ?>" title="Editar <?php echo $row['usuario'];?>"><img src="app/template/Includes/icone-editar.png" width="18" height="18"/></a></td>
                <td><a href="index.php?page=usuarios&action=apagar&id=<?php echo $row['id_usuario']; ?>" title="Apagar <?php echo $row['usuario'];?>"><img src="app/template/Includes/icone-apagar.png" width="18" height="18"/></a></td>
            </tr>
        <?php endwhile; ?>
        </table>
    </div>
    <div class="content">
    	<h1>Estatisticas</h1>
        <p>Comuns: <?php echo $comuns; ?></p>
        <p>Vendedores: <?php echo $vendedores; ?></p>
        <p>Administradores: <?php echo $admins; ?></p><br/>
    </div>
</div>