<!-- layout.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Início</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <!-- Cabeçalho -->
    <header>
        <h1>Startup Segurança Alimentar</h1>
        <p>&nbsp;</p>
    </header>

    <!-- Navegação -->
    <nav>
        <a href="login.php" class="login-button">
            <img id = "imagem" src="../img/login.png" > <!-- Ícone de Login -->
           
        </a>
        <a href="layout.php">Início</a>
        <a href="produtos.php">Cadastro de Produtos</a>
        <a href="clientes.php">Cadastro de Clientes</a>
        <a href="vendas.php">Vendas</a>
        <a href="relatorios_selecao.php">Relatórios</a>    
        <a href="sobre.php">Sobre</a>
        
    </nav>
    <div class="container">
        <div id="botao" class="shortcut-buttons">
            <a href="produtos.php" class="button">
                <img src="../img/produtos.png" >
                <span>Cadastro de produtos</span>
            </a>
            <a href="clientes.php" class="button">
                <img src="../img/clientes.png" >
                <span>Cadastros de clientes</span>
            </a>
            <a href="vendas.php" class="button">
                <img src="../img/vendas.png" >
                <span>Vendas</span>
            </a>
            <a href="relatorios_selecao.php" class="button">
                <img src="../img/relatorios.png" >
                <span>Relatórios</span>
            </a>
           
            <a href="sobre.php" class="button">
                <img src="../img/sobre.png" >
                <span>Sobre</span>
            </a>
        </div>
    </div>
    <!-- Conteúdo Dinâmico -->
    <div id="content"></div>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 Startup de Segurança Alimentar. Todos os direitos reservados.</p>
    </footer>

    <script src="../js/load-content.js"></script>
</body>

</html>
