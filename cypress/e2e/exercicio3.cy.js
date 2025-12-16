describe('A home', () => {
  beforeEach(() => {
    cy.visit('/exercicio3/')
  })

  it('Precisa aprovar a Letícia com CNH categoria B com 29 anos', () => {
    cy.get('input[name="nome"]').type('Letícia')
    cy.get('input[name="idade"]').type('29')
    cy.get('select[name="categoria"]').select('B')
    cy.get('input[type="submit"]').click()
    cy.contains('Letícia').should('be.visible')
    cy.contains('APTO PARA CONTRATAÇÃO').should('be.visible')
  })

  it('Precisa reprovar a Helena com CNH categoria A com 24 anos', () => {
    cy.get('input[name="nome"]').type('Helena')
    cy.get('input[name="idade"]').type('24')
    cy.get('select[name="categoria"]').select('A')
    cy.get('input[type="submit"]').click()
    cy.contains('Helena').should('be.visible')
    cy.contains('NÃO APTO').should('be.visible')
  })

  it('Deve proteger contra XSS (JS Injection) no campo Nome', () => {
    const scriptMalicioso = '<script>alert("XSS")</script>'

    cy.get('input[name="nome"]').type(scriptMalicioso)
    cy.get('input[name="idade"]').type('30')
    cy.get('select[name="categoria"]').select('B')
    cy.get('input[type="submit"]').click()

    cy.contains(scriptMalicioso).should('be.visible')

    cy.get('body').should('not.contain.html', scriptMalicioso)
  })

  it('Deve proteger contra SQL/Code Injection no campo Idade', () => {
    cy.get('input[name="nome"]').type('Tester')

    cy.get('input[name="idade"]').invoke('attr', 'type', 'text').clear().type('30 OR 1=1')
    cy.get('select[name="categoria"]').select('B')
    cy.get('input[type="submit"]').click()

    cy.contains('Tester').should('be.visible')
    cy.contains('APTO PARA CONTRATAÇÃO').should('be.visible')
    cy.contains('OR 1=1').should('not.exist')
  })
})