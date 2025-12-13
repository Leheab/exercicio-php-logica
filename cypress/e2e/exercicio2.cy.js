describe('A home', () => {
  it('Visita a página do exercício', () => {
    cy.visit('/exercicio2/')
  })

  it('Precisa informar se o número é divisível por 7', () => {
    cy.visit('/exercicio2/')
    cy.get('input[name="numero1"]').should('be.visible').type('21')
    cy.get('input[type="submit"]').click()
    cy.contains('O número 21 é divisível por 7.').should('be.visible')
  })

  it('Precisa informar se o número é divisível por 8', () => {
    cy.visit('/exercicio2/')
    cy.get('input[name="numero1"]').should('be.visible').type('16')
    cy.get('input[type="submit"]').click()
    cy.contains('O número 16 é divisível por 8.').should('be.visible')
  })

  it('Precisa informar se o número é divisível por 9', () => {
    cy.visit('/exercicio2/')
    cy.get('input[name="numero1"]').should('be.visible').type('36')
    cy.get('input[type="submit"]').click()
    cy.contains('O número 36 é divisível por 9.').should('be.visible')
  })

  it('Precisa informar se o número NÃO é divisível por 7, 8 ou 9', () => {
    cy.visit('/exercicio2/')
    cy.get('input[name="numero1"]').should('be.visible').type('5')
    cy.get('input[type="submit"]').click()
    cy.contains('O número 5 não é divisível por 7, 8 ou 9.').should('be.visible')
  })

  it('Precisa informar a necessidade de preencher o campo com número para exibir algum resultado', () => {
    cy.visit('/exercicio2/')
    cy.get('input[name="numero1"]').should('be.visible').clear()
    cy.get('input[type="submit"]').click()
    cy.contains('Por favor, insira um número válido.').should('be.visible')
  })

  it('Deve bloquear JS Injection (XSS) e mostrar erro de validação', () => {
    cy.visit('/exercicio2/')

    cy.get('input[name="numero1"]').then(($input) => {
      $input.attr('type', 'text')
    }).type('<script>alert("XSS")</script>', { parseSpecialCharSequences: false })

    cy.get('input[type="submit"]').click()

    cy.contains('Por favor, insira um número válido.').should('be.visible')
    cy.get('body').should('not.contain.html', '<script>alert("XSS")</script>')
  })

  it('Deve bloquear SQL Injection e mostrar erro de validação', () => {
    cy.visit('/exercicio2/')

    cy.get('input[name="numero1"]').then(($input) => {
      $input.attr('type', 'text')
    }).type("' OR 1=1 --")

    cy.get('input[type="submit"]').click()

    cy.contains('Por favor, insira um número válido.').should('be.visible')
  })

  it('Deve bloquear PHP Code Injection e mostrar erro de validação', () => {
    cy.visit('/exercicio2/')

    cy.get('input[name="numero1"]').then(($input) => {
      $input.attr('type', 'text')
    }).type('<?php phpinfo(); ?>', { parseSpecialCharSequences: false })

    cy.get('input[type="submit"]').click()

    cy.contains('Por favor, insira um número válido.').should('be.visible')
  })
})