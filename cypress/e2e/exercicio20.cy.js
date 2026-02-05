describe('Teste da Gincana Verde', () => {
    beforeEach(() => {
        cy.visit('/exercicio20/');
    });

    it('Deve verificar se os textos e o botão aparecem na tela', () => {
        cy.contains('Gincana Verde').should('be.visible');
        cy.contains('Registro de Pontuação').should('be.visible');
        cy.get('.btn-eco').should('be.visible');
    });

    it('Deve preencher alguns pontos e clicar no botão', () => {
        cy.get('input[name="ponto[0][0]"]').clear().type('15');
        cy.get('input[name="ponto[2][2]"]').clear().type('20');
        cy.get('.btn-eco').click();
        cy.get('#sessao-resultados').should('be.visible');
    });

    it('Deve conferir se o formulário envia os dados via AJAX para o PHP', () => {
        cy.get('.btn-eco').click();
        cy.wait('@envioAjax').then((interceptacao) => {
            expect(interceptacao.request.method).to.equal('POST');
        });
    });

});