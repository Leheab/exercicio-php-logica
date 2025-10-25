describe('Verificador de Dias da Semana', () => {
  beforeEach(() => {
    cy.visit('/exercicio6/index.php')
  })

  it('Deve exibir o título e o formulário', () => {
    cy.get('h1').should('contain', 'Verificar Dia da Semana:')
    cy.get('label').should('contain', 'Digite um número de 1 a 7')
    cy.get('input[type="number"]').should('exist')
    cy.get('input[type="submit"]').should('have.value', 'Encontrar')
  })

  it('Deve mostrar "Domingo" quando o número 1 for inserido', () => {
    cy.get('input[name="numero"]').clear().type('1')
    cy.get('input[type="submit"]').click()
    cy.contains('Resultado: Domingo').should('be.visible')
  })

  it('Deve mostrar "Sexta-feira" quando o número 6 for inserido', () => {
    cy.get('input[name="numero"]').clear().type('6')
    cy.get('input[type="submit"]').click()
    cy.contains('Resultado: Sexta-feira').should('be.visible')
  })

  it('Deve mostrar mensagem de erro para número inválido', () => {
    cy.get('input[name="numero"]').clear().type('0')
    cy.get('input[type="submit"]').click()
    cy.contains('Número inválido, por favor digite').should('be.visible')
  })
})
