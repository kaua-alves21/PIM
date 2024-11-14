<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatório de Clientes</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/relatorio-clientes.css">
    
 <script src="../js/load-content.js"></script>
<script src="../js/relatorio-clientes.js"></script>
   
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
