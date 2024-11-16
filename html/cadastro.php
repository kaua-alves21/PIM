<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <script src="../js/validacao.js" defer></script> <!-- Script externo -->
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <h1>CIFU - Controle Inteligente de Fazenda Urbana</h1>
        <p>&nbsp;</p>
    </header>

    <!-- Navegação -->
    <nav>
        <a href="login.php" class="login-button">
            <img id="imagem" src="../img/login icone.png" alt="Ícone de Login"> <!-- Ícone de Login -->
        </a>
        <a href="layout.php">Início</a>
        <a href="produtos.php">Cadastro de Produtos</a>
        <a href="clientes.php">Cadastro de Clientes</a>
        <a href="vendas.php">Vendas</a>
        <a href="relatorios_selecao.php">Relatórios</a>    
        <a href="sobre.php">Sobre</a>
    </nav>

    <!-- Container do Cadastro -->
    <div class="container">
        <h2>Cadastro de Novo Usuário</h2>
        <div class="login-container">
            <div class="login-form">
                <form id="form-cadastro" action="processa_cadastro.php" method="post">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>

                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" required>

                    <label for="usuario">Nome de Usuário:</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Nome de Usuário" required>

                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" required>

                    <label for="confirmar_senha">Confirmar Senha:</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar Senha" required>

                    <input type="submit" value="Cadastrar" id="botao">
                    <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 CIFU - Controle Inteligente de Fazenda Urbana. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
