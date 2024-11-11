<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatório de Clientes</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
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

        header {
            background-color: green;
            color: white;
            padding: 20px;
        }

        h2 {
            margin: 20px 0;
            color: #333;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .excluir-btn, .editar-btn {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .editar-btn {
            background-color: #4CAF50;
        }

        .excluir-btn:hover {
            background-color: #ff0000;
        }

        .editar-btn:hover {
            background-color: #45a049;
        }

        /* Estilo do formulário de edição */
        #formEdicao {
            display: none;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
        }

        #formEdicao label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        #formEdicao input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #formEdicao button {
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        #formEdicao button[type="submit"] {
            background-color: #007bff;
            color: white;
        }

        #formEdicao button[type="button"] {
            background-color: #ccc;
        }

        #formEdicao button[type="submit"]:hover {
            background-color: #0056b3;
        }

        #formEdicao button[type="button"]:hover {
            background-color: #aaa;
        }

        footer {
            margin-top: 20px;
            padding: 10px;
            background-color: green;
            color: white;
        }
    </style>
    <script>
        let editandoIndex = -1; // Variável para armazenar o índice do cliente que está sendo editado

        // Função para carregar e exibir os clientes cadastrados
        function carregarClientes() {
            const clientes = JSON.parse(localStorage.getItem('clientes')) || [];
            const tabelaClientes = document.getElementById('relatorioClientes').getElementsByTagName('tbody')[0];
            tabelaClientes.innerHTML = '';

            clientes.forEach((cliente, index) => {
                const row = tabelaClientes.insertRow();
                row.innerHTML = `
                    <td>${cliente.nome}</td>
                    <td>${cliente.email}</td>
                    <td>${cliente.telefone}</td>
                    <td>${cliente.endereco}</td>
                    <td>
                        <button class="editar-btn" onclick="editarCliente(${index})">Editar</button>
                        <button class="excluir-btn" onclick="excluirCliente(${index})">Excluir</button>
                    </td>
                `;
            });
        }

        // Função para editar cliente
        function editarCliente(index) {
            const clientes = JSON.parse(localStorage.getItem('clientes')) || [];
            const cliente = clientes[index];
            editandoIndex = index; // Armazena o índice do cliente que está sendo editado

            // Preenche os campos de input com os dados do cliente
            document.getElementById('nome').value = cliente.nome;
            document.getElementById('email').value = cliente.email;
            document.getElementById('telefone').value = cliente.telefone;
            document.getElementById('endereco').value = cliente.endereco;

            // Exibe o formulário de edição
            document.getElementById('formEdicao').style.display = 'block';
        }

        // Função para salvar as alterações feitas no cliente
        function salvarAlteracoes() {
            const clientes = JSON.parse(localStorage.getItem('clientes')) || [];

            const clienteAtualizado = {
                nome: document.getElementById('nome').value,
                email: document.getElementById('email').value,
                telefone: document.getElementById('telefone').value,
                endereco: document.getElementById('endereco').value
            };

            // Atualiza o cliente no array
            clientes[editandoIndex] = clienteAtualizado;
            localStorage.setItem('clientes', JSON.stringify(clientes)); // Atualiza o localStorage
            carregarClientes(); // Recarrega a tabela
            limparFormulario(); // Limpa os campos do formulário
        }

        // Função para excluir cliente do localStorage
        function excluirCliente(index) {
            let clientes = JSON.parse(localStorage.getItem('clientes')) || [];

            if (confirm('Tem certeza que deseja excluir este cliente?')) {
                clientes.splice(index, 1); // Remove o cliente do array
                localStorage.setItem('clientes', JSON.stringify(clientes)); // Atualiza o localStorage
                carregarClientes(); // Recarrega a tabela
            }
        }

        // Função para limpar o formulário de edição e esconder o formulário
        function limparFormulario() {
            document.getElementById('nome').value = '';
            document.getElementById('email').value = '';
            document.getElementById('telefone').value = '';
            document.getElementById('endereco').value = '';
            editandoIndex = -1;
            document.getElementById('formEdicao').style.display = 'none'; // Esconde o formulário de edição
        }

        // Carregar clientes quando a página for carregada
        window.onload = carregarClientes;
    </script>
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

    <!-- Formulário de Edição (oculto inicialmente) -->
    <div id="formEdicao">
        <h2>Editar Cliente</h2>
        <form onsubmit="event.preventDefault(); salvarAlteracoes();">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" required><br>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" required><br>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" required><br>
            <button type="submit">Salvar Alterações</button>
            <button type="button" onclick="limparFormulario()">Cancelar</button>
        </form>
    </div>

    <!-- Relatório de Clientes -->
    <h2>Relatório de Clientes</h2>
    <table id="relatorioClientes">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Clientes serão carregados aqui -->
        </tbody>
    </table>

    <footer>
        <p>&copy; 2024 Startup de Segurança Alimentar. Todos os direitos reservados.</p>
    </footer>

</body>

</html>
