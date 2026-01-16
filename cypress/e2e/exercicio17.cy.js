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

    it('2. Deve carregar o Painel de Cadastro com as instruções', () => {
        cy.get('.card-formulario').should('be.visible');
        cy.get('.cor-primaria-texto').should('contain', 'Cadastro de Dados Mensais');
        cy.get('.instrucao').should('contain', 'Informe a temperatura máxima');
    });

    it('3. Deve validar a presença dos 20 campos de entrada', () => {
        cy.get('input.input-temperatura').should('have.length', 20);
    });

    it('4. Segurança: Deve garantir proteção básica contra XSS no formulário', () => {
        const xssAttack = '<img src=x onerror=alert(1)>';

        cy.get('#dia_1')
            .invoke('attr', 'type', 'text')
            .type(xssAttack, { force: true });

        cy.get('#btn-processar').click();

        cy.get('body').should('not.contain', xssAttack);
    });

    it('5. Acessibilidade: Inputs devem possuir labels associados', () => {
        for (let i = 1; i <= 20; i++) {
            cy.get(`label[for="dia_${i}"]`).should('be.visible');
        }
    });

});