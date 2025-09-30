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
    cy.contains('********************** (22 estrelas)').should('be.visible')  })

  it('Gerar estrelas quando o número 53 é digitado', () => {
    cy.get('input[type="number"]').clear().type('53')
    cy.get('input[type="submit"]').click()
    cy.contains('***************************************************** (53 estrelas)').should('be.visible')
  })
})