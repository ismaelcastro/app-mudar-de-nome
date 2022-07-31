<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/comands/image', function() {
    Artisan::call('storage:link');   
});

Route::get('/comands/migrate', function() {
    Artisan::call('migrate');   
});

Route::name('admin.')->namespace('Admin')->prefix('manager-setup')->middleware('auth')->group(function () {
    Route::get('search_json','DashboardController@search_json')->name('dashboard.search_json');
    Route::any('/', 'DashboardController@call')->name('dashboard.index');
    Route::any('/dashboard/call', 'DashboardController@call')->name('dashboard.call');
    Route::any('/dashboard/processual', 'DashboardController@processual')->name('dashboard.processual');
    Route::any('/dashboard/triagem', 'DashboardController@triagem')->name('dashboard.triagem');

    Route::post('access/{call}/{client}/store', 'AccessController@store')->name('access.store'); 
    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::post('/settings', 'SettingController@store')->name('settings.store');

    Route::get('clients/box', 'ClientsController@box')->name('clients.box');
    Route::get('clients/sinc_mautic', 'ClientsController@sinc_mautic')->name('clients.sinc_mautic');
    Route::any('clients/search', 'ClientsController@search')->name('clients.search');
    Route::resource('clients', 'ClientsController');    
    Route::post('clients/{client}/remove_picture', 'ClientsController@remove_picture')->name('clients.remove.picture'); 
    Route::any('clients/{client}/update_image', 'ClientsController@update_image')->name('clients.update_image'); 
    
    Route::any('historics', 'HistoricController@index')->name('historics.search');

    Route::resource('changetypes', 'ChangetypeController');
    Route::resource('goals', 'GoalController');
    Route::resource('reasons', 'ReasonsController');
    Route::resource('document_categories', 'DocumentCategoryController');
    Route::resource('documents', 'DocumentController');
    Route::resource('top_questions', 'TopQuestionController');
    Route::resource('top_questions_categories', 'TopQuestionCategoryController');
    Route::resource('process_category', 'ProcessCategoryController');
    Route::resource('process_type', 'ProcessTypeController');
    Route::resource('guide_categories', 'GuideCategoryController');
    Route::resource('guides', 'GuideController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('task_lists', 'TaskListController');
    Route::resource('help', 'HelpController');    
    Route::resource('faq_categories', 'FaqCategoryController');
    Route::resource('faqs', 'FaqController');
    Route::resource('news_categories', 'NewsCategoryController');
    Route::resource('news', 'NewsController');
    Route::resource('case_pages', 'CasePageController');
    Route::resource('tasks', 'TaskController');
    Route::post('task_register/{task}/store', 'TaskRegisterController@store')->name('task_register.store');
    Route::post('events', 'EventController@store')->name('events.store');

    Route::post('help/update/order', 'HelpController@update_order')->name('help.update_order');
});

Route::name('client.')->namespace('Client')->group(function () {
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login.show');
    Route::post('panel/login', 'Auth\LoginController@login')->name('login.store');
    Route::post('panel/logout', 'Auth\LoginController@logout')->name('login.logout');

    Route::get('/access/{code}', 'Auth\LoginController@login_access')->name('login.access');
});

Route::name('client.')->namespace('Client')->prefix('panel')->middleware('auth:client')->group(function () {

    Route::post('client/change_mail', 'ClientsController@change_mail')->name('client.change_mail');
    Route::post('client/change_stagecall', 'ClientsController@change_stagecall')->name('client.change_stagecall');
    Route::get('client/perfil', 'ClientsController@profile')->name('perfil');

    // Orders //
    Route::get("client/pedido/detalhes", "PedidoController@detalhes")->name("pedido.detalhes");

    Route::any('webhook/d4sign/call_id/{call}', 'ContratacaoController@webhook_d4sign')->name('contratacao.webhook.d4sign');
    Route::get('template/gerencianet', 'ContratacaoController@tempate_gerencianet')->name('contratacao.tempate_gerencianet');
    Route::get('template/avista', 'ContratacaoController@tempate_avista')->name('contratacao.tempate_avista');
    Route::get('template/exito', 'ContratacaoController@tempate_exito')->name('contratacao.tempate_exito');
    Route::get('template/divorcio-consensual-avista', 'ContratacaoController@tempate_divorcio_consensual_avista')->name('contratacao.tempate_divorcio_consensual_avista');

    Route::get('contratacao/dados', 'ContratacaoController@dados_contratante')->name('contratacao.dados')->middleware(['check.stage.call']);
    Route::get('contratacao/forma', 'ContratacaoController@forma_contratacao')->name('contratacao.forma')->middleware(['check.stage.call']);
    Route::get('contratacao/contrato', 'ContratacaoController@contrato')->name('contratacao.contrato')->middleware(['check.stage.call']);
    Route::get('contratacao/contrato-aviso', 'ContratacaoController@contrato_aviso')->name('contratacao.contrato_aviso')->middleware(['check.stage.call']);
    Route::put('contratacao/dados/{client}', 'ContratacaoController@dados_contratante_store')->name('contratacao.dados.store');    
    Route::post('contratacao/forma', 'ContratacaoController@forma_contratacao_store')->name('contratacao.forma.store');    
    Route::post('contratacao/contrato', 'ContratacaoController@contrato_store')->name('contratacao.contrato.store');

    Route::get('informacoes-iniciais/affiliation/{affiliation}/edit', 'IniciaisController@affiliation')->name('affiliation.edit');
    Route::get('informacoes-iniciais/claimant/{claimant}/edit', 'IniciaisController@claimant')->name('claimant.edit');

    Route::get('informacoes-iniciais/primeiro-acesso', 'IniciaisController@primeiro_acesso')->name('iniciais.primeiro.acesso')->middleware(['check.stage.call']);
    Route::get('informacoes-iniciais/start', 'IniciaisController@start')->name('iniciais.start')->middleware(['check.stage.call']);
    Route::get('informacoes-iniciais/requerente-outros', 'IniciaisController@outros')->name('iniciais.requerente.outros')->middleware(['check.stage.call']);
    Route::get('informacoes-iniciais/requerente-dados', 'IniciaisController@requerente')->name('iniciais.requerente.dados');
    Route::post('informacoes-iniciais/requerente-dados', 'IniciaisController@requerente_store')->name('iniciais.requerente.dados.store');
    Route::put('informacoes-iniciais/{client}/requerente-update', 'IniciaisController@requerente_update')->name('iniciais.requerente.dados.update');
    

    Route::get('informacoes-iniciais/conjuge-dados', 'IniciaisController@conjuge')->name('iniciais.conjuge.dados');
    Route::post('informacoes-iniciais/conjuge-dados', 'IniciaisController@conjuge_store')->name('iniciais.conjuge.dados.store');
    Route::put('informacoes-iniciais/{client}/conjuge-update', 'IniciaisController@conjuge_update')->name('iniciais.conjuge.dados.update');
    Route::get('informacoes-iniciais/descendente-dados', 'IniciaisController@descendente')->name('iniciais.descendente.dados');
    Route::post('informacoes-iniciais/descendente-dados', 'IniciaisController@descendente_store')->name('iniciais.descendente.dados.store');
    Route::put('informacoes-iniciais/{client}/descendente-update', 'IniciaisController@descendente_update')->name('iniciais.descendente.dados.update');
    Route::get('informacoes-iniciais/breve-relato/motivos', 'IniciaisController@breve_relato')->name('iniciais.breve.relato');
    Route::get('informacoes-iniciais/breve-relato/retificacoes', 'IniciaisController@retificacoes')->name('iniciais.retificacoes')->middleware(['check.stage.call']);
    Route::get('informacoes-iniciais/endereco-contratante', 'IniciaisController@contractor_address_json')->name('iniciais.contractor_address_json');

    Route::put('informacoes-iniciais/breve-relato', 'IniciaisController@breve_relato_store')->name('iniciais.breve.relato.store');
    Route::put('informacoes-iniciais/requerente-outros', 'IniciaisController@outros_store')->name('iniciais.requerente.outros.store');
    Route::post('informacoes-iniciais/retificacoes', 'IniciaisController@retificacoes_store')->name('iniciais.retificacoes.store');

    Route::get('informacoes-iniciais/select-outros', 'IniciaisController@select_outros')->name('iniciais.select.outros');

    Route::post('documentos/re-send', 'DocumentosController@resend_doc_d4sign')->name('documentos.resend_doc_d4sign');
    Route::post('documentos/change_analise', 'DocumentosController@change_analise')->name('documentos.change_analise');
    Route::get('documentos/{document}/generatedocument', 'DocumentosController@generatedocument')->name('documentos.generatedocument');
    Route::post('documentos/document_add', 'DocumentosController@storedocument')->name('documentos.storedocument');
    Route::delete('documentos/document_remove/{call_document}', 'DocumentosController@document_remove')->name('documentos.document_remove');
    Route::post('documentos/document_anexo/{call_document}', 'DocumentosController@document_anexo')->name('documentos.cases.document_anexo');    
    Route::get('documentos/documentacao', 'DocumentosController@documentacao')->name('documentos.documentacao')->middleware(['check.stage.call']);
    Route::post('documentos/contratar-emissao', 'DocumentosController@contratarEmissao')->name('documentos.contratar.emissao');
    Route::post('documentos/contratar-declaracao', 'DocumentosController@contratarDeclaracao')->name('documentos.contratar.declaracao');

    Route::get('documentos/{document_category}/documentos', 'DocumentosController@documentos')->name('documentos.documentos');
    Route::get('documentos/{document_category}/por_nome_documentos', 'DocumentosController@documentos_por_nome')->name('documentos.documentos_por_nome');
    Route::post('documentos/{document_category}/change_dispatcher', 'DocumentosController@change_dispatcher')->name('documentos.change_dispatcher');
    Route::post('documentos/{document_category}/upload_receipt', 'DocumentosController@upload_receipt')->name('documentos.upload_receipt');

    Route::get('documentos/{document_category}/documentos_group', 'DocumentosController@documentos_group')->name('documentos.documentos_group');
    /* Route::get('documentos/procuracao', 'DocumentosController@procuracao')->name('documentos.procuracao'); */
    /* Route::get('documentos/documentos-pessoais', 'DocumentosController@documentos')->name('documentos.documentos'); */
    Route::get('documentos/envio-documentos', 'DocumentosController@enviodocs')->name('documentos.enviodocs');
    Route::get('documentos/provas', 'DocumentosController@provas')->name('documentos.provas');
    Route::get('documentos/certidoes-negativas', 'DocumentosController@certidoesnegs')->name('documentos.certidoes.negativas');
    Route::get('documentos/envio-certidao', 'DocumentosController@enviocertidao')->name('documentos.enviocertidao');

    Route::get('custas-processuais', 'CustasProcessuaisController@index')->name('custas.processuais.index')->middleware(['check.stage.call']);
    Route::post('custas-processuais/guide_anexo/{call_guide}', 'CustasProcessuaisController@guide_anexo')->name('guide.cases.guide_anexo');
    Route::delete('custas-processuais/guide_remove/{call_guide}', 'CustasProcessuaisController@guide_remove')->name('guides.guide_remove');
    Route::post('custas-processuais/change_analise', 'CustasProcessuaisController@change_analise')->name('guides.change_analise');

    Route::get('elaboracao-protocolado', 'ProtocoladoController@start')->name('elaboracao.protocolado.start');
    Route::get('elaboracao-protocolado/andamento', 'ProtocoladoController@andamento')->name('elaboracao.protocolado.andamento');

    Route::get('financeiro/carne', 'FinanceiroController@carne')->name('financeiro.carne');
    Route::get('financeiro/transferencia', 'FinanceiroController@transferencia')->name('financeiro.transferencia');
    Route::get('financeiro/adexitum', 'FinanceiroController@adexitum')->name('financeiro.adexitum');
    Route::post('financeiro/{call}/anexa_comprovante', 'FinanceiroController@comprovante_anexo')->name('financeiro.anexa_comprovante');

    Route::get('processo/acompanhamento-processual', 'ProcessoController@acompanhamento')->name('processo.acompanhamento');
    Route::get('processo/documentacao-extras', 'ProcessoController@docsextra')->name('processo.docsextra');
    Route::get('processo/documentos-extras', 'ProcessoController@documentacaoExtra')->name('processo.documentacao.extra');
    Route::get('processo/documentos-extras/{document_category}/documentos', 'ProcessoController@documentacaoExtra')->name('processo.documentacao.documento.extra');
    Route::get('processo/documentos-extras/{document_category}/por_nome_documentos', 'ProcessoController@documentosExtrasPorNome')->name('processo.documentacao.documento.extra.documentos_por_nome');
    Route::post('processo/documentos-extras/{call}/', 'ProcessoController@client_document_extras')->name('processo.send.document_extras');
});

Route::name('admin.')->namespace('Admin')->prefix('manager-setup')->group(function () {
    Route::post('cases/change_start', 'CaseController@change_start')->name('cases.change_start');
});

Route::name('admin.')->namespace('Admin')->prefix('manager-setup')->middleware('auth')->group(function () {

    // Agenda //
    Route::get('agenda', 'AgendaController@index')->name('agenda.index');

    Route::post('call/{call}/change_stage_case', 'CallController@change_stage_case')->name('change.stage.case');
    Route::post('call/{call}/change_stage_call', 'CallController@change_stage_call')->name('change.stage.call');

    Route::any('cases', 'CaseController@index')->name('cases.index');    
    Route::get('cases/{call}', 'CaseController@show')->name('cases.show');
    Route::post('cases/storedocument/{call}', 'CaseController@storedocument')->name('cases.storedocument');
    Route::post('cases/storeprocess/{call}', 'CaseController@storeprocess')->name('cases.storeprocess');
    Route::put('cases/updateprocess/{call}', 'CaseController@updateprocess')->name('cases.updateprocess');
    Route::post('cases/document_approve/{call_document}', 'CaseController@document_approve')->name('cases.document_approve');
    Route::post('cases/document_pending/{call_document}', 'CaseController@document_pending')->name('cases.document_pending');
    Route::post('cases/rectification/{rectification}', 'CaseController@rectification')->name('cases.rectification');

    Route::post('cases/dispatcher_approve/{dispatcher}', 'CaseController@dispatcher_approve')->name('cases.dispatcher_approve');
    Route::post('cases/dispatcher_reprove/{dispatcher}', 'CaseController@dispatcher_reprove')->name('cases.dispatcher_reprove');

    Route::post('cases/document_reprove/{call_document}', 'CaseController@document_reprove')->name('cases.document_reprove');
    Route::delete('cases/document_destroy/{call_document}', 'CaseController@document_destroy')->name('cases.document_destroy');
    Route::post('cases/document_anexo/{call_document}', 'CaseController@document_anexo')->name('cases.document_anexo');
    Route::post('cases/storeguide/{call}', 'CaseController@storeguide')->name('cases.storeguide');
    Route::post('cases/guide_approve/{call_guide}', 'CaseController@guide_approve')->name('cases.guide_approve');
    Route::post('cases/guide_reprove/{call_guide}', 'CaseController@guide_reprove')->name('cases.guide_reprove');
    Route::delete('cases/guide_destroy/{call_guide}', 'CaseController@guide_destroy')->name('cases.guide_destroy');
    Route::post('cases/guide_anexo/{call_guide}', 'CaseController@guide_anexo')->name('cases.guide_anexo');
    Route::post('cases/guide_download_anexo/{call_guide}', 'CaseController@guide_download_anexo')->name('cases.guide_download_anexo');
    Route::post('cases/breve_relato_approve/{call}', 'CaseController@breve_relato_approve')->name('cases.breve_relato_approve');
    Route::post('cases/breve_relato_reprove/{call}', 'CaseController@breve_relato_reprove')->name('cases.breve_relato_reprove');
    
    Route::get('cases/{call}/download_folder', 'CaseController@download_folder')->name('cases.download_folder');
    Route::get('cases/{call}/download_folder_pdf', 'CaseController@download_folder_pdf')->name('cases.download_folder_pdf');
    Route::get('cases/{call}/update_stage_case', 'CaseController@update_stage_case')->name('cases.update_stage_case');


    Route::post('cases/aprove_all_checked/{call}', 'CaseController@aprove_all_checked')->name('cases.aprove_all_checked');
    Route::post('cases/reprove_all_checked/{call}', 'CaseController@reprove_all_checked')->name('cases.reprove_all_checked');
    Route::post('cases/delete_all_checked/{call}', 'CaseController@delete_all_checked')->name('cases.delete_all_checked');

    Route::post('cases/send_disapproved/{call}', 'CaseController@send_disapproved')->name('cases.send_disapproved');

    Route::post('cases/wait_for_document/{call}', 'CaseController@wait_for_document')->name('cases.wait_for_document');
    Route::post('cases/wait_for_payment_guide/{call}', 'CaseController@wait_for_payment_guide')->name('cases.wait_for_payment_guide');

    Route::post('calls/{call}/generate_doc_breve_relato', 'CallController@generate_breve_relato')->name('calls.generate_breve_relato');
    Route::any('calls', 'CallController@index')->name('calls.index');
    Route::get('calls/create', 'CallController@create')->name('calls.create');
    Route::get('calls/{call}', 'CallController@show')->name('calls.show');
    Route::post('calls/store', 'CallController@store')->name('calls.store');
    Route::get('calls/{call}/edit', 'CallController@edit')->name('calls.edit');
    Route::put('calls/{call}', 'CallController@update')->name('calls.update');
    Route::put('calls/{call}/payment', 'CallController@updatePayment')->name('calls.update.payment');
    Route::post('calls/{call}/change_status', 'CallController@change_status')->name('calls.change_status');
    Route::delete('calls/{call}', 'CallController@destroy')->name('calls.destroy');
    Route::delete('call_register/{call_register}/delete', 'CallController@deleteRegister')->name('call_register.destroy');
    Route::post('call_register/{call_register}/update', 'CallController@updateRegister')->name('call_register.update');
    Route::post('call_register/{call}/store', 'CallController@storeRegister')->name('call_register.store');
    Route::post('call_register/{call_register}/type', 'CallController@type')->name('call_register.type');
    Route::post('calls/{call}/edit-changeaction', 'CallController@changeaction')->name('calls.edit_Changaction');
    Route::post('calls/{call}/edit-changetype', 'CallController@changetype')->name('calls.edit_Changetype');
    Route::post('calls/{call}/edit-changeReason', 'CallController@changeReason')->name('calls.edit_ChangeReason');
    Route::post('calls/{call}/edit-changeStar', 'CallController@changeStar')->name('calls.edit_ChangeStar');
    Route::post('calls/{call}/proposal', 'CallController@proposalStore')->name('calls.proposal_store');
    Route::delete('calls/{honrary}/honrary', 'CallController@honraryDestroy')->name('honrary.destroy');
    Route::delete('calls/{expense}/expense', 'CallController@expenseDestroy')->name('expense.destroy');
    Route::get('calls/{call}/change-case', 'CallController@changeCase')->name('calls.change_case');
    Route::get('calls/{call}/finish-call', 'CallController@finishCall')->name('calls.finish_call');

    Route::any('process', 'ProcessController@index')->name('process.index');
    Route::get('process/{call}', 'ProcessController@show')->name('process.show');
    Route::post('process/storedocument/{call}', 'ProcessController@storedocument')->name('process.storedocument');
    Route::post('process/document_approve/{callExtra}', 'ProcessController@document_approve')->name('process.document_approve');
    Route::post('process/document_reprove/{callExtra}', 'ProcessController@document_reprove')->name('process.document_reprove');
    Route::delete('process/document_destroy/{callExtra}', 'ProcessController@document_destroy')->name('process.document_destroy');
    Route::post('process/request_extra_documents/{call}', 'ProcessController@request_extra_documents')->name('process.request_extra_documents');
    Route::post('process/document_anexo/{callExtra}', 'ProcessController@document_anexo')->name('process.document_anexo');
    Route::post('process/send_document_extras/{call}', 'ProcessController@send_document_extras')->name('process.send_document_extras');
    Route::get('process/{call}/change_procedural_step/{step}', 'ProcessController@change_procedural_step')->name('process.change_procedural_step');

});

Route::namespace('Sistema')->middleware('auth:client')->group(function () {
    Route::get('download/document_client/client/{call_document}', 'DownloadController@document_client')->name('client.document_client');
    Route::get('download/guide_file_client/{call_guide}', 'DownloadController@guide_file_client')->name('guide_file_client');
});

Route::middleware('auth')->namespace('Sistema')->group(function () {
    Route::post('upload/image', 'UploadController@imagePublic')->name('upload-image');
    Route::post('upload/file', 'UploadController@filePublic')->name('upload-file');
    Route::post('upload/{call}/file_private', 'UploadController@filePrivate')->name('upload-file-private');
    Route::get('download/document_client/{call_document}', 'DownloadController@document_client')->name('document_client');
    Route::get('download/document_dispatche/{dispatche}', 'DownloadController@document_dispatche')->name('document_dispatche');

    Route::get('download/extra_client/{call_extra}', 'DownloadController@extra_client')->name('extra_client');
    Route::get('download/guide_client/{call_guide}', 'DownloadController@guide_client')->name('guide_client'); 
    Route::get('download/guide_download/{call_guide}', 'DownloadController@guide_download')->name('guide_download');    
    Route::get('download/recibo_protocol/{call}', 'DownloadController@recibo_protocol')->name('recibo_protocol');
});

Route::get('/home', 'HomeController@index')->name('home');
