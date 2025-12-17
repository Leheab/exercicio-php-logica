describe('Frontend - Interface do Simulador', () => {

  beforeEach(() => {
    cy.visit('/exercicio14/');
  });

  it('Deve carregar o Card Principal com o estilo correto', () => {
    cy.get('.custom-card').should('be.visible');

    cy.contains('h4', 'Simulador de Rendimentos').should('be.visible');
    cy.contains('Compare a evolução patrimonial').should('be.visible');
  });

  it('Deve exibir as duas colunas de comparação (Menor vs Maior)', () => {
    cy.contains('Começa Menor').should('be.visible');
    cy.contains('Começa Maior').should('be.visible');

    cy.get('.divider-vertical').should('exist');
  });

  it('Deve ter todos os 6 campos de input visíveis', () => {
    const campos = ['nome1', 'valor1', 'taxa1', 'nome2', 'valor2', 'taxa2'];

    campos.forEach(campo => {
      cy.get(`input[name="${campo}"]`).should('be.visible');
    });
  });

  it('Deve verificar se os ícones do Materialize estão presentes', () => {
    cy.get('.input-field i.material-icons').should('have.length.at.least', 6);
    cy.get('i.material-icons').contains('person_outline');
    cy.get('i.material-icons').contains('monetization_on');
  });

  it('Deve permitir digitar valores nos campos', () => {
    cy.get('input[name="nome1"]')
      .clear()
      .type('Teste Frontend')
      .should('have.value', 'Teste Frontend'); // Verifica se o valor ficou lá

    cy.get('input[name="valor1"]')
      .clear()
      .type('9999.50')
      .should('have.value', '9999.50');
  });

  it('Deve ter o botão de calcular estilizado', () => {
    cy.get('button[type="submit"]')
      .should('be.visible')
      .and('have.class', 'btn-action') // Classe CSS personalizada
      .contains('Realizar Cálculo');
  });

});