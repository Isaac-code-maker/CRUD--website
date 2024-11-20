---

# **Site de Advocacia - Ruan Campos Advocacia**

Este é o repositório do projeto de um site para um escritório de advocacia, desenvolvido em PHP utilizando o framework Laravel. O site é totalmente gerenciável pelo administrador, que pode atualizar todas as seções por meio de um painel administrativo intuitivo.

---

## **Funcionalidades**

### **Frontend**
- **Página inicial**: Apresenta informações do escritório e um resumo das áreas de atuação.
- **Sobre Mim**: Uma seção dedicada à história e experiência do advogado.
- **Depoimentos**: Exibe relatos de clientes, incluindo avaliações.
- **Áreas de Atuação**: Detalha as áreas jurídicas em que o advogado atua.

### **Painel Administrativo**
- Gerenciamento completo de conteúdo:
  - **Sobre Mim**: Permite editar o texto descritivo.
  - **Depoimentos**:
    - Adicionar novos relatos.
    - Editar relatos existentes.
    - Excluir relatos.
  - **Áreas de Atuação**:
    - Adicionar novas áreas.
    - Editar ou excluir áreas cadastradas.
- **Autenticação**:
  - Sistema de login para garantir que apenas o administrador tenha acesso ao painel.

---

## **Tecnologias Utilizadas**

- **PHP** com **Laravel** (framework principal)
- **MySQL** (banco de dados)
- **Blade** (motor de templates do Laravel)
- **Composer** (gerenciador de dependências)
- **Artisan** (CLI do Laravel para gerenciamento do projeto)

---

## **Instalação**

### **Pré-requisitos**
Certifique-se de ter os seguintes softwares instalados em sua máquina:
- PHP (>= 8.0)
- Composer
- MySQL
- Node.js (opcional, para compilação de assets)
- Laravel (>= 10.x)

### **Passos para configurar o projeto**

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/https://github.com/Isaac-code-maker/CRUD--website
   cd nome-do-repositorio
   ```

2. Instale as dependências do Laravel:
   ```bash
   composer install
   ```

3. Configure o arquivo `.env`:
   - Renomeie o arquivo `.env.example` para `.env`.
   - Configure as credenciais do banco de dados:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=seu_banco
     DB_USERNAME=seu_usuario
     DB_PASSWORD=sua_senha
     ```

4. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

5. Execute as migrações para criar as tabelas no banco de dados:
   ```bash
   php artisan migrate
   ```

7. Inicie o servidor local:
   ```bash
   php artisan serve
   ```
   O site estará disponível em [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## **Estrutura do Banco de Dados**

- **Tabela `sobre_mim`**:
  - `id` (int, primary key)
  - `conteudo` (text)
  - `created_at` e `updated_at` (timestamps)

- **Tabela `depoimentos`**:
  - `id` (int, primary key)
  - `nome` (string)
  - `relato` (text)
  - `nota` (int)
  - `created_at` e `updated_at` (timestamps)

- **Tabela `areas_atuacao`**:
  - `id` (int, primary key)
  - `titulo` (string)
  - `descricao` (text)
  - `created_at` e `updated_at` (timestamps)

---

## **Como Contribuir**

1. Faça um fork do projeto.
2. Crie um branch com sua feature ou correção de bug:
   ```bash
   git checkout -b minha-feature
   ```
3. Commit suas alterações:
   ```bash
   git commit -m "Descrição da feature ou correção"
   ```
4. Faça um push para o branch:
   ```bash
   git push origin minha-feature
   ```
5. Abra um Pull Request.

---
