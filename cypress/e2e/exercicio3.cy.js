describe('A home', () => {
  it('Visita a página do exercício 3', () => {
    cy.visit('/exercicio3/')
  })

  it('Precisa aprovar a Letícia com CNH categoria B com 29 anos', () => {
    cy.visit('/exercicio3/')
    cy.get('input[name="nome"]').should('be.visible').type('Letícia')
    cy.get('input[name="idade"]').should('be.visible').type('29')
    cy.get('select[name="categoria"]').select('B')
    cy.get('input[type="submit"]').click()
    cy.contains('Letícia: APTO PARA CONTRATAÇÃO').should('be.visible')
  })

  it('Precisa reprovar a Helena com CNH categoria A com 24 anos', () => {
    cy.visit('/exercicio3/')
    cy.get('input[name="nome"]').should('be.visible').type('Helena')
    cy.get('input[name="idade"]').should('be.visible').type('24')
    cy.get('select[name="categoria"]').select('A')
    cy.get('input[type="submit"]').click()
    cy.contains('Helena : NÃO APTO').should('be.visible')
  })
})