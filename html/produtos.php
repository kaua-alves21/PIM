<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script>
        // Função para salvar o produto no LocalStorage
        function salvarProduto(event) {
            event.preventDefault();

            const categoria = document.getElementById("categoria").value;
            const dataPlantio = document.getElementById("data_plantio").value;
            const nomeProduto = document.getElementById("nome_produto").value;
            const quantidadeEstoque = document.getElementById("quantidade_estoque").value;
            const preco = document.getElementById("preco").value;
            const disponivel = document.getElementById("disponivel").value;

            const produto = {
                id: Date.now(),
                categoria: categoria,
                dataPlantio: dataPlantio,
                nomeProduto: nomeProduto,
                quantidadeEstoque: quantidadeEstoque,
                preco: preco,
                disponivel: disponivel
            };

            let produtos = JSON.parse(localStorage.getItem("produtos")) || [];
            produtos.push(produto);
            localStorage.setItem("produtos", JSON.stringify(produtos));

            document.getElementById("produtoForm").reset();
            alert("Produto cadastrado com sucesso!");
        }
    </script>
    <style>
        /* Estilos de layout */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
        }

        /* Define o conteúdo principal para ocupar o espaço disponível */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        header {
            background-color: green;
            color: white;
            padding: 15px;
            text-align: center;
        }

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

        /* Formulário de cadastro */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 600px;
        }

        h2 {
            text-align: center;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-group label {
            flex-basis: 30%;
        }

        .form-group input,
        .form-group select {
            flex-basis: 65%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        /* Rodapé fixo */
        footer {
            background-color: green;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
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
            <img id="imagem" src="../img/login.png"> <!-- Ícone de Login -->
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
        <p>&copy; 2024 Startup de Segurança Alimentar. Todos os direitos reservados.</p>
    </footer>

</body>

</html>
