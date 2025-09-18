describe('Exercício da Média Aritmética', () => {
  beforeEach(() => {
    cy.visit('/exercicio8/')
  })

  it('Mostrando o título, input e o botão submit', () => {
    cy.contains('Bem-vindo à sua aventura numérica!').should('be.visible')
    cy.contains('Acompanhe a contagem e veja a média do número que você escolher').should('be.visible')
    cy.get('input[type="number"]').should('be.visible')
    cy.get('input[type="submit"]').should('be.visible')
  })

  it(' Aparecer  mensagem notificando se tentar enviar vazio', () => {
    cy.get('input[type="submit"]').click()
  })

  it('Calcular e apresentar a médiaquando o número 3 é digitado', () => {
    cy.get('input[type="number"]').type('3')
    cy.get('input[type="submit"]').click()
    cy.contains('Contagem dos números').should('be.visible')
    cy.contains('Resultado da média').should('be.visible')
  })

  it('Calcular e apresentar a média quando o número 10 é digitado', () => {
    cy.get('input[type="number"]').type('10')
    cy.get('input[type="submit"]').click()
    cy.contains('Contagem dos números').should('be.visible')
    cy.contains('Resultado da média').should('be.visible')
  })

  it('Calcular e apresentar a média quando o número 50 é digitado', () => {
    cy.get('input[type="number"]').type('50')
    cy.get('input[type="submit"]').click()
    cy.contains('Contagem dos números').should('be.visible')
    cy.contains('Resultado da média').should('be.visible')
  })

})
