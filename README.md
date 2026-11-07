<div align="center">
  <img src="public/assets/img/logo.png" alt="GreenSmiley Logo" width="120" />
  <h1>GreenSmiley — Streetwear E-Commerce</h1>
  <p>Projeto acadêmico de e-commerce e CRUD completo desenvolvido para a disciplina de <strong>Desenv. Web em HTML5, CSS, JavaScript e PHP</strong> da <strong>Universidade Estácio de Sá</strong>.</p>

  <p>
    <a href="LICENSE"><img src="https://img.shields.io/badge/License-MIT-20C20E.svg?style=for-the-badge&logo=opensourceinitiative&logoColor=white" alt="Licença MIT" /></a>
  </p>

  <p>
    <a href="#-descrição-do-projeto">Descrição</a> •
    <a href="#-inspiração-visual">Inspiração Visual</a> •
    <a href="#-funcionalidades">Funcionalidades</a> •
    <a href="#-tecnologias-utilizadas">Tecnologias</a> •
    <a href="#-estrutura-do-projeto">Estrutura</a> •
    <a href="#-como-executar-o-projeto">Como Executar</a> •
    <a href="#-autor">Autor</a> •
    <a href="#-licença">Licença</a> •
    <a href="#-referências-e-documentações">Referências</a>
  </p>
</div>

---

## 📄 Descrição do Projeto

O **GreenSmiley** é uma aplicação web full stack de comércio eletrônico no segmento *streetwear*, idealizada e desenvolvida como atividade prática da disciplina de **Desenvolvimento Web em HTML5, CSS, JavaScript e PHP** da **Universidade Estácio de Sá**.

A aplicação foi estruturada segundo o padrão de arquitetura **MVC (Model-View-Controller)** com Front Controller e roteamento dinâmico via URL amigável, persistência relacional utilizando **PostgreSQL** por meio de **PHP Data Objects (PDO)**, controle de variáveis de ambiente com Dotenv e aderência ao padrão PSR-4 de autoload.

O front-end adota a metodologia **Mobile-First**, garantindo perfeita usabilidade em dispositivos móveis e em telas desktop através do framework **Bootstrap 5.3**, ícones SVG do **Bootstrap Icons** e estilização CSS customizada.

---

## 🎨 Inspiração Visual

O design visual da loja foi diretamente inspirado na identidade underground da marca britânica de streetwear **Corteiz ([corteiz.com](https://www.corteiz.com/))**:

- **Paleta de Cores Estrita**: Fundo preto puro (`#000000`) e realce verde terminal neon (`#20C20E`).
- **Tipografia Brutalista/Monoespaçada**: Uso das fontes Google Fonts *Share Tech Mono* e *Space Mono*, conferindo aspecto retrô e técnico aos nomes e preços das peças.
- **Mobile First**:
  - Catálogo em grade de 2 colunas (`col-6`) no mobile com imagens de alto contraste.
  - Barra de navegação minimalista com gaveta offcanvas retrátil e campo de pesquisa no rodapé.
- **Desktop**:
  - Barra lateral fixa (*Sidebar*) à esquerda com scrollbar personalizada retrô, navegação por categorias e links institucionais.
- **Detalhes do Produto**:
  - Seletor de tamanhos em blocos retangulares com demarcação diagonal para itens fora de estoque e acordeões retráteis minimalistas (*Details*, *Size Guide*, *Shipping Policy*).

---

## ⚡ Funcionalidades

### 🛍️ Catálogo e E-Commerce
- **Catálogo Dinâmico**: Listagem de peças com categorização, preços formatados em moeda brasileira (BRL) e fotos com tratamento visual.
- **Mecanismo de Busca**: Filtro de pesquisa de produtos em tempo real por nome ou categoria.
- **Página de Detalhes do Produto**: Visualização ampliada, seletor de grade de tamanhos (`PP`, `P`, `M`, `G`, `GG`, numerações de calçados) sincronizado com o estoque e acordeão informativo retrátil.
- **Carrinho de Compras Interativo**:
  - Adição de produtos com tamanho selecionado.
  - Contador de itens atualizado dinamicamente no cabeçalho em todas as páginas.
  - Listagem dos itens adicionados com cálculo automático de subtotal e frete.
  - Remoção individual de itens e opção de limpeza total do carrinho.
- **Checkout de Pedido**: Fluxo de finalização em etapas (Endereço, Forma de Pagamento e Confirmação de Pedido).

### 🔐 Autenticação e Gestão de Usuários (CRUD)
- **Cadastro de Usuários (Create)**: Criação de conta com validação de dados obrigatórios, formato de CPF e unicidade de e-mail com hash seguro de senha via `password_hash()`.
- **Autenticação (Login/Logout)**: Controle de sessão autenticada com feedback visual através de flash messages.
- **Painel Administrativo (Read & Delete)**: Painel restrito para consulta tabular de todos os usuários registrados e exclusão assistida por confirmação de segurança.

---

## 🛠️ Tecnologias Utilizadas

Abaixo estão listadas as tecnologias, linguagens, bibliotecas e ferramentas empregadas no desenvolvimento do projeto:

### Linguagens e Back-End
- ![PHP](https://img.shields.io/badge/PHP_8.x-777BB4?style=for-the-badge&logo=php&logoColor=white) — Linguagem de script server-side utilizada na lógica de negócios, controllers e models.
- ![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white) — Gerenciador de dependências e autoload PSR-4 do ecossistema PHP.
- ![PostgreSQL](https://img.shields.io/badge/PostgreSQL-4169E1?style=for-the-badge&logo=postgresql&logoColor=white) — Sistema gerenciador de banco de dados relacional (SGBD) robusto e de alto desempenho.
- ![PDO](https://img.shields.io/badge/PHP_Data_Objects_(PDO)-00758F?style=for-the-badge&logo=php&logoColor=white) — Camada de abstração e acesso a banco de dados com prepared statements contra SQL Injection.

### Front-End e Estilização
- ![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white) — Estruturação semântica de páginas e formulários.
- ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white) — Estilização personalizada, CSS Custom Properties (variáveis) e regras de responsividade.
- ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black) — Manipulação dinâmica do DOM, alternância de acordeões e interatividade de componentes.
- ![Bootstrap 5](https://img.shields.io/badge/Bootstrap_5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white) — Framework front-end responsivo para grid system, classes utilitárias e componente offcanvas.
- ![Bootstrap Icons](https://img.shields.io/badge/Bootstrap_Icons-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white) — Biblioteca oficial de ícones vetoriais.
- ![Google Fonts](https://img.shields.io/badge/Google_Fonts-4285F4?style=for-the-badge&logo=googlefonts&logoColor=white) — Tipografia com as famílias *Share Tech Mono* e *Space Mono*.

### Ferramentas de Desenvolvimento e Ambiente
- ![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white) — Ambiente integrado de servidor local para testes de desenvolvimento.
- ![Git](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white) — Controle de versionamento distribuído.
- ![GitHub](https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white) — Plataforma de hospedagem do repositório de código.
- ![VS Code](https://img.shields.io/badge/VS_Code-007ACC?style=for-the-badge&logo=visualstudiocode&logoColor=white) — Ambiente de desenvolvimento integrado (IDE).

---

## 📁 Estrutura do Projeto

```text
e-commerce-CRUD/
├── database/
│   └── DDL.sql               # Script de criação de tabelas, relacionamentos e dados iniciais
├── public/
│   ├── .htaccess             # Reescreve rotas HTTP redirecionando para index.php
│   ├── index.php             # Front Controller da aplicação
│   └── assets/
│       ├── css/
│       │   └── greensmiley.css # Tema centralizado Corteiz (#000000 e #20C20E)
│       └── img/              # Imagens dos produtos, logo e favicon
├── src/
│   ├── Controllers/          # Controladores (Home, Produto, Carrinho, Usuário)
│   ├── Core/                 # Núcleo MVC (Router, Controller base, Database Singleton)
│   └── Models/               # Modelos relacionais (Product, Cart, User)
├── views/
│   ├── auth/                 # Telas de login e cadastro
│   ├── cart/                 # Telas de carrinho e checkout
│   ├── home/                 # Catálogo inicial e página institucional About Us
│   ├── layouts/              # Componentes reutilizáveis (Cabecalho e Footer)
│   ├── products/             # Página detalhada do produto
│   └── users/                # Painel administrativo de usuários
├── .env.example              # Exemplo de configuração de banco de dados
├── composer.json             # Definição de dependências e autoload PSR-4
└── README.md                 # Documentação oficial do projeto
```

---

## 🚀 Como Executar o Projeto

### 1. Clonar o repositório
```bash
git clone https://github.com/seu-usuario/e-commerce-CRUD.git
cd e-commerce-CRUD
```

### 2. Instalar dependências
```bash
composer install
```

### 3. Configurar variáveis de ambiente
Crie um arquivo `.env` a partir do modelo disponibilizado:
```bash
cp .env.example .env
```
Edite as credenciais do seu banco de dados PostgreSQL:
```ini
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=greensmiley
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 4. Criar e popular o banco de dados
Execute as instruções contidas no arquivo `database/DDL.sql` no seu servidor PostgreSQL.

### 5. Iniciar o servidor de desenvolvimento
Você pode utilizar o servidor de desenvolvimento embutido do PHP apontando para a pasta pública:
```bash
php -S localhost:8000 -t public
```
Acesse no seu navegador: `http://localhost:8000`

---

## 👤 Autor

<table align="center">
  <tr>
    <td align="center">
      <a href="https://github.com/jdavi-sc">
        <img src="https://avatars.githubusercontent.com/u/178249837?s=400&u=736638be9492063b16551d9749f989fe0692ed94&v=4" width="100px;" alt="José Davi"/><br />
        <sub><b>José Davi</b></sub>
      </a><br />
      <span>Estudante de Análise e Desenvolvimento de Sistemas</span><br />
      <span>Universidade Estácio de Sá</span>
    </td>
  </tr>
</table>

---

## ⚖️ Licença

Este projeto está sob a licença **MIT**. Para mais detalhes, consulte o arquivo [LICENSE](LICENSE).

---

## 📚 Referências e Documentações

- [PHP: Hypertext Preprocessor — Documentação Oficial](https://www.php.net/docs.php)
- [PHP Data Objects (PDO) — Manual Oficial do PHP](https://www.php.net/manual/pt_BR/book.pdo.php)
- [PostgreSQL: The World's Most Advanced Open Source Relational Database](https://www.postgresql.org/docs/)
- [Bootstrap 5.3 Documentation](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
- [Bootstrap Icons](https://icons.getbootstrap.com/)
- [MDN Web Docs — HTML5, CSS3 e JavaScript](https://developer.mozilla.org/pt-BR/)
- [PHP-FIG PSR-4: Autoloader Standard](https://www.php-fig.org/psr/psr-4/)
- [vlucas/phpdotenv — Carregador de variáveis de ambiente .env](https://github.com/vlucas/phpdotenv)
- [Corteiz RTW (Inspiração Visual)](https://www.corteiz.com/)
- [Universidade Estácio de Sá](https://estacio.br/)