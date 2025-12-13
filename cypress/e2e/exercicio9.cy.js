describe('Exercício 9 - Gerador de Estrelas', () => {
  beforeEach(() => {
    cy.visit('/exercicio9/')
  })

  it('Mostrando o título, input e o botão submit', () => {
    cy.contains('Digite um número para ver as estrelas se organizarem em linhas').should('be.visible')
    cy.get('input[type="number"]').should('be.visible')
    cy.get('input[type="submit"]').should('be.visible')
  })

  it('Gerar estrelas quando o número 1 é digitado', () => {
    cy.get('input[type="number"]').type('1')
    cy.get('input[type="submit"]').click()
    cy.contains('Você escolheu 1').should('be.visible')
    cy.contains('* (1 estrela)').should('be.visible')
  })

  it('Gerar estrelas quando o número 22 é digitado', () => {
    cy.get('input[type="number"]').clear().type('22')
    cy.get('input[type="submit"]').click()
    cy.contains('********************** (22 estrelas)').should('be.visible')
  })

  it('Gerar estrelas quando o número 53 é digitado', () => {
    cy.get('input[type="number"]').clear().type('53')
    cy.get('input[type="submit"]').click()
    cy.contains('***************************************************** (53 estrelas)').should('be.visible')
  })

  context('Testes de Segurança e Validação', () => {

    it('Deve impedir XSS (Javascript Injection)', () => {
      const payload = '<script>alert("Hacked")</script>';

      cy.get('input[name="estrela"]')
        .invoke('attr', 'type', 'text')
        .clear()
        .type(payload);

      cy.get('form').invoke('attr', 'novalidate', true);
      cy.get('input[type="submit"]').click();

      cy.get('body').should('not.contain', '<script>');
      cy.contains('Por favor, digite um número válido').should('be.visible');
    });

    it('Deve impedir SQL/PHP Injection', () => {
      const payload = "1 OR 1=1; DROP TABLE users;";

      cy.get('input[name="estrela"]')
        .invoke('attr', 'type', 'text')
        .clear()
        .type(payload);

      cy.get('form').invoke('attr', 'novalidate', true);
      cy.get('input[type="submit"]').click();

      cy.contains('Por segurança, o número máximo permitido é 100').should('be.visible');
    });

    it('Deve impedir DoS (Denial of Service) com números gigantes', () => {
      cy.get('input[name="estrela"]').clear().type('999999');

      cy.get('form').invoke('attr', 'novalidate', true);

      cy.get('input[type="submit"]').click();

      cy.contains('Por segurança, o número máximo permitido é 100').should('be.visible');
    });

    it('Deve tratar inputs negativos', () => {
      cy.get('input[name="estrela"]').clear().type('-5');

      cy.get('form').invoke('attr', 'novalidate', true);

      cy.get('input[type="submit"]').click();

      cy.contains('Por favor, digite um número válido maior que zero').should('be.visible');
    });
  });
});