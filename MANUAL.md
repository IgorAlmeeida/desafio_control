Manual de Funcionamento<br>
1 - Ambiente de desenvolvimento:<br>
Linux Mint 20<br>
Google Chrome 87<br>
PHP 7.4<br>
Laravel 8<br>
Banco de dados PgSQL<br>
Composer<br>
2 - Preparando o ambiente:<br>
Instalando o PHP e Apache 2<br>
sudo apt-get install apache2<br>
sudo apt-get install libapache2-mod-php<br>
sudo apt-get install php-pgsql<br>
sudo apt-get install php-curl<br>
sudo apt-get install php-bcmath php-mbstring php-pgsql php-xml php-zip<br>
Instalando o SGBD<br>
sudo apt-get install postgresql pgadmin3<br>
Instalando o Composer<br>
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"<br>
php composer-setup.php<br>
php -r "unlink('composer-setup.php');"<br>
sudo mv composer.phar /usr/local/bin/composer<br>
Instalando o Laravel 8<br>
composer global require "laravel/installer"<br>
3 - Criando os bancos de dados<br>
sudo -u postgres psql -c "ALTER USER postgres PASSWORD 'postgres';"<br>
sudo -u postgres psql -c "CREATE DATABASE desafio_control;"<br>
sudo -u postgres psql -c "CREATE DATABASE desafio_control_test;"<br>
4 - Clone project<br>
5 - Na pasta do projeto executar:<br>
cp .env.example .env<br>
composer update<br>
php artisan key:generate<br>
php artisan migrate:fresh --seed<br>
6 - Rodando o servidor:<br>
php artisan serve<br>
acessar página inicial em localhost:8000<br>
7 - Rodando testes unitários e de integração:<br>
php artisan test<br>
8 - Rodando os testes de navegador:<br>
verificar a versão do google chrome para requisitar o driver, Ex: 88<br>
php artisan dusk:chrome-driver 88<br>
deixar o servidor rodando<br>
php artisan serve<br>
Executar os testes:<br>
php artisan dusk <br>

