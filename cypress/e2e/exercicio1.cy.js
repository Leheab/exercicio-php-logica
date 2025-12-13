describe('A Home', () => {
  it('passes', () => {
    cy.visit('/exercicio1/')
  })

  it('mostrar o título, inputs e botão', () => {
    cy.visit('/exercicio1')
    cy.contains('h1', 'Estou no exercício 1').should('be.visible')
    cy.get('input[name="value1"]').should('exist')
    cy.get('input[name="value2"]').should('exist')
    cy.get('input[type="submit"]').should('exist')
  })

  it('aparecer com +8 quando a soma for maior que 20', () => {
    cy.visit('/exercicio1')
    cy.get('input[name="value1"]').type('15')
    cy.get('input[name="value2"]').type('10')
    cy.get('input[type="submit"]').click()
    cy.contains('O resultado foi: 33').should('be.visible')
  })

  it(' aparecer -5 quando a soma é menor que 20', () => {
    cy.visit('/exercicio1')
    cy.get('input[name="value1"]').type('8')
    cy.get('input[name="value2"]').type('10')
    cy.get('input[type="submit"]').click()
    cy.contains('O resultado foi: 13').should('be.visible')
  })

  it(' aparecer resultado com -5 quando a soma é igual a 20', () => {
    cy.visit('/exercicio1')
    cy.get('input[name="value1"]').type('10')
    cy.get('input[name="value2"]').type('10')
    cy.get('input[type="submit"]').click()
    cy.contains('O resultado foi: 15').should('be.visible')
  })

  it('Deve bloquear JS Injection (XSS) e mostrar erro de validação', () => {
    cy.visit('/exercicio1')
    cy.get('input[name="value1"]').then(($input) => {
      $input.attr('type', 'text')
    }).type('<script>alert("Hacked")</script>', { parseSpecialCharSequences: false })

    cy.get('input[name="value2"]').type('10')
    cy.get('input[type="submit"]').click()

    cy.contains('Por favor, digite números válidos.').should('be.visible')
    cy.get('body').should('not.contain.html', '<script>alert("Hacked")</script>')
  })

  it('Deve bloquear SQL Injection e mostrar erro de validação', () => {
    cy.visit('/exercicio1')
    cy.get('input[name="value1"]').then(($input) => {
      $input.attr('type', 'text')
    }).type("' OR 1=1 --")

    cy.get('input[name="value2"]').type('10')
    cy.get('input[type="submit"]').click()

    cy.contains('Por favor, digite números válidos.').should('be.visible')
  })

  it('Deve bloquear PHP Code Injection e mostrar erro de validação', () => {
    cy.visit('/exercicio1')
    cy.get('input[name="value1"]').then(($input) => {
      $input.attr('type', 'text')
    }).type('<?php phpinfo(); ?>', { parseSpecialCharSequences: false })

    cy.get('input[name="value2"]').type('10')
    cy.get('input[type="submit"]').click()

    cy.contains('Por favor, digite números válidos.').should('be.visible')
  })
})