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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/login.css">

</head>

<body>

    <!-- Cabeçalho -->
    <header>
        <h1>Startup Segurança Alimentar</h1>
    </header>

    <!-- Navegação -->
    <nav>
        <a href="login.php" class="login-button">
            <img id="imagem" src="../img/login icone.png" alt="Ícone de Login"> <!-- Ícone de Login -->
        </a>
        <a href="layout.html">Início</a>
        <a href="produtos.html">Cadastro de Produtos</a>
        <a href="clientes.html">Cadastro de Clientes</a>
        <a href="vendas.html">Vendas</a>
        <a href="relatorios_selecao.html">Relatórios</a>
        <a href="sobre.html">Sobre</a>
    </nav>

    <!-- Formulário de Login -->
    <div class="container">
        <div class="login-container">
            <h2>Login</h2>
            <form action="validalogin.php" method="post">
                <div class="form-group">
                    <label for="login">Usuário:</label>
                    <input type="text" name="login" value="<?= $login ?>" id="login" placeholder="Nome de Usuário" required autofocus>
                </div>

                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" value="<?= $senha ?>" id="senha" placeholder="Senha" required>
                </div>

                <div class="form-group">
                    <label><input type="checkbox" name="lembrar" value="SIM" <?= $checked ?>> Lembrar-me</label>
                </div>

                <button type="submit" class="btn-submit">Entrar</button>

                <div class="form-footer">
                    <a href="javascript:void(0)" class="forgot-pass">Esqueceu a senha?</a>
                    <span>|</span>
                    <a href="cadastro.php" class="signup-link">Cadastre-se</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 Startup de Segurança Alimentar. Todos os direitos reservados.</p>
    </footer>

    <script src="../js/load-content.js"></script>

    <style>
      
    </style>
</body>

</html>
