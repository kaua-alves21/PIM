<!-- cadastro.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <h1>Startup Segurança Alimentar</h1>
        <p>&nbsp;</p>
    </header>

    <!-- Navegação -->
    <nav>
        <a href="login.php" class="login-button">
            <img id="imagem" src="../img/login.png" alt="Ícone de Login"> <!-- Ícone de Login -->
        </a>
        <a href="layout.php">Início</a>
        <a href="produtos.php">Cadastro de Produtos</a>
        <a href="clientes.php">Cadastro de Clientes</a>
        <a href="vendas.php">Vendas</a>
        <a href="relatorios_selecao.php">Relatórios</a>    
        <a href="sobre.php">Sobre</a>
    </nav>

    <!-- Container do Cadastro -->
    <div class="container">
        <h2>Cadastro de Novo Usuário</h2>
        <div class="login-container">
            <div class="login-form">
                <form action="processa_cadastro.php" method="post">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>

                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" required>

                    <label for="usuario">Nome de Usuário:</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Nome de Usuário" required>

                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" required>

                    <label for="confirmar_senha">Confirmar Senha:</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar Senha" required>

                    <input type="submit" value="Cadastrar" id="botao">
                    <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 Startup de Segurança Alimentar. Todos os direitos reservados.</p>
    </footer>

    <style>
        /* Estilos específicos para o cadastro */
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding-top: 50px;
        }

        h2 {
            text-align: center;
            color: #264653;
        }

        .login-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .login-form label {
            margin-top: 10px;
            display: block;
            color: #264653;
        }

        .login-form input[type="text"],
        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-form input[type="submit"]:hover {
            background-color: #218838;
        }

        .login-form p {
            text-align: center;
            margin-top: 15px;
        }
        
        .login-form a {
            color: #264653;
            text-decoration: none;
        }
    </style>
</body>
</html>