describe('Sequência de Múltiplos', () => {  
  beforeEach(() => {
    cy.visit('/exercicio11/');
  });

  it('Exibir título da página, input e botão', () => {
    cy.contains('Sequência de Múltiplos').should('be.visible');
    cy.get('input[name="base"]').should('be.visible');
    cy.get('input[name="quantidade"]').should('be.visible');
    cy.get('button').should('be.visible');
  });

  it('Preencher base 2 e quantidade 5', () => {
    cy.get('input[name="base"]').click().type('2');
    cy.get('input[name="quantidade"]').click().type('5');
    cy.get('button').click();
  });

  it('Preencher base 20 e quantidade 5', () => {
    cy.get('input[name="base"]').click().type('20');
    cy.get('input[name="quantidade"]').click().type('5');
    cy.get('button').click();
  });

  it('Preencher base 2 e quantidade 8', () => {
    cy.get('input[name="base"]').click().type('2');
    cy.get('input[name="quantidade"]').click().type('8');
    cy.get('button').click();
  });

  it('Verificar se o resultado aparece na tela', () => {
    cy.get('.resultado').should('be.visible');
  });
});