<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/clientes.css">

</head>

<body>

    <header>
    <h1>CIFU - Controle Inteligente de Fazendo Urbana</h1>
    </header>

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
        <p>&copy; CIFU - Controle Inteligente de Fazendo Urbana. Todos os direitos reservados.</p>
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
