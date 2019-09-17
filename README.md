# Pluri Educacional

## Orientações para instalação e uso do serviço

1. `git clone https://github.com/deyvisonrocha/plataforma-ensino-desafio-pluri.git deyvisonrocha-desafio`
1. `cd deyvisonrocha-desafio`
1. `composer install`
1. `cp .env.example .env`
1. `php artisan key:generate`
1. Alterar os dados do arquivo `.env` para acesso ao banco de dados.
1. `php artisan migrate:fresh --seed`

## Testando API

1. Importar o arquivo `api.postman_collection.json` que está na raiz no Postman, tem todos os _endpoints_

## Rodando os tests

1. Alterar dados do arquivo `.env.testing` de acesso ao banco de dados.
1. `php artisan migrate:fresh --env=testing`
