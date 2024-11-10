<?php
session_start();

$login = (isset($_COOKIE['CookieLogin'])) ? base64_decode($_COOKIE['CookieLogin']) : '';
$senha = (isset($_COOKIE['CookieSenha'])) ? base64_decode($_COOKIE['CookieSenha']) : '';
$lembrar = (isset($_COOKIE['CookieLembrar'])) ? base64_decode($_COOKIE['CookieLembrar']) : '';
$checked = ($lembrar == 'SIM') ? 'checked' : '';

if (isset($_SESSION["logado"])) {
	$_SESSION["logado"] = false;
}
?>


<!-- login.html -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Startup Segurança Alimentar</h1>
        <p>&nbsp;</p>
    </header>
    <h2>LOGIN</h2>

    <!-- Navegação -->
    <nav>
        <a href="login.html" class="login-button">
            <img id="imagem" src="../img/login icone.png" alt="Ícone de Login"> <!-- Ícone de Login -->
        </a>
        <a href="layout.html">Início</a>
        <a href="produtos.html">Cadastro de Produtos</a>
        <a href="clientes.html">Cadastro de Clientes</a>
        <a href="vendas.html">Vendas</a>
        <a href="relatorios_selecao.html">Relatórios</a>    
        <a href="sobre.html">Sobre</a>
    </nav>

    <div class="login-container">
        <div class="login-form">
            <form class="login" action="validalogin.php" method="post"> <!-- Altere o action para o seu script de processamento -->
                <label for="username">Usuário:</label>
                <input type="text" name="login" value="<?=$login?>" id="login" placeholder="Nome de Usuário" required autofocus>
                
                <label for="password">Senha:</label>
                <input type="password" name="senha" value="<?=$senha?>" id="login" placeholder="Senha" required>
                
                <input type="submit" value="Entrar" id='botao'>
                <div class="remember-forgot">
                    <div class="checkbox">
                        <label><input type="checkbox" name="lembrar" value="SIM"<?=$checked?>>Lembrar-me</label>
                    </div>
                    <div class="col-md-6 forgot-pass-content">
                            <a href="javascription:void(0)" class="forgot-pass">Esqueceu a senha?</a>
                    </div>
                </div>
                <a href="cadastro.php">Cadastre-se</a>
            </form>
        </div>
    </div>
    
    <footer>
        <p>&copy; 2024 Startup de Segurança Alimentar. Todos os direitos reservados.</p>
    </footer>

    <style>
        /* Estilos gerais para o corpo */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex; /* Usar flexbox */
            flex-direction: column; /* Direção em coluna */
            align-items: center; /* Alinhar horizontalmente ao centro */
            justify-content: center; /* Alinhar verticalmente ao centro */
            height: 100vh; /* Altura total da tela */
            padding-top: 100px; /* Espaço para cabeçalho e navegação fixos */
        }

        /* Cabeçalho */
        header {
            background-color: green;
            color: white;
            padding: 15px;
            text-align: center;
            width: 100%; /* Largura total para o cabeçalho */
            position: fixed; /* Fixa o cabeçalho no topo */
            top: 0; /* Alinha ao topo */
            left: 0; /* Alinha à esquerda */
            z-index: 1000; /* Garante que o cabeçalho fique acima de outros elementos */
        }

        /* Navegação */
        nav {
            display: flex;
            justify-content: center;
            background-color: #264653;
            padding: 10px 0;
            width: 100%; /* Largura total para a navegação */
            position: fixed; /* Fixa a navegação no topo */
            top: 60px; /* Ajusta a posição abaixo do cabeçalho */
            left: 0; /* Alinha à esquerda */
            z-index: 1000; /* Garante que a navegação fique acima de outros elementos */
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: bold;
            background-color: #264653;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #1d3557;
        }

        /* Estilos para o contêiner do formulário de login */
        .login-container {
            background-color: white; /* Fundo branco para o formulário */
            border-radius: 8px; /* Bordas arredondadas */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra sutil */
            padding: 20px; /* Espaçamento interno */
            width: 300px; /* Largura fixa do formulário */
            margin-top: 20px; /* Espaçamento acima do contêiner */
        }

        /* Estilos para o formulário */
        .login-form {
            display: flex; /* Usar flexbox */
            flex-direction: column; /* Colocar os itens em coluna */
        }

        /* Estilos para os rótulos */
        label {
            margin-bottom: 5px; /* Espaçamento abaixo do rótulo */
        }

        /* Estilos para os campos de entrada */
        input[type="text"], input[type="password"] {
            padding: 10px; /* Espaçamento interno */
            margin-bottom: 15px; /* Espaçamento abaixo do campo */
            border: 1px solid #ccc; /* Borda sutil */
            border-radius: 4px; /* Bordas arredondadas */
        }

        /* Estilos para o botão */
        button {
            padding: 10px; /* Espaçamento interno */
            background-color: #28a745; /* Cor de fundo verde */
            color: white; /* Cor do texto */
            border: none; /* Remover bordas */
            border-radius: 4px; /* Bordas arredondadas */
            cursor: pointer; /* Mudar o cursor ao passar o mouse */
        }

        button:hover {
            background-color: #218838; /* Escurecer a cor ao passar o mouse */
        }

        /* Estilos para o rodapé */
        footer {
            text-align: center; /* Centralizar o texto do rodapé */
            margin-top: 20px; /* Espaço acima do rodapé */
        }
    </style>
</body>
</html>
