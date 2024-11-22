<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatórios</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/relatorio-produtos.css">
 
    <script src="../js/load-content.js"></script>
    <script src="../js/relatorio-produtos.js"></script>
   

<body>

    <header>
        <h1>CIFU - Controle Inteligente de Fazendo Urbana</h1>
    </header>

    <nav>
        <a href="login.php" class="login-button">
            <img id="imagem" src="../img/login icone.png">
        </a>
        <a href="layout.php">Início</a>
        <a href="produtos.php">Cadastro de Produtos</a>
        <a href="clientes.php">Cadastro de Clientes</a>
        <a href="vendas.php">Vendas</a>
        <a href="relatorios_selecao.php">Relatórios</a>    
        <a href="sobre.php">Sobre</a>
    </nav>

    <div class="filtro-container">
        <label for="dataInicio">Data de Início:</label>
        <input type="date" id="dataInicio">
        <label for="dataFim">Data de Fim:</label>
        <input type="date" id="dataFim">
        <button onclick="carregarRelatorio()">Filtrar</button>
    </div>

    <h2>Relatório de Produtos</h2>
    <table border="1" id="relatorioProdutos">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Nome do Produto</th>
                <th>Data de Plantio</th>
                <th>Quantidade em Estoque</th>
                <th>Preço</th>
                <th>Disponível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Produtos serão carregados aqui -->
        </tbody>
    </table>

    <div id="form-edicao">
        <h3>Editar Produto</h3>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" required>
        <label for="nomeProduto">Nome do Produto:</label>
        <input type="text" id="nomeProduto" required>
        <label for="dataPlantio">Data de Plantio:</label>
        <input type="date" id="dataPlantio" required>
        <label for="quantidadeEstoque">Quantidade em Estoque:</label>
        <input type="number" id="quantidadeEstoque" required>
        <label for="preco">Preço:</label>
        <input type="number" id="preco" required>
        <label for="disponivel">Disponível:</label>
        <select id="disponivel" required>
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select>
        <button onclick="salvarEdicao()">Salvar</button>
        <button onclick="cancelarEdicao()">Cancelar</button>
    </div>
    <footer>
        <p>&copy; 2024 CIFU - Controle Inteligente de Fazendo Urbana. Todos os direitos reservados.</p>
    </footer>

</body>

</html>
