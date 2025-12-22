describe('Exercício 12 - Gerar Pirâmide de Texto', () => {
  beforeEach(() => {
    cy.visit('/exercicio12/');
  });

  it('Testando campo com palavra AMOR, 3 níveis e input', () => {
    cy.get('#palavra').type('AMOR', { force: true });
    cy.get('#niveis').type('3', { force: true });
    cy.get('button[type="submit"]').click();

    cy.get('.resultado').should('contain', 'AMOR');
    cy.get('.resultado').should('contain', 'Níveis: 3');

    cy.get('#historico').should('be.visible');
    cy.get('#historicoPiramides').should('contain', 'AMOR');
  });

  it('Segurança: Bloquear tentativa de XSS (Script Injection)', () => {
    const payload = "<script>alert('Hacked')</script>";
    cy.get('#palavra').type(payload, { force: true });
    cy.get('#niveis').type('2', { force: true });

    const stub = cy.stub();
    cy.on('window:alert', stub);

    cy.get('button[type="submit"]').click();

    cy.then(() => {
      expect(stub).not.to.be.called;
    });

    cy.get('.resultado').find('script').should('not.exist');
    cy.get('.resultado')
      .invoke('html')
      .should('contain', '&lt;script&gt;alert');
  });

  it('Segurança: Bloquear tentativa de HTML Injection (Negrito)', () => {
    cy.get('#palavra').type('<b>Teste</b>', { force: true });
    cy.get('#niveis').type('1', { force: true });
    cy.get('button[type="submit"]').click();

    cy.get('.resultado').should('contain', '<b>Teste</b>');
    cy.get('.resultado').find('b').should('not.exist');
  });

  it('Segurança: Teste de robustez contra caracteres SQL (Single Quote)', () => {
    const sqlPayload = "O'neil";

    cy.get('#palavra').type(sqlPayload, { force: true });
    cy.get('#niveis').type('2', { force: true });
    cy.get('button[type="submit"]').click();

    cy.get('body').should('not.contain', 'SQL syntax');
    cy.get('body').should('not.contain', 'mysqli_');

    cy.get('.resultado')
      .invoke('text')
      .should('match', /O.*neil/);
  });


  it('Funcionalidade: Botão Limpar Tela deve esconder o histórico', () => {
    cy.get('#palavra').type('Teste', { force: true });
    cy.get('#niveis').type('1', { force: true });
    cy.get('button[type="submit"]').click();

    cy.get('#historico').should('be.visible');

    cy.contains('Limpar Tela').click();

    cy.get('#historico').should('not.exist');
  });

});