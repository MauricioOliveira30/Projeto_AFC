<?session_start();
	
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioEmail'],		
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioSenha']
	);
	
	$_SESSION['logindeslogado'] = "Deslogado com sucesso";
	//redirecionar o usuario para a página de login
	
	header("Location: Page_one.php");
?>