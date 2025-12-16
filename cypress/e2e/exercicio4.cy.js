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

  it('Deve proteger contra XSS (JS Injection) sanitizando input para 0,00', () => {
    const scriptMalicioso = '<script>alert("XSS")</script>'

    cy.get('input[name="valor1"]').invoke('attr', 'type', 'text').clear().type(scriptMalicioso)
    cy.get('input[name="valor2"]').type('10')
    cy.get('input[name="valor3"]').type('20')

    cy.get('input[type="submit"]').click()

    cy.contains('R$ 0,00').should('be.visible')
    cy.contains('Total da compra: R$ 30,00').should('be.visible')

    cy.get('body').should('not.contain.html', scriptMalicioso)
  })

  it('Deve proteger contra SQL Injection limpando o valor', () => {
    cy.get('input[name="valor1"]').invoke('attr', 'type', 'text').clear().type('50 OR 1=1')
    cy.get('input[name="valor2"]').type('25')
    cy.get('input[name="valor3"]').type('25')

    cy.get('input[type="submit"]').click()

    // Cálculo esperado: 50 + 25 + 25 = 100
    cy.contains('R$ 50,00').should('be.visible')
    cy.contains('Total da compra: R$ 100,00').should('be.visible')

    // Garante que o código SQL não vazou para a tela
    cy.contains('OR 1=1').should('not.exist')
  })
})
