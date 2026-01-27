describe('Auditoria de Atividades NVT - Frontend', () => {

    beforeEach(() => {
        cy.visit('/exercicio18/');
    });

    it('Valida o carregamento da marca e garante a cor correta (sem vermelho)', () => {
        cy.contains('NOVOS TITANS').should('be.visible');
        cy.get('.marca-principal').should('have.css', 'color', 'rgb(25, 43, 85)');

        cy.contains('PESSOA 1 // ALUNO').should('be.visible');
        cy.get('select[name="aluno_nome"]').should('exist');
    });

    it('Simula preenchimento completo e envio do fluxo', () => {
        cy.intercept('POST', '**/processar.php', {
            statusCode: 200,
            body: {
                exclusivos_aluno: [101],
                exclusivos_mentor: [505],
                aluno_nome: 'Julia Anjos',
                mentor_nome: 'Edmar Gomes'
            }
        }).as('ajaxComparar');

        cy.get('select[name="aluno_nome"]').select('Julia Anjos', { force: true });
        cy.get('select[name="mentor_nome"]').select('Edmar Gomes', { force: true });

        cy.get('input[name="nvts_aluno[]"]').first().type('101', { force: true });
        cy.get('input[name="nvts_mentor[]"]').first().type('505', { force: true });

        cy.get('#btn-analisar').click();

        cy.wait('@ajaxComparar');
        cy.get('#painel-resultados').should('be.visible');
        cy.get('#painel-resultados').should('contain', 'Relatório de Sincronia');
    });

    it('Valida as instruções em português e os labels simplificados', () => {
        cy.contains('Digite o número do NVT do card').should('be.visible');

        cy.get('label').contains('NVT').should('be.visible');
    });

    it('Garante que as cores complementares (Azul e Laranja) estão nos cartões', () => {
        cy.get('.borda-superior-azul').should('have.css', 'border-top-color', 'rgb(37, 99, 235)');
        cy.get('.borda-superior-laranja').should('have.css', 'border-top-color', 'rgb(234, 88, 12)');
    });

    it('Verifica as listas de nomes (8 alunos + 1 placeholder)', () => {
        cy.get('select[name="aluno_nome"] option').should('have.length', 9);
        cy.get('select[name="mentor_nome"] option').should('have.length', 4);
    });

});