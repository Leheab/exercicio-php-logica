describe('Matriz de Vendas (Novos Titans)', () => {
    beforeEach(() => {
        cy.visit('/exercicio19/');
    });

    it('Deve exibir os elementos e o formulário corretamente', () => {
        cy.get('.logo-pequena').should('be.visible');
        cy.contains('NOVOS TITANS').should('be.visible');
        cy.contains('Vendas de Consultoria e Formação').should('be.visible');
        cy.get('#formulario-vendas').should('be.visible');
        cy.get('.botao-azul').should('be.visible');
    });

    it('Deve permitir preencher valores em estados diferentes e mostrar resultado', () => {
        cy.get('input[name="valor_0_0"]').clear().type('1000');
        cy.get('input[name="valor_1_1"]').clear().type('2000');
        cy.get('.botao-azul').click();
        cy.get('#painel-resultado').should('be.visible');
    });

    it('Deve validar se o envio está sendo feito via AJAX', () => {
        cy.intercept('POST', '**/salvar.php').as('chamadaAjax');
        cy.get('input[name="valor_0_0"]').clear().type('500');
        cy.get('.botao-azul').click();
        cy.wait('@chamadaAjax').then((interceptacao) => {
            expect(interceptacao.request.method).to.equal('POST');
        });

        cy.get('#painel-resultado').should('be.visible');
    });

});