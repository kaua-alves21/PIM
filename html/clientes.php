<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            flex-direction: column;
        }

        .form-container {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        input[type="number"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        input[type="tel"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus {
            border: 1px solid #4CAF50;
        }

        .cadastro-actions {
            display: flex;
            justify-content: space-between;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .mensagem {
            margin-top: 15px;
            color: #007bff;
            text-align: center;
        }

        footer {
            background-color: green;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        h2 {
            color: black;
        }
    </style>
</head>

<body>

    <header>
        <h1>Startup Segurança Alimentar</h1>
    </header>

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

    <div class="container">
        <div class="form-container">
            <h2>Cadastrar Novo Cliente</h2>
            <label for="nomeCliente">Nome do Cliente:</label>
            <input type="text" id="nomeCliente" placeholder="Digite o nome do cliente">
            <label for="enderecoCliente">Endereço do Cliente:</label>
            <input type="text" id="enderecoCliente" placeholder="Digite o endereço do cliente">
            <label for="telefoneCliente">Telefone do Cliente:</label>
            <input type="tel" id="telefoneCliente" placeholder="Digite o telefone do cliente">
            <label for="idadeCliente">Idade do Cliente:</label>
            <input type="number" id="idadeCliente" placeholder="Digite a idade do cliente">
            <label for="emailCliente">E-mail do Cliente:</label>
            <input type="email" id="emailCliente" placeholder="Digite o e-mail do cliente">

            <div class="cadastro-actions">
                <button onclick="adicionarCliente()">Cadastrar Cliente</button>
                <button onclick="cancelarCadastro()">Cancelar</button>
            </div>

            <div class="mensagem" id="mensagem"></div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Startup de Segurança Alimentar. Todos os direitos reservados.</p>
    </footer>

    <script>
        // Função para adicionar cliente ao localStorage
        function adicionarCliente() {
            const nomeCliente = document.getElementById('nomeCliente').value.trim();
            const enderecoCliente = document.getElementById('enderecoCliente').value.trim();
            const telefoneCliente = document.getElementById('telefoneCliente').value.trim();
            const idadeCliente = document.getElementById('idadeCliente').value;
            const emailCliente = document.getElementById('emailCliente').value.trim();

            if (nomeCliente === "" || enderecoCliente === "" || telefoneCliente === "" || idadeCliente === "" || emailCliente === "") {
                alert('Por favor, preencha todos os campos.');
                return;
            }

            let clientes = JSON.parse(localStorage.getItem('clientes')) || [];

            const novoCliente = {
                nome: nomeCliente,
                endereco: enderecoCliente,
                telefone: telefoneCliente,
                idade: idadeCliente,
                email: emailCliente
            };

            clientes.push(novoCliente);
            localStorage.setItem('clientes', JSON.stringify(clientes));

            document.getElementById('mensagem').innerText = 'Cliente cadastrado com sucesso!';
            cancelarCadastro();
        }

        // Função para cancelar o cadastro
        function cancelarCadastro() {
            document.getElementById('nomeCliente').value = '';
            document.getElementById('enderecoCliente').value = '';
            document.getElementById('telefoneCliente').value = '';
            document.getElementById('idadeCliente').value = '';
            document.getElementById('emailCliente').value = '';
            document.getElementById('mensagem').innerText = '';
        }
    </script>

</body> 

</html>