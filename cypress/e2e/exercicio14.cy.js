describe('Frontend - Interface do Simulador', () => {

  beforeEach(() => {
    cy.visit('/exercicio14/');
  });

  it('Deve carregar a interface', () => {
    cy.get('input[name="nome1"]').should('have.value', '');
    cy.get('input[name="valor1"]').should('have.value', '');
    cy.get('input[name="nome2"]').should('have.value', '');
  });

  it('Deve verificar a dinâmica das labels (classe active)', () => {
    cy.get('label[for="nome1"]').should('not.have.class', 'active');

    cy.get('input[name="nome1"]').type('Maria', { force: true });
    cy.get('input[name="valor1"]').type('5000', { force: true });
    cy.get('input[name="taxa1"]').type('2', { force: true });
    cy.get('input[name="nome2"]').type('João', { force: true });
    cy.get('input[name="valor2"]').type('8000', { force: true });
    cy.get('input[name="taxa2"]').type('1', { force: true });

    cy.get('button[type="submit"]').click({ force: true });

    cy.get('label[for="nome1"]').should('have.class', 'active');
  });

  it('Deve manter os dados nos campos após o cálculo (Persistência)', () => {
    const nomeTeste = 'Ana Maria';
    cy.get('input[name="nome1"]').type(nomeTeste, { force: true });
    cy.get('input[name="valor1"]').type('1000', { force: true });
    cy.get('input[name="taxa1"]').type('5', { force: true });
    cy.get('input[name="nome2"]').type('Carlos', { force: true });
    cy.get('input[name="valor2"]').type('2000', { force: true });
    cy.get('input[name="taxa2"]').type('1', { force: true });

    cy.get('button[type="submit"]').click({ force: true });

    cy.get('input[name="nome1"]').should('have.value', nomeTeste);
  });

  it('Deve validar a mensagem de erro quando a ultrapassagem é impossível', () => {
    cy.get('input[name="nome1"]').type('Pessoa Lenta', { force: true });
    cy.get('input[name="valor1"]').type('1000', { force: true });
    cy.get('input[name="taxa1"]').type('1', { force: true });
    cy.get('input[name="nome2"]').type('Pessoa Rápida', { force: true });
    cy.get('input[name="valor2"]').type('5000', { force: true });
    cy.get('input[name="taxa2"]').type('2', { force: true });

    cy.get('button[type="submit"]').click({ force: true });

    cy.get('.result-box').should('be.visible');
    cy.get('.red-text').should('contain', 'nunca alcançará');
  });

  it('Deve validar quando a Pessoa 1 já começa com valor maior', () => {
    cy.get('input[name="nome1"]').type('Rico', { force: true });
    cy.get('input[name="valor1"]').type('10000', { force: true });
    cy.get('input[name="nome2"]').type('Pobre', { force: true });
    cy.get('input[name="valor2"]').type('500', { force: true });
    cy.get('input[name="taxa1"]').type('2', { force: true });
    cy.get('input[name="taxa2"]').type('1', { force: true });

    cy.get('button[type="submit"]').click({ force: true });

    cy.get('.blue-text').should('contain', 'já possui mais capital');
  });

  it('Deve verificar se o cálculo salvou no Histórico', () => {
    const nomeUnico = 'Usuario_' + Date.now();

    cy.get('input[name="nome1"]').type(nomeUnico, { force: true });
    cy.get('input[name="valor1"]').type('5000', { force: true });
    cy.get('input[name="taxa1"]').type('3', { force: true });
    cy.get('input[name="nome2"]').type('Banco', { force: true });
    cy.get('input[name="valor2"]').type('7000', { force: true });
    cy.get('input[name="taxa2"]').type('1', { force: true });

    cy.get('button[type="submit"]').click({ force: true });

    cy.get('table.custom-table tbody tr').first().should('contain', nomeUnico);
  });

});