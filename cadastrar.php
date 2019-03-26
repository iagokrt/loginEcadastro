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
				<h1>Criar nova conta</h1>
				<input type="text" name="nome" placeholder="Nome" maxlength="30">
				<input type="text" name="telefone" placeholder="Telefone" maxlength="30">
				<input type="email" name="email" placeholder="E-mail" maxlength="40">
				<input type="password" name="senha" placeholder="Senha" maxlength="15">
				<input type="password" name="confirmarSenha" placeholder="Confirmar Senha" maxlength="15">
				<input type="submit" value="Cadastrar">
				<a href="index.php">Voltar ao login</a>
			</form>

<?php
//verificar se clicou em cadastrar(submit)
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$confirmarSenha = addslashes($_POST['confirmarSenha']);
	//verificar se esta preenchido
	if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
	{
		$u->conectar("projeto_login", "localhost", "root", "");
		if($u->msgErro == "")
		{
			if($senha == $confirmarSenha)
			{
				if($u->cadastrar($nome, $telefone, $email, $senha))
				{	
					?>
					<div id="msg-sucesso">
					 	Cadastrado com sucesso! Acesse a página de login para entrar..
					</div>
					<?php
				}
				else 
				{
					?>
					<div class="msg-erro">
						email ja cadastrado!
					</div>
					<?php
				}
			}
			else 
			{
				?>
				<div class="msg-erro">
					Senha e confirmar senha não conferem!
				</div>
				<?php
			}
		}
		else
		{
			?>
			<div class="msg-erro">
				<?php echo "Erro: ".$u->msgErro;?>
			</div>
			<?php
		}
	} else
	{	
		?>
		<div class="msg-erro">
			Preencha todos os campos!
		</div>
		<?php
	}
}

?>

</body>
</html>