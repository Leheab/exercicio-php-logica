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

  it('Calcular e apresentar a médiaquando o número 3 é digitado', () => {
    cy.get('input[type="number"]').type('3')
    cy.get('input[type="submit"]').click()
    cy.contains('Contagem dos números: 1 2 3').should('be.visible')
    cy.contains('Resultado da média: 2').should('be.visible')
  })

  it('Calcular e apresentar a média quando o número 10 é digitado', () => {
    cy.get('input[type="number"]').type('10')
    cy.get('input[type="submit"]').click()
    cy.contains('Contagem dos números: 1 2 3 4 5 6 7 8 9 10').should('be.visible')
    cy.contains('Resultado da média: 5').should('be.visible')
  })

  it('Calcular e apresentar a média quando o número 50 é digitado', () => {
    cy.get('input[type="number"]').type('50')
    cy.get('input[type="submit"]').click()
    cy.contains('Contagem dos números: 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 31 32 33 34 35 36 37 38 39 40 41 42 43 44 45 46 47 48 49 50').should('be.visible')
    cy.contains('Resultado da média: 25').should('be.visible')
  })

})
