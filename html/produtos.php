<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/produtos.css">

    <script src="../js/load-content.js"></script>
    <script src="../js/produtos.js"></script>
   
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

    <!-- Conteúdo principal com formulário -->
    <div class="main-content">
        <div class="form-container">
            <form id="produtoForm" onsubmit="salvarProduto(event)">
                <h2>Cadastrar Produtos</h2>

                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <input type="text" id="categoria" name="categoria" required>
                </div>

                <div class="form-group">
                    <label for="data_plantio">Data de Produção:</label>
                    <input type="date" id="data_plantio" name="data_plantio" required>
                </div>

                <div class="form-group">
                    <label for="nome_produto">Nome do Produto:</label>
                    <input type="text" id="nome_produto" name="nome_produto" required>
                </div>

                <div class="form-group">
                    <label for="quantidade_estoque">Quantidade em Estoque:</label>
                    <input type="number" id="quantidade_estoque" name="quantidade_estoque" required>
                </div>

                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" id="preco" name="preco" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="disponivel">Disponível:</label>
                    <select id="disponivel" name="disponivel">
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select>
                </div>

                <button type="submit" class="submit-btn">Cadastrar</button>
            </form>
        </div>
    </div>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 CIFU - Controle Inteligente de Fazendo Urbana. Todos os direitos reservados.</p>
    </footer>

</body>

</html>
