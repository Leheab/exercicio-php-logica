describe('Exercício 12 - Gerar Pirâmide de Texto', () => {
  beforeEach(() => {
    cy.visit('/exercicio12/');
  });

  it('Testando campo com palavra AMOR, 3 níveis e input', () => {
    cy.get('#palavra').focus().type('AMOR');
    cy.get('#niveis').focus().type('3');
    cy.get('button[type="submit"]').click();
  });

  it('Testando campo com a palavra VIAGEM, 5 níveis e input', () => {
    cy.get('#palavra').focus().type('VIAGEM');
    cy.get('#niveis').focus().type('5');
    cy.get('button[type="submit"]').click();
  });

});

