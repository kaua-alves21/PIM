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
        <h1>Startup Segurança Alimentar</h1>
    </header>

    <nav>
        <a href="login.html" class="login-button">
            <img id="imagem" src="../img/login icone.png"> <!-- Ícone de Login -->
        </a>
        <a href="layout.html">Início</a>
        <a href="produtos.html">Cadastro de Produtos</a>
        <a href="clientes.html">Cadastro de Clientes</a>
        <a href="vendas.html">Vendas</a>
        <a href="relatorios_selecao.html">Relatórios</a>
        <a href="sobre.html">Sobre</a>
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

    <script src="../js/load-content.js"></script>
    <script src="../js/clientes.js"></script>
   

</body> 

</html>
