# Posts API

## Alunos:

Valdir Rugiski Jr.
Wesley Ricardo Lamb

## Requisitos
- PHP 8.2.*
- Composer
- Docker
- ca-certificates
- OpenSSL

## Instalação

1. Na pasta raíz, crie uma cópia do arquivo `.env.example` e o renomeie para `.env`;

2. No arquivo `.env`, informe valores para os parâmetros `POSTGRES_DB` (Nome do banco), `POSTGRES_USER` (Usuário padrão) e `POSTGRES_PASSWORD` (Senha do usuário padrão).

### NGINX

1. Na pasta nginx/conf.d/, crie uma cópia do arquivo `app.castorsoft.dev.conf.example` e salve-o com a extensão `.conf`.

### Certificado

1. Clone o repositório https://github.com/WesleyLamb/certs em ~/dev/WesleyLamb;

**OBS.:** Se preferir, você pode clonar em outra pasta, mas será necessário alterar os volumes no `docker.compose.yml`.

2. Siga o passo 3 do seguinte tutorial: https://gist.github.com/WesleyLamb/113348638bedb0b6aeacbe48efd2ae4c com o arquivo `myCA.pem` disponível no repositório clonado anteriormente.

**OBS.:** O certificado digital gerado é assinado digitalmente por uma certificadora não confiável (eu). A sua utilização deve ser utilizada apenas para fins de desenvolvimento. Caso o navegador reclame de certificado não confiável, basta adicionar o `myCA.pem` às configurações do navegador.

### App

1. Navege para o diretório `app/` e instale as dependências do Laravel:
```bash
$ composer install
```

2. No arquivo `.env`, altere os parâmetros `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` de acordo com os parâmetros `POSTGRES_DB`, `POSTGRES_USER` e `POSTGRES_PASSWORD` do arquivo `../.env`, respectivamente

### Geral

1. Inicie os containeres do projeto com o seguinte comando:
```bash
$ docker compose up -d
```

2. Rode os scripts do banco de dados com o seguinte comando:
```bash
$ docker compose exec app php artisan migrate
```

3. Se preferir, popule o banco de dados com alguns dados fictícios:
```bash
$ docker compose exec app php artisan db:seed --class=DatabaseSeeder
```

## Contribuições

Um 10zão tá ótimo