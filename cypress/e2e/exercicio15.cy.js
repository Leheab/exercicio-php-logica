describe('Titans Lab - Teste de Interface e Estilo', () => {
  beforeEach(() => {
    cy.visit('/exercicio15/index.php');
  });

  it('1. Deve validar a Identidade Visual (Logo e Header)', () => {
    cy.get('.topo-titans').should('be.visible');
    cy.get('.logo-texto').should('contain', 'TITANS');
    cy.get('.destaque-azul').should('contain', 'LAB');
    cy.get('.logo-icone i').should('have.text', 'biotech');
  });

  it('2. Deve carregar o Painel Principal com os títulos corretos', () => {
    cy.get('.painel-clean').should('be.visible');
    cy.get('.badge-status').should('contain', 'Análise Farmacocinética');
    cy.get('.titulo-sessao').should('contain', 'Simulador de Eliminação');
  });

  it('3. Deve validar os inputs', () => {
    cy.get('input[name="conc_inicial"]').should('be.visible');
    cy.get('input[name="conc_minima"]').should('be.visible');
    cy.get('.campo-clean i.material-icons').contains('science');
    cy.get('.campo-clean i.material-icons').contains('shield');
  });

  it('4. Deve permitir a inserção de dados', () => {
    cy.get('input[name="conc_inicial"]')
      .clear({ force: true })
      .type('500.00', { force: true })
      .should('have.value', '500.00');
    cy.get('input[name="conc_minima"]')
      .clear({ force: true })
      .type('50.00', { force: true })
      .should('have.value', '50.00');
  });

  it('5. Deve validar o design de Bordas Retas', () => {
    cy.get('.painel-clean').should('have.css', 'border-radius', '0px');
    cy.get('.botao-titans').should('have.css', 'border-radius', '0px');
    cy.get('.topo-titans').should('have.css', 'border-radius', '0px');
  });

  it('6. Deve validar o Botão de hover', () => {
    cy.get('.botao-titans')
      .should('be.visible')
      .and('contain', 'Iniciar Processamento')
      .and('have.css', 'background-color', 'rgb(15, 23, 42)');
  });

  it('7. Deve carregar a tabela de histórico vazia ou com registros', () => {
    cy.get('.painel-tabela').should('be.visible');
    cy.get('.titulo-tabela').should('contain', 'Registro de Atividades Recentes');
    cy.get('.tabela-titans th').eq(0).should('contain', 'Data / Hora');
    cy.get('.tabela-titans th').eq(3).should('contain', 'Resultado');
  });

  it('8. Deve validar o link de reset no rodapé', () => {
    cy.get('.link-reset')
      .should('be.visible')
      .contains('Limpar parâmetros')
      .and('have.attr', 'href', 'index.php');
  });

  it('9. Segurança: Deve validar se o sistema calcula e persiste os dados corretamente', () => {
    const valorTeste = "123.45";
    cy.get('input[name="conc_inicial"]').type(valorTeste, { force: true });
    cy.get('input[name="conc_minima"]').type('10.00', { force: true });
    cy.get('.botao-titans').click();

    cy.get('.laudo-tecnico').should('be.visible');
    cy.get('.tabela-titans tbody tr').first().contains('123,45');
  });

  it('10. Segurança: Deve garantir a proteção contra XSS nos inputs', () => {
    const xssAttack = '<script>alert("xss")</script>';

    cy.get('input[name="conc_inicial"]')
      .invoke('attr', 'type', 'text')
      .type(xssAttack, { force: true });

    cy.get('.botao-titans').click();
    cy.get('body').should('not.contain', xssAttack);
  });

  it('11. Segurança: Deve ignorar inputs maliciosos de SQL Injection', () => {
    const sqlInjection = "' OR 1=1 --";

    cy.get('input[name="conc_inicial"]')
      .invoke('attr', 'type', 'text')
      .type(sqlInjection, { force: true });

    cy.get('.botao-titans').click();
    cy.get('body').should('not.contain', 'SQL syntax');
    cy.get('body').should('not.contain', 'Fatal error');
  });

});