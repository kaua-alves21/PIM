

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
        <h1>CIFU - Controle Inteligente de Fazenda Urbana</h1>
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

            <!-- Formulário ASP.NET -->
            <form method="post">
                <label for="nomeCliente">Nome do Cliente:</label>
                <input type="text" id="nomeCliente" name="Cliente.Nome" placeholder="Digite o nome do cliente" required>

                <label for="enderecoCliente">Endereço do Cliente:</label>
                <input type="text" id="enderecoCliente" name="Cliente.Endereco" placeholder="Digite o endereço do cliente" required>

                <label for="telefoneCliente">Telefone do Cliente:</label>
                <input type="tel" id="telefoneCliente" name="Cliente.Telefone" placeholder="Digite o telefone do cliente" required>

                <label for="idadeCliente">Idade do Cliente:</label>
                <input type="number" id="idadeCliente" name="Cliente.Idade" placeholder="Digite a idade do cliente" required>

                <label for="emailCliente">E-mail do Cliente:</label>
                <input type="email" id="emailCliente" name="Cliente.Email" placeholder="Digite o e-mail do cliente" required>

                <div class="cadastro-actions">
                    <button type="submit">Cadastrar Cliente</button>
                    <button type="button" onclick="cancelarCadastro()">Cancelar</button>
                </div>
            </form>

            <!-- Mensagem de Confirmação -->
          
        </div>
    </div>

    <footer>
        <p>&copy; 2024 CIFU - Controle Inteligente de Fazenda Urbana. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
