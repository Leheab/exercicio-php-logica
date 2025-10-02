# Exercicio de lógica para projeto Novos Titans

## Como rodar

## Requisitos
- PHP 8  ou superior
- Docker (para rodar ambiente)
- Node.js e Cypress (para teste automatizado)

### Passo a passo de uso Docker:
1. Acesse a pasta do projeto
2. Rode o comando: `docker-compose up`
3. Acesse no seu navegador a url: `localhost:8585`
4. No indice, escolha o exercicio que deseja testar.
5. Para acessar o phpMyAdmin (banco de dados MySQL): `localhost:8080`

### Informações do banco de dados
- Nome do banco: `novos_titans_dados`
- Usuário: `user`
- Senha: `password`
- Volume persistente: `db-data`

### Passo a passo de uso Cypress:
1. Para instalar, entre pasta do projeto e rode: `npm install` 
2. Verifique que o servidor do projeto esta rodando
3. Abra a interface do Cypress com o comando: `npx cypress open`
5. Selecione o arquivo que deseja fazer o teste