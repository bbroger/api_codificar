# api_codificar
> API para consumir dados do webservice da ALMG.

Desenvolvido com as seguintes tecnologias: Laravel 5.5.45, Xampp 7.2.8 (Apache 2.4.34, MariaDB 10.1.34, PHP 7.2.8, phpMyAdmin 4.8.2), Windows 10.

## Instalação

# Windows:

1. clone o repositório em uma pasta dentro do xampp (htdocs);
2. acesse essa pasta pelo prompt de comando;
3. utilize o Composer para instalar as dependências;
```sh
composer install
```
4. configure o arquivo .env.example com os dados do banco de dados, previamente:
   - crie um banco de dados com o nome api_codificar;
   - gere uma nova chave de hash: php artisan key:;generate;
5. use as migrations para gerar as tabelas do banco de dados (php artisan migrate);
6. inicie o servidor do PHP e acesse o endereço que o sistema apresentará
```sh
php artisan serve
<http://127.0.0.1:8000>
```

## Instruções iniciais de uso:

1. na tela inicial clique no botão Importar informações do WebService;
2. o sistema fará a gravação das informações no Bando de Dados e redirecionará para a página /deputados onde serão apresentados os dados dos deputados estaduais em exercício no estado de MG;

## NavBar (Barra de navegação):

1. link Deputados - redirecionará para a página /deputados onde serão apresentados os dados dos deputados estaduais em exercício no estado de MG;
2. link Redes Sociais - redirecionará para a página /rede_sociais onde serão apresentadas as redes sociais por ordem decrescente de número de deputados inscritos. Nessa página você pode clicar no link Clique aqui para acessar o retorno da API;
3. link Verbas Indenizatórias - redirecionará para a página /verbas onde você poderá selecionar um mês e visualizar os 5 deputados que mais solicitaram reembolso de despesas (as informações já são apresentadas no formato JSON em ordem decrescente de valores).

## Meta

Meu portfólio – Link (https://www.rcssoft.com.br)

[https://github.com/bbroger](https://github.com/bbroger)
