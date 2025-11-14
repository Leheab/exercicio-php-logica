describe('Cadastro de Preços', () => {

  beforeEach(() => {
    cy.visit('/exercicio13/');
  });

  it('Exibe título, input e botão', () => {
    cy.contains('Cadastro de Preços').should('be.visible');
    cy.get('input[name="preço"]').should('be.visible');
    cy.get('input[type="submit"]').should('be.visible');
  });

  it('Digitar preço dentro da faixa', () => {
    cy.get('input[name="preço"]').focus().type('75');
    cy.get('input[type="submit"]').click();
  });

  it('Digitar preço abaixo da faixa', () => {
    cy.get('input[name="preço"]').focus().type('20');
    cy.get('input[type="submit"]').click();
  });

  it('Digitar preço acima da faixa', () => {
    cy.get('input[name="preço"]').focus().type('300');
    cy.get('input[type="submit"]').click();
  });

  it('Digitar -1 para encerrar', () => {
    cy.get('input[name="preço"]').focus().type('-1');
    cy.get('input[type="submit"]').click();
  });

  it('Verificar se a área de resultado aparece', () => {
    cy.get('.resultado').should('be.visible');
  });

});

