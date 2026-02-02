# Exercicio 18: Sistema de Comparacao de Interesses (Auditoria de Fluxo)

Este documento detalha a implementação do Sistema de Comparação de Interesses de duas pessoas, relacionando os requisitos técnicos solicitados. 

## Conexao com o Enunciado

O objetivo principal do exercicio é o trabalho com multiplos arrays, comparação de conjuntos de dados e a identificação de elementos exclusivos. 

Para contextualizar esses requisitos, o sistema foi modelado como uma ferramenta de Auditoria de Fluxo de uma ONG:
- **Pessoa 1 (Aluno):** Registra uma lista de atividades entregues (NVTs).
- **Pessoa 2 (Mentor):** Registra uma lista de bloqueios ou correções necessárias.
- **Interesses Exclusivos:** O sistema utiliza o conceito de diferenças para identificar o que foi concluido com sucesso (exclusivo do aluno) e o que representa uma divergência (bloqueio, o ponto em comum a ambos). Assim, visando otimizar o dia a dia e demandas existentes.

## Lógica de Desenvolvimento e Diferenciais

O projeto foi estruturado para garantir o fluxo de trabalho através das seguintes implementações:

### 1. Resolucao de Pendencias Pontualmente
Diferente de uma abordagem de resolução em lote, este sistema permite tratar cada bloqueio de forma individual. 
- Cada codigo de NVT bloqueado gera um componente de interação único na tabela de histórico.
- O status de uma entrega só e alterado para "Corrigido" quando todos os itens individuais sao resolvidos pelo usuario.

### 2. Trava de Seguranca Global (Safety Lock)
Seguindo as regras do projeto, foi implementado uma trava para impedir o acumulo de pendências:
- O sistema realiza uma varredura no banco de dados antes de qualquer novo processamento.
- Se o aluno selecionado possuir 2 ou mais NVTs bloqueados (pendentes) em seu historico total, o sistema impede novos envios, independentemente do mentor selecionado.
- Esta contagem e feita através da analise de objetos JSON armazenados no banco de dados.

### 3. Comunicação Assincrona (AJAX com jQuery)
Atendendo aos requisitos do enunciado, toda a comunicação entre o cliente e o servidor utiliza a biblioteca jQuery para chamadas AJAX:
- Os dados são enviados sem recarregamento de página.
- Implementação de trava de estado (anti-duplo clique) para evitar duplicidade de registros no banco de dados durante o processamento.

### 4. Precisão de Dados e Horario
- **Sincronia Temporal:** O sistema forca o fuso horario America/Sao_Paulo via PHP e MySQL, garantindo que o registro de auditoria reflita o horario real de Brasilia em que foi gerado.
- **Integridade de Usuarios:** Uso de chaves unicas (UNIQUE) e consultas agrupadas (GROUP BY) para eliminar nomes duplicados e garantir que a trava de seguranca seja aplicada ao usuario correto.

## Estrutura Técnica

### Funções Principais (Back-end)
- `realizarAuditoriaInteresses()`: Executa as funcões array_diff e array_intersect para separar sucessos de bloqueios.
- `contarTotalDeNvtsBloqueados()`: Funcao responsavel por validar a trava de segurança escaneando pendências do aluno.
- `buscarHistoricoParaTabela()`: Gera dinamicamente o HTML da tabela para resolução individual.

### Fluxo de Dados (Front-end)
- `gerenciarGrafico()`: Utiliza a biblioteca Chart.js para renderizar o desempenho individual do aluno em formato Doughnut.
- `resolverNvtUnico()`: Envia uma requisição AJAX para manipular especificamente um item dentro de um conjunto de dados JSON no MySQL.

## Instruções de Uso

As instruções gerais de configuração do ambiente (Docker, Docker-compose e Portas) encontram-se no arquivo README.md localizado na raiz deste repositorio.

Para este exercício especifico:
1. Importe o arquivo SQL localizado em `exercicio18/db/base.sql` atraves do phpMyAdmin.
2. Selecione um Aluno no formulario para carregar seu historico e grafico individual.
3. Utilize o botao Consultar Status para atualizar os dados de desempenho sem realizar um novo envio.