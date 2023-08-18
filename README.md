# Sistema CRUD em Laravel e MySQL

Este é um exemplo de sistema CRUD (Create, Read, Update, Delete) desenvolvido em Laravel e MySQL. Ele permite gerenciar informações de pessoas e seus endereços.

## Requisitos

Certifique-se de que você possui o seguinte instalado no seu ambiente:

- PHP (recomendado: versão 7.4 ou superior)
- Composer
- MySQL (ou outro banco de dados compatível)
- Servidor Web (por exemplo, Apache ou Nginx)

## Instalação

1. Clone o repositório para o seu ambiente local:

git clone https://github.com/seu-usuario/sistema-crud-laravel.git

2. Navegue para o diretório do projeto:

cd sistema-crud-laravel

3. Instale as dependências usando o Composer:

composer install

4. Crie um arquivo `.env` a partir do arquivo `.env.example` e configure as informações de banco de dados:

cp .env.example .env

5. Gere a chave de aplicação:

php artisan key:generate

6. Crie o banco de dados no MySQL e atualize as configurações no arquivo `.env`.

7. Execute as migrações para criar as tabelas no banco de dados:

php artisan migrate

8. Inicie o servidor local:

php artisan serve

## Uso

1. Acesse o sistema no navegador em `http://localhost:8000`.

2. Na página inicial, você verá uma lista de pessoas cadastradas.

3. Para adicionar uma nova pessoa, clique no botão "Adicionar Registro" e preencha o formulário.

4. Para editar uma pessoa existente, clique no botão "Editar" na lista de pessoas e faça as alterações desejadas.

5. Para excluir uma pessoa, clique no botão "Excluir" na lista de pessoas.

6. Para consultar o CEP de um endereço, preencha o campo de CEP no formulário de criação ou edição. A consulta será feita automaticamente usando a API ViaCEP.

7. Lembre-se de preencher todos os campos obrigatórios e seguir as validações especificadas.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para fazer um fork deste repositório e enviar pull requests com melhorias, correções de bugs ou novos recursos.

## Licença

Este projeto é licenciado sob a [Licença MIT](LICENSE).
