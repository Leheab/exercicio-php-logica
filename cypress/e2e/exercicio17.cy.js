describe('Controle de Temperaturas - Teste de Interface e Lógica', () => {

    beforeEach(() => {
        cy.visit('/exercicio17/');
    });

    it('1. Deve validar a Identidade Visual (Logo e Header)', () => {
        cy.get('.cabecalho-principal').should('be.visible');
        cy.get('.identidade-visual').should('contain', 'SISTEMA');
        cy.get('.identidade-visual small').should('contain', 'TEMPERATURA');
        cy.get('.identidade-visual i').should('have.text', 'ac_unit');
    });

    it('2. Deve validar a presença dos 20 campos de entrada', () => {
        cy.get('input.input-temperatura').should('have.length', 20).each(($el) => {
            cy.wrap($el).should('have.attr', 'name', 'temperaturas[]');
            cy.wrap($el).should('have.attr', 'type', 'number');
        });
    });

    it('3. Deve preencher o formulário e processar os dados via AJAX', () => {
        cy.intercept('POST', '**/processar.php').as('ajaxProcessar');

        const temps = [25, 32, 28, 35, 20, 22, 31, 29, 30, 33, 24, 26, 30, 31, 27, 28, 29, 30, 34, 32];

        cy.get('input.input-temperatura').each(($el, index) => {
            cy.wrap($el).type(temps[index], { force: true });
        });

        cy.get('#btn-processar').click();

        cy.wait('@ajaxProcessar').its('response.statusCode').should('eq', 200);

        cy.get('#painel-resultados').should('be.visible');

        cy.get('#corpo-tabela-resultado').within(() => {
            cy.get('td').should('contain', '35.0°C');
            cy.get('td').should('contain', '20.0°C');
        });
    });

    it('4. Segurança: Deve validar que os campos são numéricos', () => {
        cy.get('#dia_1').type('ABC', { force: true });
        cy.get('#dia_1').should('have.value', '');
    });

    it('5. Acessibilidade: Labels devem estar corretamente associadas', () => {
        for (let i = 1; i <= 20; i++) {
            cy.get(`label[for="dia_${i}"]`).should('be.visible');
        }
    });

    it('6. Deve resetar a visualização ao clicar em Limpar Dados', () => {
        cy.get('input.input-temperatura').each(($el) => {
            cy.wrap($el).type('25', { force: true });
        });

        cy.get('#btn-processar').click();

        cy.get('#painel-resultados').should('be.visible');

        cy.contains('button', 'Limpar Dados').click();

        cy.get('#painel-resultados').should('not.be.visible');
    });

});