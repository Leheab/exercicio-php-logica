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
    cy.get('#resultado').should('contain', 'Contagem dos números:')
    cy.get('#resultado').should('contain', '1 2 3')
    cy.get('#resultado').should('contain', 'Resultado da média: 2,00')
  })

  it('Calcular e apresentar a média quando o número 10 é digitado', () => {
    cy.get('input[type="number"]').type('10')
    cy.get('input[type="submit"]').click()

    cy.get('#resultado').contains(/Contagem dos números:.*1 2 3 4 5 6 7 8 9 10/)
    cy.get('#resultado').should('contain', 'Resultado da média: 5,50')
  })

  it('Calcular e apresentar a média quando o número 50 é digitado', () => {
    cy.get('input[type="number"]').type('50')
    cy.get('input[type="submit"]').click()
    cy.get('#resultado').should('contain', 'Contagem dos números:')
    cy.get('#resultado').should('contain', '1 2 3 4 5')
    cy.get('#resultado').should('contain', '46 47 48 49 50')
    cy.get('#resultado').should('contain', 'Resultado da média: 25,50')
  })

})
