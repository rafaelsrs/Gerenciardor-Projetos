# Gerenciardor-Projetos

Projeto realizado para seleção da vaga de emprego para a empresa artia conforme ideia proposta

## Pré-requisitos

Antes de começar, certifique-se de ter os seguintes softwares instalados:

- [PHP](https://www.php.net/downloads) >= 8.1
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/downloads/) ou outro banco de dados compatível

## Instalação

Siga os passos abaixo para configurar o ambiente de desenvolvimento:

1. Clone o repositório:
    ```sh
    git clone https://github.com/seu-usuario/seu-repositorio.git
    cd seu-repositorio
    ```

2. Instale as dependências do projeto usando o Composer:
    ```sh
    composer install
    ```

3. Crie um arquivo `.env` na raiz do projeto e configure suas variáveis de ambiente. Você pode usar o arquivo `.env.example` como base:
    ```sh
    cp .env.example .env
    ```

4. Gere a chave da aplicação:
    ```sh
    php artisan key:generate
    ```

5. Configure o banco de dados no arquivo `.env` e execute as migrações:
    ```sh
    php artisan migrate
    ```

## Uso

1. Compile o front-end utilizando:
    ```sh
    npm run dev
    ```

2. Para iniciar o servidor de desenvolvimento, execute o comando abaixo:
    ```sh
    php artisan serve
    ```

## API

Não é necessário nenhuma autorização para o uso da API.
