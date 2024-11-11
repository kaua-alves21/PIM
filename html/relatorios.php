<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatórios</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            text-align: center; /* Centraliza o texto da página */
        }

        h2 {
            margin: 20px 0; /* Espaçamento em volta do cabeçalho */
        }

        table {
            margin: 0 auto; /* Centraliza a tabela */
            border-collapse: collapse; /* Remove espaços entre bordas */
            width: 80%; /* Define uma largura para a tabela */
        }

        th, td {
            border: 1px solid #ccc; /* Borda para as células */
            padding: 10px; /* Espaçamento interno */
            text-align: left; /* Alinha o texto à esquerda */
        }

        th {
            background-color: #007bff; /* Cor de fundo dos cabeçalhos */
            color: white; /* Cor do texto dos cabeçalhos */
        }

        .filtro-container {
            margin: 20px 0; /* Espaçamento ao redor do filtro */
        }

        .filtro-container label, .filtro-container input {
            margin-right: 10px; /* Espaçamento entre os elementos do filtro */
        }

        button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        // Função para carregar e exibir os produtos filtrados por período
        function carregarRelatorio() {
            const produtos = JSON.parse(localStorage.getItem("produtos")) || [];

            const tabela = document.getElementById("relatorioProdutos").getElementsByTagName("tbody")[0];
            tabela.innerHTML = ""; // Limpa a tabela

            const dataInicio = document.getElementById("dataInicio").value;
            const dataFim = document.getElementById("dataFim").value;

            produtos.forEach((produto) => {
                const dataPlantio = new Date(produto.dataPlantio);

                // Se as datas de filtro forem fornecidas, verificar se o produto está dentro do intervalo
                if ((dataInicio === "" || new Date(dataInicio) <= dataPlantio) && 
                    (dataFim === "" || new Date(dataFim) >= dataPlantio)) {
                    
                    const row = tabela.insertRow();
                    row.insertCell(0).innerText = produto.categoria;
                    row.insertCell(1).innerText = produto.nomeProduto;
                    row.insertCell(2).innerText = produto.dataPlantio;
                    row.insertCell(3).innerText = produto.quantidadeEstoque;
                    row.insertCell(4).innerText = `R$ ${produto.preco}`;
                    row.insertCell(5).innerText = produto.disponivel === 'sim' ? 'Sim' : 'Não';
                }
            });
        }

        window.onload = carregarRelatorio;
    </script>
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

    <!-- Filtro de Período -->
    <div class="filtro-container">
        <label for="dataInicio">Data de Início:</label>
        <input type="date" id="dataInicio">
        <label for="dataFim">Data de Fim:</label>
        <input type="date" id="dataFim">
        <button onclick="carregarRelatorio()">Filtrar</button>
    </div>

    <!-- Relatório de Produtos -->
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
            </tr>
        </thead>
        <tbody>
            <!-- Produtos serão carregados aqui -->
        </tbody>
    </table>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 Startup de Segurança Alimentar. Todos os direitos reservados.</p>
    </footer>

</body>

</html>
