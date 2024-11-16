document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('form-cadastro');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        // Obter valores dos campos
        const nome = document.getElementById('nome').value.trim();
        const email = document.getElementById('email').value.trim();
        const usuario = document.getElementById('usuario').value.trim();
        const senha = document.getElementById('senha').value.trim();
        const confirmarSenha = document.getElementById('confirmar_senha').value.trim();

        // Validar campos obrigatórios
        if (!nome || !email || !usuario || !senha || !confirmarSenha) {
            alert('Todos os campos são obrigatórios!');
            return;
        }

        // Validar correspondência das senhas
        if (senha !== confirmarSenha) {
            alert('As senhas não coincidem!');
            return;
        }

        // Se tudo estiver ok, exibe mensagem de sucesso
        alert('Usuário cadastrado com sucesso!');

        // Enviar formulário após validação
        form.submit();
    });
});
