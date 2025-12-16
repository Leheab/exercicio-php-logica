describe('A home', () => {
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

  it('Resultar idades distintas quando todas as idades forem diferentes', () => {
    cy.get('input[name="idade1"]').type('8')
    cy.get('input[name="idade2"]').type('7')
    cy.get('input[name="idade3"]').type('9')
    cy.get('input[type="submit"]').click()
    cy.contains('IDADES DISTINTAS').should('exist')
  })


  it('Deve proteger contra XSS (JS Injection) convertendo script em 0', () => {
    cy.get('input[name="idade1"]').invoke('attr', 'type', 'text').clear().type('<script>alert("HACK")</script>')
    cy.get('input[name="idade2"]').type('10')
    cy.get('input[name="idade3"]').type('10')

    cy.get('input[type="submit"]').click()

    cy.get('body').should('not.contain.html', '<script>alert("HACK")</script>')

    cy.contains('Idades processadas: 0, 10, 10').should('exist')
  })

  it('Deve proteger contra SQL Injection sanitizando a entrada para inteiro', () => {
    cy.get('input[name="idade1"]').invoke('attr', 'type', 'text').clear().type('20 OR 1=1')
    cy.get('input[name="idade2"]').type('20')
    cy.get('input[name="idade3"]').type('20')

    cy.get('input[type="submit"]').click()

    cy.contains('Idades processadas: 20, 20, 20').should('exist')
    cy.contains('TRIGÊMEOS').should('exist')

    cy.contains('OR 1=1').should('not.exist')
  })

  it('Deve proteger contra PHP Injection/Code Injection', () => {
    cy.get('input[name="idade1"]').invoke('attr', 'type', 'text').clear().type("system('ls');")
    cy.get('input[name="idade2"]').type('10')
    cy.get('input[name="idade3"]').type('15')

    cy.get('input[type="submit"]').click()

    cy.contains('Idades processadas: 0, 10, 15').should('exist')
    cy.contains('IDADES DISTINTAS').should('exist')
  })
})