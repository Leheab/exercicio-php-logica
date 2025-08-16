# Exercicio de lógica para projeto Novos Titans

## Como rodar

## Requisitos
- PHP 8  ou superior
- Docker (para rodar ambiente)
- Node.js e Cypress (para teste automatizado)

### Passo a passo de uso Docker:
1. Acesse a pasta do projeto
2. Rode o comando: `docker-compose up`
4. Acesse no seu navegador a url: `localhost:8585`
5. No incide, escolha o exercicio que deseja testar.

### Passo a passo de uso Cypress:
1. Acesse a pasta do projeto
2. Verifique que o servidor do projeto esta rodando
3. Configure a baseUrl para o seu localhost no arquivo cypress.config.js:
    e2e:{ `http://localhost:8585`
    }
4. Abra a interface do Cypress com o comando: `npx cypress open`
5. Selecione o arquivo que deseja fazer o teste
