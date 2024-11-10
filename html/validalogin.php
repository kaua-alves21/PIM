<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valida login</title>	
</head>
<body>
	<?php
	
	session_start();

	$hostname = 'localhost';
	$username = 'root';
	$password = 'usbw';
	$db = 'db_pim';
	$login = (isset($_POST['login'])) ? $_POST['login'] : '';
	$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
	$lembrar = (isset($_POST['lembrar'])) ? $_POST['lembrar'] : '';

	//INICIA A SESSÃO
	 
	$_SESSION['logado']=false;
	$conexao=new mysqli($hostname, $username, $password);
	mysqli_select_db($conexao, $db);

	//se der erro aparece alguma mensagem de erro
	if (mysqli_connect_errno())
	{
		echo "A conexão MySQLi apresentou erro: ".mysqli_connect_errno();
	}
	 
	//checando o usuário que veio do formulário no banco de dados
	if((isset($_POST['login'])) && (isset($_POST['senha'])))
	{
		$login_usuario = mysqli_real_escape_string($conexao,$_POST['login']);
		$senha_usuario = mysqli_real_escape_string($conexao,$_POST['senha']);
		$seleciona_usuario = "SELECT * FROM usuario WHERE nm_login='$login_usuario' AND AES_DECRYPT(ds_senha,'bocal')='$senha_usuario' OR nm_email='$login_usuario' AND AES_DECRYPT(ds_senha,'bocal')='$senha_usuario' LIMIT 1;";
		$procura = mysqli_query($conexao,$seleciona_usuario);
		$checa_usuario = mysqli_num_rows($procura);                                 
		//Obtém o número de linhas em um resultado
		if($checa_usuario>0){
			$_SESSION['logado']=true;
			$seleciona_nome = "SELECT nm_usuario FROM usuario WHERE nm_login='$login_usuario' AND ds_senha='$senha_usuario' OR nm_email='$login_usuario' AND ds_senha='$senha_usuario' LIMIT 1;";
			$seleciona = mysqli_query($conexao,$seleciona_nome);
			$resultado = mysqli_fetch_assoc($seleciona);
			$_SESSION['user'] = $resultado['nm_usuario'];
			
			if($lembrar == 'SIM'){
			    $tempo = time() + 60*60*24*30; 
			    setCookie('CookieLembrar', base64_encode('SIM'), $tempo);
			    setCookie('CookieLogin', base64_encode($login), $tempo);
			    setCookie('CookieSenha', base64_encode($senha), $tempo); 
			}else{ 
			    setCookie('CookieLembrar');
			    setCookie('CookieLogin');
			    setCookie('CookieSenha'); 
			}
			header("Location:index.php");
		}
		else
		{
			echo "<script>confirm('Login ou Senha com erro, tente novamente!', window.location.href = 'login.php')</script>";
		}
	}
	?>
</body>
</html>