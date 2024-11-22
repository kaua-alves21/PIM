<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seleção de Relatórios</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/relatorios-selecao.css">
   
</head>

<body>

    <header>
        <h1>CIFU - Controle Inteligente de Fazendo Urbana</h1>
    </header>

    <!-- Navegação -->
    <nav>
        <a href="login.php" class="login-button">
            <img id="imagem" src="../img/login icone.png"> <!-- Ícone de Login -->
        </a>
        <a href="layout.php">Início</a>
        <a href="produtos.php">Cadastro de Produtos</a>
        <a href="clientes.php">Cadastro de Clientes</a>
        <a href="vendas.php">Vendas</a>
        <a href="relatorios_selecao.php">Relatórios</a>
        <a href="sobre.php">Sobre</a>
    </nav>

    <!-- Seleção de Relatórios -->
    <div class="container">
        <h2>Selecione o Tipo de Relatório</h2>
        <div class="relatorio-btns">
            <a href="relatorios-produtos.php" class="relatorio-btn">
                <img src="../img/produtos.png" alt="Relatório de Produtos">
                <span>Relatório de Produtos</span>
            </a>
            <a href="relatorios_clientes.php" class="relatorio-btn">
                <img src="../img/clientes.png" alt="Relatório de Clientes">
                <span>Relatório de Clientes</span>
            </a>
            <a href="relatorios_vendas.php" class="relatorio-btn">
                <img src="../img/vendas.png" alt="Relatório de Vendas">
                <span>Relatório de Vendas</span>
            </a>
        </div>
    </div>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 CIFU - Controle Inteligente de Fazendo Urbana. Todos os direitos reservados.</p>
    </footer>

</body>

</html>
