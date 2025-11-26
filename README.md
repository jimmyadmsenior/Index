# INDEX

![GitHub repo size](https://img.shields.io/github/repo-size/jimmyadmsenior/Index?style=for-the-badge)
![GitHub language count](https://img.shields.io/github/languages/count/jimmyadmsenior/Index?style=for-the-badge)
![GitHub forks](https://img.shields.io/github/forks/jimmyadmsenior/Index?style=for-the-badge)
![Bitbucket open issues](https://img.shields.io/bitbucket/issues/jimmyadmsenior/Index?style=for-the-badge)
![Bitbucket open pull requests](https://img.shields.io/bitbucket/pr-raw/jimmyadmsenior/Index?style=for-the-badge)

<img src="https://github.com/user-attachments/assets/b518b347-90f9-4936-918b-443cdacc9197" alt="Logo do site">

> Nosso site realiza a venda de eletrônicos, mais especificamente smartphones, fones de ouvido, relógios, tablets e notebooks. Ele foi criado com o intuito de simplicar a escolha de eletrônicos, utilizando de recursos gráficos e apresentações intuitivas.


### Status do Projeto
O projeto está em desenvolvimento contínuo. As principais funcionalidades já implementadas incluem:

- [X] Design e Elementos Gráficos
- [X] ChatBot
- [X] Layout Base
- [X] Publicação dos produtos
- [X] Páginas Iniciais
- [X] BackEnd (CRUD)(cadastro, login, confirmação de cadastro, painel admin)

#### Melhorias recentes
- Página de confirmação de cadastro com ícone centralizado e efeito visual aprimorado
- Correção de duplicidade do efeito de cursor
- Ajustes no fluxo de autenticação e cadastro de usuários

## 📫 Contribuindo para o Index

Para contribuir com o Index, siga estas etapas:

1. Bifurque este repositório.
2. Crie um branch: `git checkout -b <nome_branch>`.
3. Faça suas alterações e confirme-as: `git commit -m '<mensagem_commit>'`
4. Envie para o branch original: `git push origin Index / <local>`
5. Crie a solicitação de pull.

Como alternativa, consulte a documentação do GitHub sobre [como criar uma solicitação pull](https://help.github.com/en/github/collaborating-with-issues-and-pull-requests/creating-a-pull-request).

## 🤝 Colaboradores

Agradecemos às seguintes pessoas que contribuíram para este projeto:
<table>
  <tr>
    <td align="center">
      <a href="#" title="defina o título do link">
        <img src="https://avatars.githubusercontent.com/u/142106079?v=4" width="100px;" alt="Foto do Iuri Silva no GitHub"/><br>
        <sub>
          <b>Jimmy Castilho</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="#" title="defina o título do link">
        <img src="https://avatars.githubusercontent.com/u/173830808?v=4" width="100px;" alt="Foto do Mark Zuckerberg"/><br>
        <sub>
          <b>Lívia Clemente</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="#" title="defina o título do link">
        <img src="https://avatars.githubusercontent.com/u/173830932?v=4" width="100px;" alt="Foto do Mark Zuckerberg"/><br>
        <sub>
          <b>Pedro Rodrigues</b>
        </sub>
      </a>
    </td>
  </tr>
</table>

## 😄 Seja um dos contribuidores

Quer fazer parte desse projeto? Clique [AQUI](TUTORIAL.md) e leia como contribuir.

## 📝 Licença

Esse projeto está sob licença. Veja o arquivo [LICENÇA](LICENSE) para mais detalhes.



## Como clonar o repositório para sua máquina local
Para clonar o repositório para sua máquina local, você deve enviar uma solicitação para nós (Pull Request) propondo ser um afiliado ou ajudante para o nosso projeto. Lembre-se de enviar uma mensagem relatando o porquê você gostaria de ajudar e como pode contribuir para o nosso projeto.

# Como clonar o repositório para seu perfil do GitHub
Aperte no botão **Fork** na parte de cima dos arquivos, ao lado esquerdo da seção de favoritar o repositório.

# Como iniciar o servidor local

## 🚀 Configuração Rápida (Recomendado)

1. **Abra o terminal** no seu computador.
2. **Navegue até a pasta "backend"** usando o comando:

  ```bash
  cd caminho/para/a/pasta/backend
  ```
  Substitua caminho/para/a/pasta pelo caminho real onde a pasta "backend" está localizada.


6. **Execute o comando de configuração completa:**

  ```bash
  php artisan projeto:setup
  ```

  Este comando irá:
  - ✅ Executar as migrations do banco
  - ✅ Popular com todos os 63 produtos
  - ✅ Criar as categorias
  - ✅ Configurar o administrador
  - ✅ Criar storage link
  - ✅ Limpar caches

---

## 🔧 Configuração Manual (Opcional)

Se preferir fazer passo a passo:

1. **Navegue até a pasta "backend"** usando o comando:

  ```bash
  cd caminho/para/a/pasta/backend
  ```
  Substitua caminho/para/a/pasta pelo caminho real onde a pasta "backend" está localizada.

2. **Instale as dependências do PHP** usando o Composer:

  ```bash
  composer install
  ```

3. **Instale as dependências do Node.js** usando o npm:

  ```bash
  npm install
  ```

4. **Configure o arquivo `.env`** com suas próprias APIs e Tokens (copie `.env.example` para `.env` e edite conforme necessário).

5. **Gere a chave da aplicação Laravel:**

  ```bash
  php artisan key:generate
  ```

6. **Execute as migrações do banco de dados:**

  ```bash
  php artisan migrate
  ```

7. **Popule o banco de dados com dados iniciais:**

  ```bash
  php artisan db:seed
  ```

8. **Criar administrador (se necessário):**

  ```bash
  php artisan admin:create
  ```

9. **Crie o link simbólico para o storage (obrigatório para upload de fotos):**

  ```bash
  php artisan storage:link
  ```

10. **Inicie o servidor Laravel:**

   ```bash
   php artisan serve --host=localhost --port=8000
   ```

Agora o servidor estará rodando e você poderá acessá-lo através do seu navegador em http://localhost:8000.

### Credenciais de Acesso Admin

Após executar os comandos acima, você pode acessar o painel administrativo em:
- **URL:** http://localhost:8000/admin/login
- **Email:** admin@sistema.com
- **Senha:** admin123456