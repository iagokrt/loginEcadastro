<?php

require_once 'CLASSES/usuarios.php';
$u = new Usuario;
 ?>

<html lang="pt-br">
<head>
	<title>projeto login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta name="viewport" content="width:device-width, initial-scale=1">

</head>
<body>
	<form class="box" method="POST">
				<h1>Login</h1>
				<input type="email" name="email" placeholder="E-mail">
				<input type="password" name="senha" placeholder="Senha">
				<input type="submit" value="Entrar">
				<a href="cadastrar.php">Cadastre-se</a>
			</form>

<?php

if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	
	
	if(!empty($email) && !empty($senha))
	{
		$u->conectar("projeto_login", "localhost", "root", "");
		if($u->msgErro == "")
		{
				if($u->logar($email, $senha))
				{
					header("location: AreaPrivada.php");
				} else 
				{
					?>
					<div class="msg-erro">
						Email e/ou senha incorretos!
					</div>
					<?php
				}
		}else 
		{
			?>
			<div class="msg-erro">
				<?php echo "erro: ".$u->msgErro; ?>
			</div>
			<?php
		}
	} else 
	{	
		?>
		<div class="msg-erro">
		preencha todos os campos
		</div>
		<?php
	}
}
?>

</body>

</html>