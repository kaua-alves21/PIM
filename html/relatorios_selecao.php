<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seleção de Relatórios</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .relatorio-btns {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .relatorio-btn {
            display: flex;
            align-items: center;
            justify-content: start;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px;
            cursor: pointer;
            text-decoration: none;
            color: black;
            transition: background-color 0.3s ease;
            margin-bottom: 70px;
        }

        .relatorio-btn:hover {
            background-color: #f0f0f0;
        }

        .relatorio-btn img {
            margin-right: 15px;
            height: 40px;
        }

        .relatorio-btn span {
            font-size: 18px;
            font-weight: bold;
        }
/* Navegação */
nav {
    display: flex;
    justify-content: center;
    background-color: #264653;
    padding: 10px 0;
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
        footer {
            text-align: center;
            margin-top: 30px;
        }

    </style>
</head>

<body>

    <header>
        <h1>Startup Segurança Alimentar</h1>
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
        <p>&copy; 2024 Startup de Segurança Alimentar. Todos os direitos reservados.</p>
    </footer>

</body>

</html>