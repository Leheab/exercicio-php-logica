describe('A home', () => {
  it('Visita a página do exercício', () => {
    cy.visit('/exercicio6')
  })

  it('Deve exibir o título da página, inputs e botão de enviar', () => {
    cy.visit('/')
    cy.get('a[href="exercicio6/"]').click()
    cy.contains('h1', 'Verificar Dia da Semana:')
    cy.contains('Digite um número de 1 a 7 para verificar o dia correspondente:').should('be.visible')
    cy.get('input[type="number"]').should('exist')
    cy.get('input[type=submit]').contains('Encontrar').should('exist')
  })

  it('deve exibir o "Domingo" quando o número 1 for inserido', () => {
    cy.visit('/exercicio6')
    cy.get('input[type="number"]').type('1')
    cy.get('input[type=submit]').click()
    cy.contains('Resultado: Domingo').should('be.visible')
  }) 

  it('deve exibir o "Segunda-feira" quando o número 2 for inserido', () => {
    cy.visit('/exercicio6')
    cy.get('input[type="number"]').type('2')
    cy.get('input[type=submit]').click()
    cy.contains('Resultado: Segunda-feira').should('be.visible')
  })

  it('deve exibir o "Terça-feira" quando o número 3 for inserido', () => {
    cy.visit('/exercicio6')
    cy.get('input[type="number"]').type('3')
    cy.get('input[type=submit]').click()
    cy.contains('Resultado: Terça-feira').should('be.visible')
  })

  it('deve exibir o "Quarta-feira" quando o número 4 for inserido', () => {
    cy.visit('/exercicio6')
    cy.get('input[type="number"]').type('4')
    cy.get('input[type=submit]').click()
    cy.contains('Resultado: Quarta-feira').should('be.visible')
  })

  it('deve exibir o "Quinta-feira" quando o número 5 for inserido', () => {
    cy.visit('/exercicio6')
    cy.get('input[type="number"]').type('5')
    cy.get('input[type=submit]').click()
    cy.contains('Resultado: Quinta-feira').should('be.visible')
  })

  it('deve exibir o "Sexta-feira" quando o número 6 for inserido', () => {
    cy.visit('/exercicio6')
    cy.get('input[type="number"]').type('6')
    cy.get('input[type=submit]').click()
    cy.contains('Resultado: Sexta-feira').should('be.visible')
  })

  it('deve exibir o "Sabado" quando o número 7 for inserido', () => {
    cy.visit('/exercicio6')
    cy.get('input[type="number"]').type('7')
    cy.get('input[type=submit]').click()
    cy.contains('Resultado: Sabado').should('be.visible')
  })

  it('deve exibir mensagem de erro para número inválido', () => {
    cy.visit('/exercicio6')
    cy.get('input[type="number"]').type('0')
    cy.get('input[type=submit]').click()
    cy.contains('Resultado: Número inválido, por favor digite um número de 1 a 7 para corresponder a um dia da semana.').should('be.visible')
  })
})