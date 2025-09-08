describe('A home', () => {
  beforeEach(() => {
    cy.visit('/exercicio7/')
  })

  it('Testando o título da página', () => {
    cy.contains('Conheça o nosso espaço no Rio de Janeiro ').should('be.visible')
  })

  it('Testando o campo de empresa', () => {
    cy.get('input[name="empresa"]').should('be.visible')
  })

  it('Testando o botão para gerar o comprovante', () => {
    cy.get('button[type="submit"]').should('be.visible')
  })

  it('Exibindo 14 dias quando o plano é Premium', () => {
    cy.get('input[name="empresa"]').type('Escritório Novo Horizonte')
    cy.get('select[name="plano"]').select('Premium')
    cy.get('button[type="submit"]').click()
    cy.contains('Duração da Reserva: 14 dias').should('be.visible')
  })

  it('Exibindo 5 dias quando o plano é Básico', () => {
    cy.get('input[name="empresa"]').type('LaboArt')
    cy.get('select[name="plano"]').select('Básico')
    cy.get('button[type="submit"]').click()
    cy.contains('Duração da Reserva: 5 dias').should('be.visible')
  })
})