# Meu Projeto PHP

Este é um projeto PHP 8.3 que utiliza [Composer](https://getcomposer.org/) para gerenciamento de dependências. O banco de dados é configurado em `config/database.php` e a estrutura inicial do banco é fornecida em um arquivo `bd.sql`.

## Requisitos

- PHP 8.3 ou superior
- Composer
- Servidor web (ex.: Apache, Nginx) ou servidor embutido do PHP
- Banco de dados compatível (ex.: MySQL, MariaDB)

## Login Padrão

Após a instalação, você pode usar o seguinte login padrão para acessar o sistema:

- **E-mail**: `adm@email.com`
- **Senha**: `projeto`

## Instalação

1. **Clone o repositório**:
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositori

2. **Instale as dependências com o Composer**:
   ```bash
   composer install

3. **Configure o banco de dados**:
    ```
   Edite o arquivo config/database.php com suas credenciais de banco de dados.
4. **Importe a estrutura do banco de dados**:
    ```
    O arquivo database.sql contém a estrutura inicial do banco de dados. Importe-o no seu sistema de banco de dados:
##  Configuração do Banco de Dados

O arquivo config/database.php contém as configurações do banco de dados. Exemplo de configuração

   ```bash
    private $host = 'localhost';
    private $db_name = 'titanSoftwareERP';
    private $username = 'root';
    private $password = '';
    