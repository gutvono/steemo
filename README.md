# Steemo Login/Cadastro (Protótipo)

## Visão Geral

- Adiciona telas de `login` e `cadastro` com PHP.
- Integra com MySQL em container Docker.
- Estrutura organizada em `public`, `src`, `scripts`, `docker`.
- Senhas armazenadas em texto plano e sem validações robustas.

## Estrutura de Pastas

- `public/` páginas acessíveis: `login.php`, `register.php`.
- `src/` backend PHP: `config.php`, `db.php`, `handle_login.php`, `handle_register.php`.
- `scripts/` SQL: `init.sql` (criação), `seed.sql` (popular).
- `docker/` Dockerfile do MySQL.

## Executar o MySQL com Docker

1. Construir imagem:
   - `docker build -t steemo-mysql ./docker`
2. Subir container:
   - `docker run -d --name steemo-mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=steemo_db -e MYSQL_USER=steemo_user -e MYSQL_PASSWORD=steemo_pass steemo-mysql`

O banco ficará acessível em `127.0.0.1:3306`.

## Rodar os Scripts SQL

Opção A (copiar e executar dentro do container):
- `docker cp scripts/init.sql steemo-mysql:/tmp/init.sql`
- `docker exec steemo-mysql mysql -uroot -proot -e "SOURCE /tmp/init.sql"`
- `docker cp scripts/seed.sql steemo-mysql:/tmp/seed.sql`
- `docker exec steemo-mysql mysql -uroot -proot -e "SOURCE /tmp/seed.sql"`

Opção B (montar scripts ao iniciar para auto-inicialização):
- `docker run -d --name steemo-mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=steemo_db -e MYSQL_USER=steemo_user -e MYSQL_PASSWORD=steemo_pass -v ${PWD}/scripts:/docker-entrypoint-initdb.d steemo-mysql`

## Rodar o PHP (Servidor embutido)

- Requer PHP instalado localmente.
- No diretório do projeto:
  - `php -S localhost:8080 -t public`
- Acesse:
  - `http://localhost:8080/login.php`
  - `http://localhost:8080/register.php`

## Banco de Dados

- Banco: `steemo_db`
- Tabela: `usuarios`
  - `id` INT AUTO_INCREMENT PRIMARY KEY
  - `nome` VARCHAR(255) NOT NULL
  - `email` VARCHAR(255) NOT NULL UNIQUE
  - `celular` VARCHAR(20) NOT NULL
  - `nivel` ENUM('usuario','administrador') NOT NULL
  - `senha` VARCHAR(255) NOT NULL
  - `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP

## Credenciais de Teste (Seeder)

- `alice@example.com` / `123456` (usuario)
- `bruno@example.com` / `admin123` (administrador)
- `carla@example.com` / `senha` (usuario)

## Integração no Site

- O menu da página principal (`index.html`) contém o link `Login` apontando para `public/login.php`.

## Observações

- Projeto em caráter de protótipo, sem criptografia ou segurança avançada.
- Qualquer usuário pode escolher nível `administrador` no cadastro.
