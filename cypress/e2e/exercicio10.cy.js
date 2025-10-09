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
});