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
    cy.get('input[name="base"]').type('2', { force: true });
    cy.get('input[name="quantidade"]').type('5', { force: true });
    cy.get('button').click();
    cy.get('.resultado').should('contain', 'Múltiplos de 2');
  });

  it('Preencher base 20 e quantidade 5', () => {
    cy.get('input[name="base"]').type('20', { force: true });
    cy.get('input[name="quantidade"]').type('5', { force: true });
    cy.get('button').click();

    cy.get('.resultado').should('contain', 'Múltiplos de 20');
    cy.get('.resultado').should('contain', '20 X 5 = 100');
    cy.get('#historico').should('be.visible');
  });

  it('Bloquear tentativa de SQL Injection no campo Base', () => {
    cy.get('input[name="base"]').invoke('attr', 'type', 'text');

    cy.get('input[name="base"]').type("1' OR '1'='1", { force: true });
    cy.get('input[name="quantidade"]').type('5', { force: true });
    cy.get('button').click();

    cy.get('.resultado').should('contain', 'Por favor, insira números válidos');
    cy.get('body').should('not.contain', 'SQL syntax');
    cy.get('body').should('not.contain', 'mysqli_');
  });

  it('Bloquear tentativa de XSS (Cross-Site Scripting)', () => {
    cy.get('input[name="base"]').invoke('attr', 'type', 'text');

    const xssPayload = "<script>alert('Hacked')</script>";
    cy.get('input[name="base"]').type(xssPayload, { force: true });
    cy.get('input[name="quantidade"]').type('5', { force: true });

    const stub = cy.stub();
    cy.on('window:alert', stub);

    cy.get('button').click();

    cy.get('.resultado').should('contain', 'Por favor, insira números válidos');

    cy.then(() => {
      expect(stub).not.to.be.called;
    });
  });

  it('Deve higienizar HTML caso a validação de tipo falhe (Defense in Depth)', () => {
    cy.get('input[name="base"]').invoke('attr', 'type', 'text');
    cy.get('input[name="base"]').type('<b>Negrito</b>', { force: true });
    cy.get('input[name="quantidade"]').type('5', { force: true });
    cy.get('button').click();

    cy.get('body').should('not.contain.html', '<b>Negrito</b>');
    cy.get('.resultado').should('contain', 'Por favor, insira números válidos');
  });

});