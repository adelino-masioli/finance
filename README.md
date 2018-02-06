# Sistema Financeiro

Micro Sistema Financeiro desenvolvido em PHP - HotMilhas

### Instalação

Para instalar o aplicativo, basta serguir os passo abaixo

Requistos

```
PHP 7x
Composer
MySQL
```

Após o download em um diretório na máquina local, acessar o projeto e seguir os passo abaixo.

```
cd /financas
copiar o arquivo .env.example para .env e alterar as credenciais do banco de dados
composer install
php migrate-seed.php ou rodar o finance_hotmilhas.sql de exemplo que está na raiz do projeto
php -S 127.0.0.1:8000 -t public public/index.php
```

## Author

* **Junior Ferreira**
