describe('Auditoria de Atividades NVT - Frontend', () => {

    beforeEach(() => {
        cy.visit('/exercicio18/');
    });

    it('1. Valida o carregamento da marca e garante a cor correta (sem vermelho)', () => {
        cy.contains('NOVOS TITANS').should('be.visible');
        cy.get('.marca-principal').should('have.css', 'color', 'rgb(25, 43, 85)');

        cy.contains('PESSOA 1 // ALUNO').should('be.visible');
        cy.get('select[name="aluno_id"]').should('exist');
    });

    it('2. Simula preenchimento e envio com retorno de sucesso via AJAX', () => {
        cy.intercept('POST', '**/process.php', {
            statusCode: 200,
            body: {
                sucesso: true,
                nvts_bloqueados: [44],
                nvts_sucesso: [98, 100],
                tabela_atualizada: '<tr><td>20/01</td><td>Teste</td><td>Pendente</td><td>...</td></tr>',
                dados_grafico: { pendentes: 1, corrigidos: 0 }
            }
        }).as('ajaxEntrega');

        cy.get('select#aluno_id').select('Jean Prado', { force: true });
        cy.get('select#mentor_id').select('Edmar Gomes', { force: true });

        cy.get('input[name="nvts_aluno[]"]').first().type('44', { force: true });
        cy.get('input[name="nvts_aluno[]"]').eq(1).type('98', { force: true });
        cy.get('input[name="nvts_mentor[]"]').first().type('44', { force: true });

        cy.get('#btn-analisar').click();

        cy.wait('@ajaxEntrega');

        cy.get('#painel-resultados').should('be.visible');
        cy.get('#painel-resultados').should('contain', 'BLOQUEIO');
        cy.get('#painel-resultados').should('contain', 'SUCESSO');
    });

    it('3. Valida a trava de segurança (Safety Lock)', () => {
        cy.intercept('POST', '**/process.php', {
            statusCode: 200,
            body: {
                status_bloqueio: true,
                mensagem: 'BLOQUEIO DE FLUXO: Existem pendências.'
            }
        }).as('ajaxBloqueio');

        cy.get('select#aluno_id').select('Davi Leandro', { force: true });
        cy.get('select#mentor_id').select('Edmar Gomes', { force: true });

        cy.get('#btn-analisar').click();

        cy.wait('@ajaxBloqueio');

        cy.get('.card-panel.amber').should('be.visible')
            .and('contain', 'BLOQUEIO DE FLUXO');
    });

    it('4. Testa o carregamento do Dashboard', () => {
        cy.intercept('POST', '**/process.php', {
            statusCode: 200,
            body: {
                tabela_html: '<tr><td>Historico Simulado</td></tr>',
                dados_grafico: { pendentes: 2, corrigidos: 3 }
            }
        }).as('ajaxConsultar');

        cy.get('select#aluno_id').select('Letícia Helena', { force: true });
        cy.get('#btn-consultar').click();

        cy.wait('@ajaxConsultar');

        cy.get('#painel-dashboard').should('be.visible');
        cy.get('#graficoProdutividade').should('exist');
    });

    it('5. Garante as cores do layout (Azul e Laranja)', () => {
        cy.get('.borda-superior-azul').should('have.css', 'border-top-color', 'rgb(37, 99, 235)');
        cy.get('.borda-superior-laranja').should('have.css', 'border-top-color', 'rgb(234, 88, 12)');
    });
});