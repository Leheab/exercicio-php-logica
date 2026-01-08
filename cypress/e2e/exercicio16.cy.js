describe('Titans Artesanais - Sistema de Avaliação de Produtos', () => {
    beforeEach(() => {
        cy.visit('/exercicio16/');
    });

    it('1. Deve validar a Identidade Visual (Logo Branca no Canto Direito)', () => {
        cy.get('.topo-pagina').should('be.visible');
        cy.get('.bloco-logotipo').should('have.css', 'justify-content', 'flex-end');
        cy.get('.texto-logo').should('contain', 'TITANS');
        cy.get('.sub-logo').should('contain', 'artesanais');
        cy.get('.texto-logo').should('have.css', 'color', 'rgb(255, 255, 255)');
    });

    it('2. Deve carregar o Painel de Entrada com o contador inicial', () => {
        cy.get('.painel-entrada').should('be.visible');
        cy.get('#contador-label').should('contain', 'Avaliação 1 de 15');
        cy.get('#titulo-pergunta').should('contain', 'Facilidade de realizar a compra');
    });

    it('3. Deve validar o input de nota e o ícone', () => {
        cy.get('#campo-nota').should('be.visible').and('have.attr', 'type', 'number');
        cy.get('.campo-custom i.material-icons').should('have.text', 'auto_awesome');
    });

    it('4. Deve registrar uma nota via AJAX e validar o status "Satisfatória"', () => {
        cy.get('#campo-nota').type('8.5');
        cy.get('#btn-registrar').click();

        cy.get('#painel-resultados').should('be.visible');
        cy.get('#tabela-corpo tr').first().within(() => {
            cy.get('.nota-valor').should('contain', '8.5');
            cy.get('.status-texto').should('contain', 'Ok');
            cy.get('.cor-verde').should('exist');
        });

        cy.get('#contador-label').should('contain', 'Pergunta 2 de 15');
    });

    it('5. Deve registrar uma nota "Ruim" (menor que 6)', () => {
        cy.get('#campo-nota').type('4.0');
        cy.get('#btn-registrar').click();

        cy.get('#tabela-corpo tr').first().within(() => {
            cy.get('.nota-valor').should('contain', '4.0');
            cy.get('.status-texto').should('contain', 'Ruim');
            cy.get('.cor-vermelha').should('exist');
        });
    });

    it('6. Deve validar o design moderno (Bordas Arredondadas e Efeito Vidro)', () => {
        cy.get('.painel-entrada').should('have.css', 'border-radius', '20px');

        cy.get('.painel-entrada').should('have.css', 'background-color', 'rgba(194, 164, 164, 0.9)');
    });

    it('7. Deve validar o botão de estilo artesanal (Terroso)', () => {
        cy.get('#btn-registrar')
            .should('have.css', 'background-color', 'rgb(45, 27, 20)')
            .and('contain', 'Registrar Nota');
    });

    it('8. Deve validar o link de reiniciar no rodapé', () => {
        cy.get('.link-reset')
            .should('be.visible')
            .contains('Limpar lote e reiniciar')
            .and('have.attr', 'href', 'index.html');
    });

});