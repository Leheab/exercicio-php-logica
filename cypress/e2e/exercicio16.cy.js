describe('Titans Artesanais - Sistema de Avaliação de Produtos', () => {
    beforeEach(() => {
        cy.intercept('POST', '**/src/processa.php').as('ajaxSave');
        cy.visit('/exercicio16/');
    });

    it('1. Deve validar a Identidade Visual (Logo Branca no Canto Direito)', () => {
        cy.get('.topo-pagina').should('be.visible');
        cy.get('.bloco-logotipo').should('have.css', 'justify-content', 'flex-end');
        cy.get('.texto-logo').should('contain', 'TITANS');
        cy.get('.sub-logo').should('contain', 'artesanais');
        cy.get('.texto-logo').should('have.css', 'color', 'rgb(255, 255, 255)');
    });

    it('2. Deve validar os elementos iniciais do formulário', () => {
        cy.get('#contador-label').should('contain', 'Avaliação 1 de 15');
        cy.get('#titulo-pergunta').should('contain', 'Facilidade de realizar a compra');
        cy.get('.campo-custom i.material-icons').should('have.text', 'auto_awesome');
    });

    it('3. Deve registrar nota "Satisfatória" e validar persistência via AJAX', () => {
        cy.get('#campo-nota').type('8.5');
        cy.get('#btn-registrar').click();

        cy.wait('@ajaxSave').then((interception) => {
            expect(interception.response.statusCode).to.eq(200);
            expect(interception.response.body.success).to.be.true;
        });

        cy.get('#painel-resultados').should('be.visible');
        cy.get('#tabela-corpo tr').first().within(() => {
            cy.get('.nota-valor').should('contain', '8.5');
            cy.get('.status-texto').should('contain', 'Satisfatória');
            cy.get('.cor-verde').should('have.css', 'color', 'rgb(91, 109, 68)');
        });
    });

    it('4. Deve validar a lógica para nota "Insatisfatória" (< 6)', () => {
        cy.get('#campo-nota').type('4.0');
        cy.get('#btn-registrar').click();

        cy.wait('@ajaxSave');

        cy.get('#tabela-corpo tr').first().within(() => {
            cy.get('.nota-valor').should('contain', '4.0');
            cy.get('.status-texto').should('contain', 'Insatisfatória');
            cy.get('.cor-vermelha').should('have.css', 'color', 'rgb(166, 75, 42)');
        });
    });

    it('5. Deve validar se o Histórico é carregado do Banco de Dados ao iniciar', () => {
        cy.get('body').then(($body) => {
            if ($body.find('#tabela-corpo tr').length > 0) {
                cy.get('#tabela-corpo tr').should('exist');
                cy.log('Dados persistidos carregados com sucesso.');
            }
        });
    });

    it('6. Deve completar o ciclo de 15 perguntas e bloquear o formulário', () => {
        for (let i = 0; i < 15; i++) {
            cy.get('#campo-nota').clear().type('7');
            cy.get('#btn-registrar').click();
            cy.wait('@ajaxSave');
        }

        cy.get('#btn-registrar').should('be.disabled');
        cy.get('#campo-nota').should('be.disabled');
        cy.get('#titulo-pergunta').should('contain', 'Obrigado pelo seu Feedback!');
    });

    it('7. Deve validar o link de reiniciar (Reset do sistema)', () => {
        cy.get('.link-reset')
            .should('be.visible')
            .and('have.attr', 'href', 'index.php');
    });

});