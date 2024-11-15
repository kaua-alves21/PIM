using System;
using System.Web.UI;

namespace SeuProjeto
{
    public partial class Cadastro : Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            // Código de inicialização (se necessário)
        }

        // Método para processar o formulário ao ser enviado
        protected void formCadastro_ServerClick(object sender, EventArgs e)
        {
            string nome = nome.Value;
            string email = email.Value;
            string usuario = usuario.Value;
            string senha = senha.Value;
            string confirmarSenha = confirmar_senha.Value;

            // Lógica de validação do formulário
            if (senha == confirmarSenha)
            {
                // Aqui você pode adicionar código para salvar no banco de dados
                // Exemplo simples: Response.Write("Usuário cadastrado com sucesso");
                Response.Write("<script>alert('Usuário cadastrado com sucesso!');</script>");
            }
            else
            {
                Response.Write("<script>alert('As senhas não coincidem!');</script>");
            }
        }
    }
}
