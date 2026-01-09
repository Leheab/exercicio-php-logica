describe('Cadastro de Preços', () => {

  beforeEach(() => {
    cy.visit('/exercicio13/');
  });

  it('Exibe título, input e botão', () => {
    cy.contains('Cadastro de Preços').should('be.visible');
    cy.get('input[name="preco"]').should('be.visible');
    cy.get('input[type="submit"]').should('be.visible');
  });

  it('Digitar preço dentro da faixa', () => {
    cy.get('input[name="preco"]').focus().type('75');
    cy.get('input[type="submit"]').click();
  });

  it('Digitar preço abaixo da faixa', () => {
    cy.get('input[name="preco"]').focus().type('20');
    cy.get('input[type="submit"]').click();
    cy.get('.resultado').should('contain', 'Preço cadastrado');
  });

  it('Digitar preço acima da faixa', () => {
    cy.get('input[name="preco"]').type('300');
    cy.get('input[type="submit"]').click();
    cy.get('.resultado').should('contain', 'Preço cadastrado');
  });

  it('Digitar -1 para encerrar', () => {
    cy.get('input[name="preco"]').type('-1');
    cy.get('input[type="submit"]').click();
    cy.get('.resultado').should('contain', 'Resultado Final');
    cy.get('.resultado').should('contain', 'Total de preços informados');
  });

  it('Proteção contra SQL Injection e XSS', () => {
    cy.get('input[name="preco"]').invoke('attr', 'type', 'text').type('<script>alert(1)</script>');
    cy.get('input[type="submit"]').click();
    cy.get('.resultado').should('contain', 'Erro: Insira apenas números válidos.');
  });

});

