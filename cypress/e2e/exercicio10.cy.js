describe('Exercício 10 - Formulário de Notas (Sem Backend)', () => {  
  beforeEach(() => {
    cy.visit('/exercicio10/');
  });

  it('Exibir o título da página, inputs e botão de enviar', () => {
    cy.contains('Cadastrar Nota do Aluno').should('be.visible');
    cy.get('.logo').should('be.visible');
    cy.get('#nomeAluno').should('be.visible');
    cy.get('#nomeDisciplina').should('be.visible');
    cy.get('#notaAluno').should('be.visible');
  });

  it('Preencher Bruna Oliveira, Matemática, nota 5.0', () => {
    cy.get('#nomeAluno').type('Bruna Oliveira');
    cy.get('#nomeDisciplina').type('Matemática');
    cy.get('#notaAluno').type('5.0');
    cy.get('.botao').click();
  });

  it('Preencher Caique Souza, História, nota 8.0', () => {
    cy.get('#nomeAluno').type('Caique Souza');
    cy.get('#nomeDisciplina').type('História');
    cy.get('#notaAluno').type('8.0');
    cy.get('.botao').click();
  });

  it('Prencher Rayssa de Paula, Matemática, nota 1.2', () => {
    cy.get('#nomeAluno').type('Rayssa de Paula');
    cy.get('#nomeDisciplina').type('Matemática');
    cy.get('#notaAluno').type('1.2');
    cy.get('.botao').click();
  });

  context('Testes de Segurança e Validação', () => {

    it('Deve impedir XSS (Javascript Injection) no Nome', () => {
      const xssPayload = '<script>alert("Hacked")</script>';

      cy.get('#nomeAluno').type(xssPayload);
      cy.get('#nomeDisciplina').type('Segurança');
      cy.get('#notaAluno').type('7.0');

      cy.get('.botao').click();

      cy.on('window:alert', (str) => {
        expect(str).to.not.equal('Hacked');
      });

      cy.get('body').should('not.have.descendants', 'script:contains("alert")');
      cy.contains('Cadastrado com sucesso').should('be.visible');
    });

    it('Deve impedir SQL Injection no Nome', () => {
      // Tenta fechar o comando SQL e deletar a tabela
      const sqlInjection = "Teste'); DROP TABLE exercicio10; --";

      cy.get('#nomeAluno').type(sqlInjection);
      cy.get('#nomeDisciplina').type('Banco de Dados');
      cy.get('#notaAluno').type('5');

      cy.get('.botao').click();

      // 1. Verifica se o cadastro ocorreu (Se o SQL tivesse rodado, daria erro fatal)
      cy.contains('Cadastrado com sucesso').should('be.visible');

      // 2. Verifica se o comando "DROP TABLE" virou TEXTO visível na tela.
      // Se ele aparece escrito na tabela, significa que o Banco de Dados leu como NOME
      // e não como comando de deletar. Isso prova que a segurança funcionou.
      // (Removemos a aspa ' da verificação para evitar erro de codificação HTML)
      cy.contains('DROP TABLE exercicio10').should('be.visible');
    });

    it('Deve impedir Nota Maior que 10 (Validando Backend PHP)', () => {
      cy.get('#nomeAluno').type('Aluno Trapaceiro');
      cy.get('#nomeDisciplina').type('Artes');

      cy.get('#notaAluno').invoke('attr', 'type', 'text').clear().type('20');
      cy.get('form').invoke('attr', 'novalidate', true);

      cy.get('.botao').click();

      cy.contains('Erro: Nota deve ser entre 0 e 10').should('be.visible');
    });

    it('Deve impedir Nota Negativa (Validando Backend PHP)', () => {
      cy.get('#nomeAluno').type('Aluno Negativo');
      cy.get('#nomeDisciplina').type('Física');

      cy.get('#notaAluno').invoke('attr', 'type', 'text').clear().type('-5');
      cy.get('form').invoke('attr', 'novalidate', true);

      cy.get('.botao').click();

      cy.contains('Erro: Nota deve ser entre 0 e 10').should('be.visible');
    });
  });
});
