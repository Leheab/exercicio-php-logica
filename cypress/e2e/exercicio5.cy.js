describe('Exercício 5 - Família Silva', () => {
  beforeEach(() => {
    cy.visit('/exercicio5/')
  })

  it('Resultar trigêmeos quando todas as idades forem iguais', () => {
    cy.get('input[name="idade1"]').type('8')
    cy.get('input[name="idade2"]').type('8')
    cy.get('input[name="idade3"]').type('8')
    cy.get('input[type="submit"]').click()
    cy.contains('TRIGÊMEOS').should('exist')
  })

  it('Resultar gêmeos quando duas idades são iguais', () => {
    cy.get('input[name="idade1"]').type('8')
    cy.get('input[name="idade2"]').type('7')
    cy.get('input[name="idade3"]').type('7')
    cy.get('input[type="submit"]').click()
    cy.contains('GÊMEOS').should('exist')
  })

  it('Resultar idades distintas quando todas as idades forem diferentes', () => {
    cy.get('input[name="idade1"]').type('8')
    cy.get('input[name="idade2"]').type('7')
    cy.get('input[name="idade3"]').type('9')
    cy.get('input[type="submit"]').click()
    cy.contains('IDADES DISTINTAS').should('exist')
  })
})