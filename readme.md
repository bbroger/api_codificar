# api_codificar
API para consumir dados do webservice da ALMG

Desenvolvido com as seguintes tecnologias: Laravel 5.5.45, Xampp 7.2.8 (Apache 2.4.34, MariaDB 10.1.34, PHP 7.2.8, phpMyAdmin 4.8.2), Windows 10.

Instruções de instalação:

a) clone o repositório em uma pasta dentro do xampp (htdocs);
b) acesse essa pasta pelo prompt de comando;
c) utilize o Composer para instalar as dependências (composer install);
d) configure o arquivo .env.example com os dados do banco de dados, previamente:
   i. crie um banco de dados com o nome api_codificar;
  ii. gere uma nova chave de hash: php artisan key:;generate;
e) use as migrations para gerar as tabelas do banco de dados (php artisan migrate);
f) inicie o servidor do PHP (php artisan serve), na tela será apresentado o endereço para acesso a aplicação (semelhante a 
<http://127.0.0.1:8000>.

Instruções iniciais de uso:

a) na tela inicial clique no botão Importar informações do WebService;
b) o sistema fará a gravação das informações no Bando de Dados e redirecionará para a página /deputados onde serão apresentados os dados dos deputados estaduais em exercício no estado de MG;

NavBar (Barra de navegação):

a) link Deputados - redirecionará para a página /deputados onde serão apresentados os dados dos deputados estaduais em exercício no estado de MG;
b) link Redes Sociais - redirecionará para a página /rede_sociais onde serão apresentadas as redes sociais por ordem decrescente de número de deputados inscritos. Nessa página você pode clicar no link Clique aqui para acessar o retorno da API;
c) link Verbas Indenizatórias - redirecionará para a página /verbas onde você poderá selecionar um mês e visualizar os 5 deputados que mais solicitaram reembolso de despesas (as informações já são apresentadas no formato JSON em ordem decrescente de valores).

Obrigado.
