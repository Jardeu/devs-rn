# Devs do RN - Software de Gerenciamento de Associação

Este é um software desenvolvido para gerenciar os associados e suas anuidades na associação **Devs do RN**. Ele permite o cadastro de associados, a gestão de anuidades, o pagamento de anuidades e o acompanhamento do status de pagamento.

## Funcionalidades

- **Cadastro de Associados**: Permite cadastrar o nome, e-mail, CPF e data de filiação dos associados.
- **Cadastro de Anuidades**: Permite cadastrar anuidades com ano e valor.
- **Cobrança de Anuidades**: O sistema calcula as anuidades devidas pelo associado com base na data de filiação.
- **Pagamento de Anuidade**: Permite realizar o pagamento de anuidades.
- **Controle de Status de Pagamento**: Identifica quais associados estão com as anuidades pagas e quais estão em atraso.

## Requisitos

- **XAMPP** (para rodar o Apache e o MySQL)

## Passos para Instalar e Rodar o Projeto

### 1. Certifique-se de ter o XAMPP instalado

Baixe e instale o XAMPP a partir do site oficial (https://www.apachefriends.org/).

### 2. Clone o Repositório

Clone o repositório do projeto para sua máquina local:

```bash
git clone https://github.com/Jardeu/devs-rn.git
```

### 3. Configuração do Banco de Dados

1. **Abra o XAMPP** e inicie o Apache e o MySQL.
2. Acesse o **phpMyAdmin** através do navegador, no endereço [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. Importe o arquivo `meu_database.sql`, localizado na raiz do projeto, para criar as tabelas no banco de dados.

   - No **phpMyAdmin**, clique na aba **Importar** e escolha o arquivo `meu_database.sql` para importar.

### 4. Executando o Projeto no XAMPP

1. Coloque o projeto na pasta `htdocs` do XAMPP. A pasta `htdocs` está localizada dentro do diretório onde o XAMPP foi instalado. Por exemplo:

   - No **Windows**, a pasta geralmente está em `C:\xampp\htdocs`.
   - No **Linux/Mac**, a pasta geralmente está em `/opt/lampp/htdocs`.

### 5. Acessando o Projeto

Após configurar o banco de dados e o XAMPP, o sistema estará disponível em:

[http://localhost/devs-rn/index.php](http://localhost/devs-rn/index.php)

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
