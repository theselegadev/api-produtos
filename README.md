
# 📦 API de Produtos em PHP + MySQL

Uma API simples desenvolvida em PHP 8+ e MySQL, utilizando o padrão MVC e organizada para manipular produtos em um catálogo.

## 🎯 Finalidade do Projeto
Esta API foi desenvolvida com o objetivo de aprender e praticar conceitos de desenvolvimento backend utilizando PHP 8+ e MySQL, aplicando boas práticas no consumo e construção de APIs RESTful.
Ela serve como exemplo didático para testes e estudos sobre integração entre sistemas frontend e backend, manipulação de dados, tratamento de requisições HTTP e estruturação de projetos seguindo a arquitetura MVC.

O projeto não tem finalidade comercial e pode ser utilizado para fins de aprendizado, testes locais e experimentação de requisições HTTP utilizando ferramentas como Insomnia, Postman ou clientes HTTP no frontend.

## 🚀 Tecnologias

- PHP 8+
- MySQL
- PDO
- Apache (com .htaccess para URLs amigáveis)
- Arquitetura MVC (Controller, DAO, Router)

---

## 🌐 Endereço Base

```
http://localhost/api/
```

---

## 📂 Endpoints Disponíveis

### ➤ Listar Todos os Produtos

**GET /api/produto**

Retorna todos os produtos cadastrados no banco de dados.

---

### ➤ Listar Todos os Produtos

**GET /api/produto/{id}**

Retorna produto cadastrado com o id específico.

---

### ➤ Pesquisar Produtos por Nome

**GET /api/produto/{nome}**

Exemplo:
```
GET /api/produto/Mouse
```

Retorna os produtos cujo nome contenha o termo pesquisado.

---

### ➤ Cadastrar Produto

**POST /api/produto**

- Requisição: multipart/form-data
- Campos esperados:
  - `nome` → Nome do produto
  - `descricao` → Descrição do produto
  - `valor` → Valor do produto
  - `quantidade` → Quantidade em estoque
  - `imagem` → Imagem do produto (campo de arquivo)

---

### ➤ Atualizar Produto

**POST /api/produto-update**

- Requisição: multipart/form-data
- Campos esperados:
  - `nome` → Novo nome do produto
  - `descricao` → Nova descrição do produto
  - `valor` → Novo valor do produto
  - `quantidade` → Nova quantidade
  - `imagem` → Nova imagem do produto (campo de arquivo)

⚠️ **Importante:** Para atualizar corretamente, envie todos os campos preenchidos, mesmo os que não deseja alterar. O envio da imagem é obrigatório no update.

---

### ➤ Deletar Produto

**DELETE /api/produto/{id}**

Exemplo:
```
DELETE /api/produto/3
```

Remove o produto com o ID informado.

---

## 🔧 Banco de Dados

Crie a tabela `PRODUTO` no seu banco de dados MySQL:

```sql
CREATE TABLE PRODUTO (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NOME VARCHAR(100) NOT NULL,
    DESCRICAO VARCHAR(255) NOT NULL,
    VALOR DECIMAL(10,2) NOT NULL,
    QUANTIDADE INT NOT NULL,
    IMAGEM VARCHAR(255) NOT NULL
);
```

---

## ⚙️ Testando a API

Você pode testar a API usando ferramentas como **Insomnia**, **Postman**, ou **curl**.

---

## 📂 Uploads

As imagens dos produtos são salvas na pasta `/uploads`.

---

## ✔️ Observações

- A API retorna respostas no formato **JSON**.
- É necessário configurar corretamente seu ambiente PHP e MySQL (ex: XAMPP).
- A estrutura está pronta para evoluções futuras (ex: JWT, autenticação, middleware, etc.).
