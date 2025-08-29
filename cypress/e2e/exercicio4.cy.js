describe('Exercício 4', () => {
  beforeEach(() => {
    cy.visit('/exercicio4/')
  })

  it('Organiza os preços em ordem decrescente e mostra o total', () => {
    cy.get('input[name="valor1"]').type('12.50')
    cy.get('input[name="valor2"]').type('7.30')
    cy.get('input[name="valor3"]').type('20.00')
    cy.get('input[type="submit"]').click()
    cy.contains('R$ 20,00').should('exist')
    cy.contains('R$ 12,50').should('exist')
    cy.contains('R$ 7,30').should('exist')
    cy.contains('Total da compra: R$ 39,80').should('exist')
  })

  it('Não deixa enviar sem preencher os campos', () => {
    cy.get('input[type="submit"]').click()
    cy.get('form').should('exist')
  })

})
