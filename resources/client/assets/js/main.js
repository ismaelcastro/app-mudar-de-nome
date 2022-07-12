

(function($) {
    
	var	$window = $(window),
		$body = $('body'),
        $main = $('#main');
        
    $('.js-show-sidebar').on('click',function(){
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click',function(){
        $('.js-sidebar').removeClass('show-sidebar');
    });

    $('.chartpie').easyPieChart({
        easing: 'easeOutBounce',
        size: '50',
        barColor: '#2EA661',
        scaleColor: false,
        onStep: function(from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
        }
    });

	// Breakpoints.
		breakpoints({
			xlarge:   [ '1281px',  '1680px' ],
			large:    [ '981px',   '1280px' ],
			medium:   [ '737px',   '980px'  ],
			small:    [ '481px',   '736px'  ],
			xsmall:   [ '361px',   '480px'  ],
			xxsmall:  [ null,      '360px'  ]
		});

	// Play initial animations on page load.
		$window.on('load', function() {
			window.setTimeout(function() {
				$body.removeClass('is-preload');
			}, 100);
		});		

	// Nav.
		var $nav = $('#nav');

		if ($nav.length > 0) {

			// Shrink effect.
				$main
					.scrollex({
						mode: 'top',
						enter: function() {
							$nav.addClass('alt');
						},
						leave: function() {
							$nav.removeClass('alt');
						},
					});

			// Links.
				var $nav_a = $nav.find('a');

				$nav_a
					.scrolly({
						speed: 1000,
						offset: function() { return $nav.height(); }
					})
					.on('click', function() {

						var $this = $(this);

						// External link? Bail.
							if ($this.attr('href').charAt(0) != '#')
								return;

						// Deactivate all links.
							$nav_a
								.removeClass('active')
								.removeClass('active-locked');

						// Activate link *and* lock it (so Scrollex doesn't try to activate other links as we're scrolling to this one's section).
							$this
								.addClass('active')
								.addClass('active-locked');

					})
					.each(function() {

						var	$this = $(this),
							id = $this.attr('href'),
							$section = $(id);

						// No section for this link? Bail.
							if ($section.length < 1)
								return;

						// Scrollex.
							$section.scrollex({
								mode: 'middle',
								initialize: function() {

									// Deactivate section.
										if (browser.canUse('transition'))
											$section.addClass('inactive');

								},
								enter: function() {

									// Activate section.
										$section.removeClass('inactive');

									// No locked links? Deactivate all links and activate this section's one.
										if ($nav_a.filter('.active-locked').length == 0) {

											$nav_a.removeClass('active');
											$this.addClass('active');

										}

									// Otherwise, if this section's link is the one that's locked, unlock it.
										else if ($this.hasClass('active-locked'))
											$this.removeClass('active-locked');

								}
							});

					});

		}

	// Scrolly.
		$('.scrolly').scrolly({
			speed: 1000
		});

})(jQuery);


function clone_reticacao(qtd_permitida)
{
    var qtd_criadas = $( ".clone-this" ).length;
    var clone =  $( '.form-default' ).find('.clone-this').clone();
    clone.find('input').val('');
    clone.appendTo( '.add-form-default' );

    if( (qtd_criadas+1) >= qtd_permitida ){
        $('#btn-clone-retifica').hide();
    }
}


function atualizacep(cep){
	var s;
	var url;
	cep = cep.replace(/\D/g,"");
	url="https://viacep.com.br/ws/"+cep+"/json/?callback=correiocontrolcep";
	s=document.createElement('script');
	s.setAttribute('charset','utf-8');
	s.src=url;
	document.querySelector('head').appendChild(s);
}

function correiocontrolcep(valor){
    if (valor.erro) {
      alert('Cep não encontrado');
      return;
    };		      
    $('#addressstreet').val(valor.logradouro);
    $('#addressdistrict').val(valor.bairro);
    $('#addresscity').val(valor.localidade);
    $('#addressstate').val(valor.uf);	
}

function submit_form(idd){
    $('#page-preloader').addClass('visible');
    document.getElementById(idd).submit();
}


var substringMatcher = function(strs) {
    return function findMatches(q, cb) {
        var matches, substringRegex;
        // an array that will be populated with substring matches
        matches = [];
        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');
        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function(i, str) {
            if (substrRegex.test(str)) {
                // the typeahead jQuery plugin expects suggestions to a
                // JavaScript object, refer to typeahead docs for more info
                matches.push({ value: str });
            }
        });
        cb(matches);
    };
};

function carrega_endereco_contratante(){
   $.getJSON('/panel/informacoes-iniciais/endereco-contratante', function(data) {
        $.each(data, function (key, item) {
            //console.log(item);
            $('#'+key).val(item);
        });
    });
}

function change_box_data_descendente(){
    if($('#is_adulthood_sim').is(":checked")){
        $('.box_contato_descendente').show();
    }else{
        $('.box_contato_descendente').hide();
    }
}

function reenviar_assinatura(obj,client_id,call_document_id){
    $(obj).html('Enviando...');
    var minha_url = location.href;
    var token = $('meta[name="csrf-token"]').attr('content');


    var formdata = false;
    if (window.FormData) {
        formdata = new FormData();
    }
    if (formdata) {
        formdata.append("_token", token);
        formdata.append("client_id", client_id);
        formdata.append("call_document_id", call_document_id);
    }
    
    $.ajax({
        url: '/panel/documentos/re-send',
        type: "POST",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (str2) {
            location.href = minha_url+'?#d4signDoc'+call_document_id+'Modal';
        }
    });
}


$( document ).ready(function() {

    $('input[name="is_adulthood"]').change(function(){
        change_box_data_descendente();
    });
    
    $('#page-preloader').removeClass('visible');  

    $('form').on("submit", function(e) {
        $('#page-preloader').addClass('visible');
    });

    $('#agree').click(function(){
        if($(this).is(':checked')){
            $('#emitir-contrato').removeClass('disabled');
            $('.tooltip').find('span').remove();
        }else{
            $('#emitir-contrato').addClass('disabled');
        }
    });

    $('a[data-toggle=tab]').click(function(){
        var obj = $(this);
        obj.closest( ".nav" ).find('li').removeClass('active');
        obj.parent().addClass('active');
    });

	$('#addresscep').focusout(function() {
		$qtd = $(this).val();
		$qtd = $qtd.replace('-','');
		if($qtd.length==8){
			atualizacep($qtd);
		}
    });

    $('input[name="is_requerente"]').click(function(){
        var value = $(this).val();
        if(value=='1'){
            $('.relationship_claimant').hide();
            $('#show_has_descendente').html('Você possui Descendentes?');
        }else{
            $('.relationship_claimant').show();
            $('#show_has_descendente').html('O Requerente possui Descendentes?');
        }
    });

    $('input[name="has_descendente"]').click(function(){
        var value = $(this).val();
        if(value=='1'){
            $('.descendants_quantity').show();
        }else{
            $('.descendants_quantity').hide();
        }
    });
    


    
    
    var fixmeTop = $('#header').offset().top;       // get initial position of the element
    var altura = '';
    $(window).scroll(function() {                  // assign scroll event listener
        var currentScroll = $(window).scrollTop(); // get current position
        
        if (currentScroll > fixmeTop) {           // apply position: fixed if you
            altura = altura=='' ? $('#header').css('height') : altura;
            $('#header').addClass('header-fixed');
            $('#header').parent().css({'padding-top':altura});
        } else {                                   // apply position: static
            $('#header').removeClass('header-fixed');
            $('#header').parent().css({'padding-top':'0px'});
        }

    });

	var job = [
        'Acabador de Mármore e Granito', 'Acondicionador', 'Açougueiro', 'Acupunturista', 'Adestrador de Animais', 'Administrador', 
        'Administrador de Empresas', 'Administrador de Fazenda', 'Administrador Rural', 'Administrador Financeiro', 'Administrador Rural', 
        'Advogado', 'Aeromodelista', 'Aeronauta', 'Aeroviário', 'Agenciador de Propaganda', 'Agente Administrativo', 
        'Agente de Compras e Vendas', 'Agente de Saúde', 'Agente de Segurança', 'Agente de Seguros', 'Agente de Serviços Gerais', 
        'Agente de Turismo', 'Agente de Viagem', 'Agente Funerário', 'Agente Operacional', 'Agente Penitenciário', 'Agente Publicitário', 
        'Agente Vistor', 'Agricultor', 'Agrimensor', 'Agrônomo', 'Agropecuarista', 'Ajudante de Cozinha', 'Ajudante de Eletricista', 
        'Ajudante de Motorista', 'Ajudante de Padeiro', 'Ajudante de Pedreiro', 'Ajudante de Pintor', 'Ajudante de Serralheiro', 
        'Ajudante Geral', 'Ajustador Mecânico', 'Alfaiate', 'Almoxarife', 'Ambulante', 'Amolador', 'Analista Contábil', 
        'Analista de Cargos e Salários', 'Analista de Desenvolvimento de Sistemas', 'Analista de Organização e Métodos', 
        'Analista de Recursos Humanos', 'Analista de Suporte', 'Analista de Vendas', 'Analista Financeiro', 'Analista Químico', 
        'Anestesista', 'Antenista', 'Antropólogo', 'Apicultor', 'Apontador', 'Apontador de Mão de Obra', 'Aposentado', 
        'Apresentador de TV', 'Árbitro Desportivo', 'Armador', 'Armeiro', 'Arqueólogo', 'Arquiteto', 'Arquivista de Documentos', 
        'Arrumador', 'Artesão', 'Artífice', 'Artista', 'Artista Plástico', 'Ascensorista', 'Assessor', 'Assessor Legislativo', 
        'Assistente Administrativo', 'Assistente de Filmagem', 'Assistente de Finanças', 'Assistente de Marketing', 'Assistente de vendas', 
        'Assistente Social', 'Assistente Técnico', 'Astrólogo', 'Astrônomo', 'Atendente', 'Atendente de Enfermagem', 'Atendente de Lanchonete', 
        'Atendente de Portaria de Hotel', 'Atleta Amador', 'Atleta Profissional', 'Ator', 'Atuário', 'Auditor', 'Autônomo', 
        'Autor-Roteirista', 'Auxiliar Administrativo', 'Auxiliar de Almoxarifado', 'Auxiliar de Biblioteca', 'Auxiliar de cartório', 
        'Auxiliar de Cobrança', 'Auxiliar de Contabilidade', 'Auxiliar de Cozinha', 'Auxiliar de Dentista', 'Auxiliar de Enfermagem', 
        'Auxiliar de Escritório', 'Auxiliar de Estatística', 'Auxiliar de Estoque', 'Auxiliar de Expedição', 'Auxiliar de Farmácia', 
        'Auxiliar de Garçom', 'Auxiliar de Laboratório', 'Auxiliar de lavanderia', 'Auxiliar de Limpeza', 'Auxiliar de Manutenção', 
        'Auxiliar de maquinista de trem', 'Auxiliar de Marceneiro', 'Auxiliar de Marketing', 'Auxiliar de Mecânico', 'Auxiliar de Montagem', 
        'Auxiliar de pessoal', 'Auxiliar de Produção', 'Auxiliar de Radiologia', 'Auxiliar de Serviço Extrajudicial', 
        'Auxiliar de Serviços Gerais', 'Auxiliar de Vendas', 'Auxiliar de Veterinário', 'Auxiliar Escolar', 'Auxiliar Financeiro', 
        'Auxiliar Operacional', 'Auxiliar Técnico de Informática', 'Auxiliar Técnico de Refrigeração', 'Avaliador', 'Avicultor', 
        'Azulejista', 'Babá', 'Bailarino', 'Balanceador', 'Balanceiro', 'Balconista', 'Bancário', 'Banqueiro', 'Barbeiro', 
        'Barman', 'Bedel', 'Bibliotecário', 'Biólogo', 'Biomédico', 'Bioquímico', 'Bolsista', 'Bombeiro', 'Bordador', 'Borracheiro', 
        'Botânico', 'Botoeiro', 'Cabeleireiro', 'Cabineiro', 'Cabista', 'Caixa', 'Caixeiro Viajante', 'Calceteiro', 'Caldeireiro', 
        'Camareiro', 'Camelô', 'Caminhoneiro', 'Cantor', 'Capataz', 'Capitalista', 'Capitalista de Ativos Financeiros', 'Capitão', 
        'Capoteiro', 'Carcereiro', 'Carpinteiro', 'Carregador Carroceiro', 'Carteiro', 'Cartorário', 'Carvoeiro', 'Caseiro', 'Castrador', 
        'Catador de Material Reciclável','Cavalariço', 'Ceramista', 'Chacreiro', 'Chapa', 'Chapeador', 'Chapeiro', 'Chapista', 'Chaveiro', 
        'Chefe', 'Chefe de Estação', 'Chefe de Seção', 'Chefe de Trem', 'Chefe Intermediário', 'Churrasqueiro', 'Cientista', 
        'Cientista Político', 'Cinegrafista', 'Circuleiro', 'Cirurgião', 'Cirurgião Dentista', 'Cisterneiro', 'Citotécnico', 'Classificador', 
        'Clicheiro', 'Cobrador', 'Cocheiro', 'Colchoeiro', 'Coletor', 'Colocador de Carpetes', 'Colunista Social', 'Comandante', 
        'Comentarista de Rádio e Televisão', 'Comerciante', 'Comerciário', 'Comissário de Polícia', 'Compositor', 'Comprador', 
        'Comunicador Visual', 'Comunicólogo', 'Confeiteiro', 'Conferente', 'Conferente de Carga e Descarga', 'Conselheiro Tutelar', 
        'Construtor', 'Consultor', 'Consultor Administrativo', 'Consultor de Empresas', 'Consultor de Informação', 'Consultor em Remuneração', 
        'Consultor Fiscal', 'Consultor Jurídico', 'Consultor Técnico','Contabilista', 'Contador', 'Contínuo', 'Contra-regra', 
        'Contramestre', 'Controlador de Qualidade', 'Coordenador', 'Coordenador Administrativo', 'Copeiro', 'Cordeiro', 'Coreógrafo', 
        'Coronel Bombeiro Militar', 'Corretor', 'Corretor de Imóveis', 'Corretor de Seguros', 'Corretor de Títulos e Valores', 
        'Cortador', 'Costurador de Lona', 'Costureiro', 'Coveiro', 'Cozinheiro', 'Crediarista', 'Criador', 'Cronoanalista', 
        'Dama de Companhia', 'Dançarino', 'Datilógrafo', 'Datiloscopista', 'Decorador', 'Defensor Público', 'Degustador', 
        'Delegado de Polícia', 'Demonstrador', 'Dentista', 'Deputado Estadual', 'Deputado Federal', 'Desembargador', 
        'Desempregado', 'Desenhista', 'Desenhista Comercial', 'Desenhista Industrial', 'Desenhista Técnico', 'Designer', 
        'Despachante', 'Despachante Policial', 'Desportista Amador', 'Desportista Profissional', 'Detetive', 'Diarista', 
        'Digitador', 'Diplomata', 'Diretor', 'Diretor Administrativo', 'Diretor de Cinema', 'Diretor de Empresas', 
        'Diretor de Escola', 'Diretor de Espetáculos', 'Diretor de Espetáculos Públicos', 'Diretor de Estabelecimento de Ensino', 
        'Diretor de Logística', 'Diretor de Serviços', 'Discotecário', 'Do Comércio', 'Do Lar/Dona de Casa', 'Doceiro', 'Domador', 
        'Economiário', 'Economista', 'Editor', 'Educador', 'Eletricista', 'Eletricista de Automóveis', 'Eletricitário', 
        'Eletrônico de Manutenção', 'Eletrotécnico', 'Embaixador', 'Embalador', 'Embalsamador', 'Empacotador', 'Empregado Doméstico', 
        'Empregado em Transportes e Cargas', 'Empregado Rural', 'Empreiteiro', 'Empresário', 'Empresário Comercial', 'Empresário Industrial', 
        'Encadernador', 'Encanador', 'Encanador de Manutenção', 'Encanador Industrial', 'Encarregado', 'Encarregado Administrativo', 
        'Encarregado de Compras', 'Encarregado de Depósito', 'Encarregado de Laboratório',
        'Encarregado de Manutenção', 'Encarregado de Obras', 'Encarregado de Pintura', 'Encarregado de Produção', 
        'Encarregado de Reflorestamento', 'Encarregado do Setor de Tráfego', 'Enfermeiro', 'Enfestador de Roupas', 'Engenheiro', 
        'Engenheiro Agrônomo', 'Engenheiro Civil', 'Engenheiro de Produção', 'Engenheiro Eletricista', 'Engenheiro Eletrônico', 
        'Engenheiro Florestal', 'Engenheiro Mecânico', 'Engenheiro Metalúrgico', 'Engenheiro Químico', 'Engraxate', 'Enlonador', 
        'Entregador', 'Entregador de Gás', 'Entregador de Jornal', 'Entregador de Pizza', 'Entrevistador', 'Ervateiro', 'Erveiro', 
        'Escrevente', 'Escrevente do Serviço Extrajudicial', 'Escritor', 'Escriturário', 'Escrivão', 'Escrivão de Polícia', 'Escultor', 
        'Espelhador', 'Estagiário', 'Estampador', 'Estatístico', 'Estenógrafo', 'Esteticista', 'Estilista', 'Estivador', 'Estofador', 
        'Estopador', 'Estoquista', 'Estudante', 'Farmacêutico', 'Farmacologista', 'Faturista', 'Faxineiro', 'Fazendeiro', 'Feirante', 
        'Ferramenteiro', 'Ferreiro', 'Ferroviário', 'Fiandeiro', 'Fiel', 'Figurinista', 'Fiscal', 'Fiscal de Transportes Coletivos', 
        'Fiscal Rodoviário', 'Físico', 'Fisioterapeuta', 'Fitotecário (Cultiva Plantas)', 'Fitotecário (Informática)', 'Florista', 'Foguista', 
        'Fonoaudiólogo', 'Forneiro', 'Fotógrafo', 'Frentista', 'Fresador', 'Freteiro', 'Fruticultor', 'Funcionário Público Civil', 
        'Funcionário Público Civil Aposentado', 'Fundidor', 'Funileiro', 'Galvanizador', 'Garagista', 'Garçom', 'Gari', 'Garimpeiro', 
        'Gasista', 'Geofísico', 'Geógrafo', 'Geólogo', 'Gerente', 'Gerente Administrativo', 'Gerente Comercial', 'Gerente de Empresa', 
        'Gerente de Governança', 'Gerente de Logística', 'Gerente de Mercado', 'Gerente de Mercearia', 'Gerente de Negócios', 
        'Gerente de Produção', 'Gerente de Vendas', 'Gerente Financeiro', 'Gesseiro', 'Governador de Estado', 'Governanta', 'Gráfico', 
        'Gravador', 'Guarda Florestal', 'Guarda Municipal', 'Guarda Urbano', 'Guarda Vigilante', 'Guardador de Carros', 'Guia Turístico', 
        'Guincheiro', 'Historiador', 'Hoteleiro', 'Iluminador', 'Impressor', 'Industrial', 'Industriário', 'Inseminador', 'Inspetor', 
        'Inspetor de Qualidade', 'Instalador', 'Instalador de Som', 'Instalador de telefones', 'Instrumentador Cirúrgico', 'Instrumentista', 
        'Instrutor', 'Intérprete', 'Inválido', 'Investigador de Polícia', 'Investigador Particular', 'Jardineiro', 'Joalheiro', 
        'Jogador de Futebol', 'Jóquei', 'Jornaleiro', 'Jornalista', 'Juiz de Direito', 'Jurista', 'Laboratorista', 'Lacrador de Embalagens', 
        'Lactarista', 'Ladrilheiro', 'Laminador', 'Lancheiro', 'Lanterneiro', 'Lapidador', 'Lavadeiro', 'Lavador de Veículos', 'Lavrador', 
        'Leiloeiro', 'Leiteiro', 'Leiturista', 'Lenhador', 'Lenheiro', 'Letrista', 'Limpador de vidros', 'Linotipista', 'Lixador', 'Lixeiro', 
        'Locutor', 'Lustrador', 'Maçariqueiro', 'Madeireiro', 'Magarefe', 'Maître', 'Manequim', 'Manicure', 'Manobrista', 'Maquilador', 
        'Maquinista', 'Marceneiro', 'Marinheiro', 'Marítimo', 'Marmiteiro', 'Marmorista', 'Massagista', 'Masseiro', 'Massoterapeuta', 
        'Matemático', 'Mecânico', 'Mecânico de Automóvel', 'Mecânico de Manutenção', 'Mecânico de Precisão', 'Mecânico de Refrigeração', 
        'Mecânico Eletricista', 'Mecanógrafo', 'Médico', 'Médico Veterinário', 'Meio Oficial', 'Membro de Ordem Religiosa', 'Mensageiro', 
        'Merendeiro', 'Mergulhador', 'Mestre de Obras', 'Mestre em Produção Industrial', 'Metalúrgico', 'Meteorologista', 'Metroviário', 
        'Micro-Empresário', 'Militar', 'Militar Reformado', 'Mineiro', 'Minerador', 'Ministro de Culto Religioso', 'Ministro de Estado', 
        'Ministro de Tribunal Superior', 'Missionário', 'Modelista', 'Modelo artístico', 'Modelo de Modas', 'Modista', 'Moldador', 'Monitor', 
        'Montador', 'Montador de Automóveis', 'Montador de Móveis de Madeira', 'Mordomo', 'Motoboy', 'Motoqueiro', 'Motorista', 
        'Motorista de Ambulância', 'Motorista de Ônibus Urbano', 'Mototaxista', 'Museólogo', 'Músico', 'Navegador', 'Nutricionista', 
        'Ocupante de Cargo Político', 'Office-Boy', 'Oficial das Forças Armadas', 'Oficial de Cartório', 'Oficial de Justiça', 'Oficial Geral', 
        'Oleiro', 'Operador de Acabamento', 'Operador de Áudio de Continuidade (Rádio)', 'Operador de Bombas', 'Operador de Caixa', 
        'Operador de Caldeira', 'Operador de Câmeras de Cinema e TV', 'Operador de ceifadeira', 'Operador de cobrança bancária', 
        'Operador de Computador', 'Operador de Embalagem', 'Operador de Empilhadeira', 'Operador de escavadeira', 'Operador de Máquinas', 
        'Operador de Marketing', 'Operador de Moto Serra', 'Operador de Produção', 'Operador de Silkscreen', 'Operador de Telecomunicações', 
        'Operador de Telemarketing', 'Operador de Torno Automático', 'Operador de Tráfego', 'Operador de Triagem e Transbordo', 'Operário', 
        'Ordenador', 'Ordenhador', 'Orientador Educacional', 'Ourives', 'Ouvidor do meio de comunicação', 'Overloquista', 'Padeiro', 'Padre', 
        'Paisagista', 'Panfleteiro', 'Pantografista', 'Papeleiro', 'Parlamentar', 'Parteiro', 'Passadeira', 'Pasteleiro', 'Pastor', 
        'Peão Boiadeiro', 'Pecuarista', 'Pedagogo', 'Pedicure', 'Pedreiro', 'Peixeiro', 'Peleteiro', 'Pensionista', 'Perfurador de Cartões', 
        'Perito', 'Perueiro', 'Pescador', 'Pesquisador Datiloscópico', 'Piloto', 'Pintor', 'Pintor de Automóveis', 'Pintor de Paredes', 
        'Pipoqueiro', 'Pizzaiolo', 'Plaineiro', 'Plaqueiro', 'Poceiro', 'Podólogo', 'Poeta', 'Policial Civil', 'Policial Federal', 
        'Policial Militar', 'Policial Rodoviário', 'Policial rodoviário Federal', 'Polidor de Metais', 'Polidor de Pedras', 
        'Polidor de Veículos', 'Porteiro', 'Praça da aeronáutica', 'Prático de Farmácia', 'Prefeito Municipal', 'Prendas do Lar', 
        'Prensista', 'Preparador de Máquinas', 'Preparador do Fumo', 'Presidente da República', 'Procurador', 'Procurador de Justiça', 
        'Produtor de Espetáculos Públicos', 'Produtor Musical', 'Produtor Rural', 'Professor', 'Profissional de Artefatos de Couro', 
        'Profissional de Letras/Artes', 'Programador', 'Programador de Controle de Produção', 'Projetista', 'Promotor de Eventos', 
        'Promotor de Justiça', 'Promotor de Negócios', 'Promotor de Vendas', 'Propagandista', 'Proprietário', 'Prostituta', 'Protético', 
        'Protético dentário', 'Psicanalista', 'Psicólogo', 'Publicitário', 'Pugilista', 'Químico', 'Químico industrial', 'Radialista', 
        'Radiologista', 'Radiotécnico', 'Radiotelegrafista', 'Raspador', 'Recenseador', 'Recepcionista', 'Recreacionista', 'Redator', 
        'Relações Públicas', 'Relojoeiro', 'Repórter', 'Repórter Cinematográfico', 'Repositor', 'Repóter fotográfico', 'Representante Comercial', 
        'Restaurador', 'Retificador', 'Retificador de Fieiras', 'Retireiro', 'Revisor', 'Roteirista', 'Sacerdote', 'Salgadeiro', 'Salineiro', 
        'Salva - Vidas', 'Sapateiro', 'Secretário', 'Secretário de Estado', 'Secretário Municipal', 'Securitário', 'Segurança', 
        'Sem Profissão Definida', 'Senador da República', 'Separador de Sucata', 'Serigrafista', 'Seringueiro', 'Serrador', 'Serralheiro', 
        'Servente', 'Servente de Pedreiro', 'Serventuário da Justiça', 'Servidor Público', 'Servidor Público Estadual', 'Servidor Público Federal', 
        'Servidor Público Municipal', 'Siderúrgico', 'Síndico', 'Sitiante', 'Sociólogo', 'Soldado do Exército Brasileiro', 'Soldador', 'Sonoplasta', 
        'Suinocultor', 'Superintendente', 'Supervisor', 'Supervisor de Produção', 'Supervisor de Segurança', 'Supervisor de Vendas', 
        'Supervisor de Telemarketing', 'Tabageiro', 'Tabelião', 'Tanoeiro', 'Tapeceiro', 'Taquígrafo', 'Tatuador', 'Taxista', 'Tecelão', 'Técnico', 
        'Técnico de Copiadora', 'Técnico de Futebol', 'Técnico de Saneamento', 'Técnico de vendas', 'Técnico em Administração', 
        'Técnico em Agrimensura', 'Técnico em Agronomia', 'Técnico em Agropecuária', 'Técnico em Aparelhos Eletrodomésticos', 'Técnico em Biologia', 
        'Técnico em Bioterismo', 'Técnico em Contabilidade', 'Técnico em Desportos', 'Técnico em Edificações', 'Técnico em Eletricidade', 
        'Técnico em Eletrônica', 'Técnico em Enfermagem', 'Técnico em Engenharia', 'Técnico em Estatística', 'Técnico em Farmácia', 
        'Técnico em Geologia', 'Técnico em Informática', 'Técnico em Laboratório', 'Técnico em Manutenção', 'Técnico em Mecânica', 
        'Técnico em Mecânica de Produção', 'Técnico em Metalurgia', 'Técnico em Mineração', 'Técnico em Nutrição', 'Técnico em Piscicultura', 
        'Técnico em Plástico', 'Técnico em Processamento de Dados', 'Técnico em Produção Industrial', 'Técnico em Química', 
        'Técnico em Radiologia', 'Técnico em Raios X', 'Técnico em Refrigeração', 'Técnico em Segurança do Trabalho', 
        'Técnico em Telecomunicações', 'Técnico em Telefonia', 'Técnico em Veterinária', 'Técnico Fiscal em Arrecadação', 
        'Técnico Fiscal em Tributação', 'Técnico Industrial', 'Técnico Têxtil', 'Tecnólogo', 'Telefonista', 'Telegrafista', 'Teletipista', 
        'Terapeuta Ocupacional', 'Tesoureiro', 'Tintureiro','Tipógrafo', 'Torneiro Ferramenteiro', 'Torneiro Mecânico', 'Trabalhador Agrícola', 
        'Trabalhador em Fábrica de Alimentos', 'Trabalhador em Fábrica de Calçados', 'Trabalhador em Fábrica de Papel', 
        'Trabalhador em Fábrica Têxteis', 'Trabalhador na Construção Civil', 'Trabalhador Rural', 'Tradutor', 'Transportador', 'Trapezista', 
        'Tratador', 'Tratorista', 'Urbanista', 'Usineiro', 'Vacinador', 'Vaqueiro', 'Varredor de Ruas', 'Vendedor', 'Verdureiro', 'Vereador', 
        'Veterinário', 'Viajante', 'Vice-Diretor', 'Vice-Prefeito', 'Vice-Presidente', 'Vidraceiro', 'Vigilante', 'Vigilante Bancário', 
        'Vigilante noturno', 'Vimeiro', 'Zelador', 'Zoólogo', 'Zootecnista'
    ];
    $('.typeahead-job').typeahead({
       hint: true,
       highlight: true,
       minLength: 1
   },
   {
       name: 'job',
       displayKey: 'value',
       source: substringMatcher(job)
   });


   var nacionality = [
       'albanês', 'albanesa', 'alemão', 'alemã', 'austríaco', 'austríaca', 'belga', 'belga', 'búlgaro', 'búlgara', 'croata', 'croata', 
       'cipriota', 'cipriota', 'dinamarquês', 'dinamarquesa', 'eslovaco', 'eslovaca', 'esloveno', 'eslovena', 'espanhol', 'espanhola',
       'francês', 'francesa', 'finlandês', 'finlandesa', 'grego', 'grega', 'húngaro', 'húngara', 'islandês', 'islandesa', 'irlandês', 'irlandesa', 
       'italiano', 'italiana', 'kosovar', 'kosovar', 'lituano', 'lituana', 'luxemburguês', 'luxemburguesa', 'montenegrino', 'montenegrina', 
       'holandês', 'holandesa', 'norueguês', 'norueguesa', 'polaco', 'polaca', 'português', 'portuguesa', 'inglês', 'inglesa', 'romenos', 'romena', 
       'russo', 'russa', 'sueco', 'sueca', 'suíço', 'suíça', 'turco', 'turca', 'ucraniano', 'ucraniana', 'argentino', 'argentina', 'brasileiro', 'brasileira', 
       'canadiano', 'canadiana', 'chileno', 'chilena', 'colombiano', 'colombiana', 'cubano', 'cubana', 'americano', 'americana', 'mexicano', 'mexicana', 
       'venezuelano', 'venezuelana', 'afegão', 'afegã', 'chinês', 'chinesa', 'norte-coreano', 'norte-coreana', 'sul-coreano', 'sul-coreana', 
       'indiano', 'indiana', 'indoneso', 'indonesa', 'iraniano', 'iraniana', 'iraquiano', 'iraquiana', 'israelita', 'israelita', 'japonês', 
       'japonesa', 'jordano', 'jordana', 'libanês', 'libanesa',  'paquistanês', 'paquistanesa', 'sírio', 'síria', 'tailandês', 'tailandesa', 
       'timorense', 'timorense', 'vietnamita', 'vietnamita', 'sul-africano', 'sul-africana', 'argelino', 'argelina', 'angolano', 'angolana',  
       'cabo-verdiano', 'cabo-verdiana', 'guineense', 'guineense', 'queniano', 'queniana', 'líbio', 'líbia', 'marroquino', 'marroquina', 
       'moçambicano', 'moçambicana', 'nigeriano', 'nigeriana', 'ruandês', 'ruandesa', 'santomense', 'santomense', 'senegalês', 'senegalesa', 
       'somalí', 'somalí', 'sudanês', 'sudanesa', 'tunisino', 'tunisina', 'australiano', 'australiana', 'neozelandês', 'neozelandesa'
    ];

   $('.typeahead-nacionality').typeahead({
       hint: true,
       highlight: true,
       minLength: 1
   },
   {
       name: 'nacionality',
       displayKey: 'value',
       source: substringMatcher(nacionality)
   });

   $('h3.accordion').click(function(){
        var dataId = $(this).parent().find('div.accordion').attr('data-id');
        var dataId2 = '';
        $('div.accordion').each(function(){
            dataId2 = $(this).attr('data-id');
            if(dataId != dataId2){
                $(this).hide(350);
            }
        });        
        $('h3.accordion').removeClass('show');
        $(this).addClass('show');
        $(this).parent().find('div.accordion').slideToggle("slow");
    });


    $("#owl-carousel-shots-phone").owlCarousel({
        singleItem:true,navigation: true,
        navigationText: [
            "<i class='icon arrow_carrot-left'></i>",
            "<i class='icon arrow_carrot-right'></i>"
        ],
        addClassActive : true,
        itemsDesktop : [1200, 1],
        itemsDesktopSmall : [960, 1],
        itemsTablet : [769, 1],
        itemsMobile : [700, 1],
        responsiveBaseWidth : ".shot-container",
        items : 1,
        slideSpeed : 3000,
        responsiveRefreshRate : 200,
        autoPlay: 6000,
        stopOnHover: true
    });	

});


// * owl.carousel.js - http://owlgraphic.com/owlcarousel;
"function"!==typeof Object.create&&(Object.create=function(e){
    function t(){}t.prototype=e;return new t});(function(e,t,n){var r={init:function(t,n){this.$elem=e(n);this.options=e.extend({},e.fn.owlCarousel.options,this.$elem.data(),t);this.userOptions=t;this.loadContent()},loadContent:function(){function t(e){var t,r="";if("function"===typeof n.options.jsonSuccess)n.options.jsonSuccess.apply(this,[e]);else{for(t in e.owl)e.owl.hasOwnProperty(t)&&(r+=e.owl[t].item);n.$elem.html(r)}n.logIn()}var n=this,r;"function"===typeof n.options.beforeInit&&n.options.beforeInit.apply(this,[n.$elem]);"string"===typeof n.options.jsonPath?(r=n.options.jsonPath,e.getJSON(r,t)):n.logIn()},logIn:function(){this.$elem.data("owl-originalStyles",this.$elem.attr("style"));this.$elem.data("owl-originalClasses",this.$elem.attr("class"));this.$elem.css({opacity:0});this.orignalItems=this.options.items;this.checkBrowser();this.wrapperWidth=0;this.checkVisible=null;this.setVars()},setVars:function(){if(0===this.$elem.children().length)return!1;this.baseClass();this.eventTypes();this.$userItems=this.$elem.children();this.itemsAmount=this.$userItems.length;this.wrapItems();this.$owlItems=this.$elem.find(".owl-item");this.$owlWrapper=this.$elem.find(".owl-wrapper");this.playDirection="next";this.prevItem=0;this.prevArr=[0];this.currentItem=0;this.customEvents();this.onStartup()},onStartup:function(){this.updateItems();this.calculateAll();this.buildControls();this.updateControls();this.response();this.moveEvents();this.stopOnHover();this.owlStatus();!1!==this.options.transitionStyle&&this.transitionTypes(this.options.transitionStyle);!0===this.options.autoPlay&&(this.options.autoPlay=5e3);this.play();this.$elem.find(".owl-wrapper").css("display","block");this.$elem.is(":visible")?this.$elem.css("opacity",1):this.watchVisibility();this.onstartup=!1;this.eachMoveUpdate();"function"===typeof this.options.afterInit&&this.options.afterInit.apply(this,[this.$elem])},eachMoveUpdate:function(){!0===this.options.lazyLoad&&this.lazyLoad();!0===this.options.autoHeight&&this.autoHeight();this.onVisibleItems();"function"===typeof this.options.afterAction&&this.options.afterAction.apply(this,[this.$elem])},updateVars:function(){"function"===typeof this.options.beforeUpdate&&this.options.beforeUpdate.apply(this,[this.$elem]);this.watchVisibility();this.updateItems();this.calculateAll();this.updatePosition();this.updateControls();this.eachMoveUpdate();"function"===typeof this.options.afterUpdate&&this.options.afterUpdate.apply(this,[this.$elem])},reload:function(){var e=this;t.setTimeout(function(){e.updateVars()},0)},watchVisibility:function(){var e=this;if(!1===e.$elem.is(":visible"))e.$elem.css({opacity:0}),t.clearInterval(e.autoPlayInterval),t.clearInterval(e.checkVisible);else return!1;e.checkVisible=t.setInterval(function(){e.$elem.is(":visible")&&(e.reload(),e.$elem.animate({opacity:1},200),t.clearInterval(e.checkVisible))},500)},wrapItems:function(){this.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>');this.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">');this.wrapperOuter=this.$elem.find(".owl-wrapper-outer");this.$elem.css("display","block")},baseClass:function(){var e=this.$elem.hasClass(this.options.baseClass),t=this.$elem.hasClass(this.options.theme);e||this.$elem.addClass(this.options.baseClass);t||this.$elem.addClass(this.options.theme)},updateItems:function(){var t,n;if(!1===this.options.responsive)return!1;if(!0===this.options.singleItem)return this.options.items=this.orignalItems=1,this.options.itemsCustom=!1,this.options.itemsDesktop=!1,this.options.itemsDesktopSmall=!1,this.options.itemsTablet=!1,this.options.itemsTabletSmall=!1,this.options.itemsMobile=!1;t=e(this.options.responsiveBaseWidth).width();t>(this.options.itemsDesktop[0]||this.orignalItems)&&(this.options.items=this.orignalItems);if(!1!==this.options.itemsCustom)for(this.options.itemsCustom.sort(function(e,t){return e[0]-t[0]}),n=0;n<this.options.itemsCustom.length;n+=1)this.options.itemsCustom[n][0]<=t&&(this.options.items=this.options.itemsCustom[n][1]);else t<=this.options.itemsDesktop[0]&&!1!==this.options.itemsDesktop&&(this.options.items=this.options.itemsDesktop[1]),t<=this.options.itemsDesktopSmall[0]&&!1!==this.options.itemsDesktopSmall&&(this.options.items=this.options.itemsDesktopSmall[1]),t<=this.options.itemsTablet[0]&&!1!==this.options.itemsTablet&&(this.options.items=this.options.itemsTablet[1]),t<=this.options.itemsTabletSmall[0]&&!1!==this.options.itemsTabletSmall&&(this.options.items=this.options.itemsTabletSmall[1]),t<=this.options.itemsMobile[0]&&!1!==this.options.itemsMobile&&(this.options.items=this.options.itemsMobile[1]);this.options.items>this.itemsAmount&&!0===this.options.itemsScaleUp&&(this.options.items=this.itemsAmount)},response:function(){var n=this,r,i;if(!0!==n.options.responsive)return!1;i=e(t).width();n.resizer=function(){e(t).width()!==i&&(!1!==n.options.autoPlay&&t.clearInterval(n.autoPlayInterval),t.clearTimeout(r),r=t.setTimeout(function(){i=e(t).width();n.updateVars()},n.options.responsiveRefreshRate))};e(t).resize(n.resizer)},updatePosition:function(){this.jumpTo(this.currentItem);!1!==this.options.autoPlay&&this.checkAp()},appendItemsSizes:function(){var t=this,n=0,r=t.itemsAmount-t.options.items;t.$owlItems.each(function(i){var s=e(this);s.css({width:t.itemWidth}).data("owl-item",Number(i));if(0===i%t.options.items||i===r)i>r||(n+=1);s.data("owl-roundPages",n)})},appendWrapperSizes:function(){this.$owlWrapper.css({width:this.$owlItems.length*this.itemWidth*2,left:0});this.appendItemsSizes()},calculateAll:function(){this.calculateWidth();this.appendWrapperSizes();this.loops();this.max()},calculateWidth:function(){this.itemWidth=Math.round(this.$elem.width()/this.options.items)},max:function(){var e=-1*(this.itemsAmount*this.itemWidth-this.options.items*this.itemWidth);this.options.items>this.itemsAmount?this.maximumPixels=e=this.maximumItem=0:(this.maximumItem=this.itemsAmount-this.options.items,this.maximumPixels=e);return e},min:function(){return 0},loops:function(){var t=0,n=0,r,i;this.positionsInArray=[0];this.pagesInArray=[];for(r=0;r<this.itemsAmount;r+=1)n+=this.itemWidth,this.positionsInArray.push(-n),!0===this.options.scrollPerPage&&(i=e(this.$owlItems[r]),i=i.data("owl-roundPages"),i!==t&&(this.pagesInArray[t]=this.positionsInArray[r],t=i))},buildControls:function(){if(!0===this.options.navigation||!0===this.options.pagination)this.owlControls=e('<div class="owl-controls"/>').toggleClass("clickable",!this.browser.isTouch).appendTo(this.$elem);!0===this.options.pagination&&this.buildPagination();!0===this.options.navigation&&this.buildButtons()},buildButtons:function(){var t=this,n=e('<div class="owl-buttons"/>');t.owlControls.append(n);t.buttonPrev=e("<div/>",{"class":"owl-prev",html:t.options.navigationText[0]||""});t.buttonNext=e("<div/>",{"class":"owl-next",html:t.options.navigationText[1]||""});n.append(t.buttonPrev).append(t.buttonNext);n.on("touchstart.owlControls mousedown.owlControls",'div[class^="owl"]',function(e){e.preventDefault()});n.on("touchend.owlControls mouseup.owlControls",'div[class^="owl"]',function(n){n.preventDefault();e(this).hasClass("owl-next")?t.next():t.prev()})},buildPagination:function(){var t=this;t.paginationWrapper=e('<div class="owl-pagination"/>');t.owlControls.append(t.paginationWrapper);t.paginationWrapper.on("touchend.owlControls mouseup.owlControls",".owl-page",function(n){n.preventDefault();Number(e(this).data("owl-page"))!==t.currentItem&&t.goTo(Number(e(this).data("owl-page")),!0)})},updatePagination:function(){var t,n,r,i,s,o;if(!1===this.options.pagination)return!1;this.paginationWrapper.html("");t=0;n=this.itemsAmount-this.itemsAmount%this.options.items;for(i=0;i<this.itemsAmount;i+=1)0===i%this.options.items&&(t+=1,n===i&&(r=this.itemsAmount-this.options.items),s=e("<div/>",{"class":"owl-page"}),o=e("<span></span>",{text:!0===this.options.paginationNumbers?t:"","class":!0===this.options.paginationNumbers?"owl-numbers":""}),s.append(o),s.data("owl-page",n===i?r:i),s.data("owl-roundPages",t),this.paginationWrapper.append(s));this.checkPagination()},checkPagination:function(){var t=this;if(!1===t.options.pagination)return!1;t.paginationWrapper.find(".owl-page").each(function(){e(this).data("owl-roundPages")===e(t.$owlItems[t.currentItem]).data("owl-roundPages")&&(t.paginationWrapper.find(".owl-page").removeClass("active"),e(this).addClass("active"))})},checkNavigation:function(){if(!1===this.options.navigation)return!1;!1===this.options.rewindNav&&(0===this.currentItem&&0===this.maximumItem?(this.buttonPrev.addClass("disabled"),this.buttonNext.addClass("disabled")):0===this.currentItem&&0!==this.maximumItem?(this.buttonPrev.addClass("disabled"),this.buttonNext.removeClass("disabled")):this.currentItem===this.maximumItem?(this.buttonPrev.removeClass("disabled"),this.buttonNext.addClass("disabled")):0!==this.currentItem&&this.currentItem!==this.maximumItem&&(this.buttonPrev.removeClass("disabled"),this.buttonNext.removeClass("disabled")))},updateControls:function(){this.updatePagination();this.checkNavigation();this.owlControls&&(this.options.items>=this.itemsAmount?this.owlControls.hide():this.owlControls.show())},destroyControls:function(){this.owlControls&&this.owlControls.remove()},next:function(e){if(this.isTransition)return!1;this.currentItem+=!0===this.options.scrollPerPage?this.options.items:1;if(this.currentItem>this.maximumItem+(!0===this.options.scrollPerPage?this.options.items-1:0))if(!0===this.options.rewindNav)this.currentItem=0,e="rewind";else return this.currentItem=this.maximumItem,!1;this.goTo(this.currentItem,e)},prev:function(e){if(this.isTransition)return!1;this.currentItem=!0===this.options.scrollPerPage&&0<this.currentItem&&this.currentItem<this.options.items?0:this.currentItem-(!0===this.options.scrollPerPage?this.options.items:1);if(0>this.currentItem)if(!0===this.options.rewindNav)this.currentItem=this.maximumItem,e="rewind";else return this.currentItem=0,!1;this.goTo(this.currentItem,e)},goTo:function(e,n,r){var i=this;if(i.isTransition)return!1;"function"===typeof i.options.beforeMove&&i.options.beforeMove.apply(this,[i.$elem]);e>=i.maximumItem?e=i.maximumItem:0>=e&&(e=0);i.currentItem=i.owl.currentItem=e;if(!1!==i.options.transitionStyle&&"drag"!==r&&1===i.options.items&&!0===i.browser.support3d)return i.swapSpeed(0),!0===i.browser.support3d?i.transition3d(i.positionsInArray[e]):i.css2slide(i.positionsInArray[e],1),i.afterGo(),i.singleItemTransition(),!1;e=i.positionsInArray[e];!0===i.browser.support3d?(i.isCss3Finish=!1,!0===n?(i.swapSpeed("paginationSpeed"),t.setTimeout(function(){i.isCss3Finish=!0},i.options.paginationSpeed)):"rewind"===n?(i.swapSpeed(i.options.rewindSpeed),t.setTimeout(function(){i.isCss3Finish=!0},i.options.rewindSpeed)):(i.swapSpeed("slideSpeed"),t.setTimeout(function(){i.isCss3Finish=!0},i.options.slideSpeed)),i.transition3d(e)):!0===n?i.css2slide(e,i.options.paginationSpeed):"rewind"===n?i.css2slide(e,i.options.rewindSpeed):i.css2slide(e,i.options.slideSpeed);i.afterGo()},jumpTo:function(e){"function"===typeof this.options.beforeMove&&this.options.beforeMove.apply(this,[this.$elem]);e>=this.maximumItem||-1===e?e=this.maximumItem:0>=e&&(e=0);this.swapSpeed(0);!0===this.browser.support3d?this.transition3d(this.positionsInArray[e]):this.css2slide(this.positionsInArray[e],1);this.currentItem=this.owl.currentItem=e;this.afterGo()},afterGo:function(){this.prevArr.push(this.currentItem);this.prevItem=this.owl.prevItem=this.prevArr[this.prevArr.length-2];this.prevArr.shift(0);this.prevItem!==this.currentItem&&(this.checkPagination(),this.checkNavigation(),this.eachMoveUpdate(),!1!==this.options.autoPlay&&this.checkAp());"function"===typeof this.options.afterMove&&this.prevItem!==this.currentItem&&this.options.afterMove.apply(this,[this.$elem])},stop:function(){this.apStatus="stop";t.clearInterval(this.autoPlayInterval)},checkAp:function(){"stop"!==this.apStatus&&this.play()},play:function(){var e=this;e.apStatus="play";if(!1===e.options.autoPlay)return!1;t.clearInterval(e.autoPlayInterval);e.autoPlayInterval=t.setInterval(function(){e.next(!0)},e.options.autoPlay)},swapSpeed:function(e){"slideSpeed"===e?this.$owlWrapper.css(this.addCssSpeed(this.options.slideSpeed)):"paginationSpeed"===e?this.$owlWrapper.css(this.addCssSpeed(this.options.paginationSpeed)):"string"!==typeof e&&this.$owlWrapper.css(this.addCssSpeed(e))},addCssSpeed:function(e){return{"-webkit-transition":"all "+e+"ms ease","-moz-transition":"all "+e+"ms ease","-o-transition":"all "+e+"ms ease",transition:"all "+e+"ms ease"}},removeTransition:function(){return{"-webkit-transition":"","-moz-transition":"","-o-transition":"",transition:""}},doTranslate:function(e){return{"-webkit-transform":"translate3d("+e+"px, 0px, 0px)","-moz-transform":"translate3d("+e+"px, 0px, 0px)","-o-transform":"translate3d("+e+"px, 0px, 0px)","-ms-transform":"translate3d("+e+"px, 0px, 0px)",transform:"translate3d("+e+"px, 0px,0px)"}},transition3d:function(e){this.$owlWrapper.css(this.doTranslate(e))},css2move:function(e){this.$owlWrapper.css({left:e})},css2slide:function(e,t){var n=this;n.isCssFinish=!1;n.$owlWrapper.stop(!0,!0).animate({left:e},{duration:t||n.options.slideSpeed,complete:function(){n.isCssFinish=!0}})},checkBrowser:function(){var e=n.createElement("div");e.style.cssText="  -moz-transform:translate3d(0px, 0px, 0px); -ms-transform:translate3d(0px, 0px, 0px); -o-transform:translate3d(0px, 0px, 0px); -webkit-transform:translate3d(0px, 0px, 0px); transform:translate3d(0px, 0px, 0px)";e=e.style.cssText.match(/translate3d\(0px, 0px, 0px\)/g);this.browser={support3d:null!==e&&1===e.length,isTouch:"ontouchstart"in t||t.navigator.msMaxTouchPoints}},moveEvents:function(){if(!1!==this.options.mouseDrag||!1!==this.options.touchDrag)this.gestures(),this.disabledEvents()},eventTypes:function(){var e=["s","e","x"];this.ev_types={};!0===this.options.mouseDrag&&!0===this.options.touchDrag?e=["touchstart.owl mousedown.owl","touchmove.owl mousemove.owl","touchend.owl touchcancel.owl mouseup.owl"]:!1===this.options.mouseDrag&&!0===this.options.touchDrag?e=["touchstart.owl","touchmove.owl","touchend.owl touchcancel.owl"]:!0===this.options.mouseDrag&&!1===this.options.touchDrag&&(e=["mousedown.owl","mousemove.owl","mouseup.owl"]);this.ev_types.start=e[0];this.ev_types.move=e[1];this.ev_types.end=e[2]},disabledEvents:function(){this.$elem.on("dragstart.owl",function(e){e.preventDefault()});this.$elem.on("mousedown.disableTextSelect",function(t){return e(t.target).is("input, textarea, select, option")})},gestures:function(){function r(e){if(void 0!==e.touches)return{x:e.touches[0].pageX,y:e.touches[0].pageY};if(void 0===e.touches){if(void 0!==e.pageX)return{x:e.pageX,y:e.pageY};if(void 0===e.pageX)return{x:e.clientX,y:e.clientY}}}function i(t){"on"===t?(e(n).on(u.ev_types.move,s),e(n).on(u.ev_types.end,o)):"off"===t&&(e(n).off(u.ev_types.move),e(n).off(u.ev_types.end))}function s(i){i=i.originalEvent||i||t.event;u.newPosX=r(i).x-a.offsetX;u.newPosY=r(i).y-a.offsetY;u.newRelativeX=u.newPosX-a.relativePos;"function"===typeof u.options.startDragging&&!0!==a.dragging&&0!==u.newRelativeX&&(a.dragging=!0,u.options.startDragging.apply(u,[u.$elem]));(8<u.newRelativeX||-8>u.newRelativeX)&&!0===u.browser.isTouch&&(void 0!==i.preventDefault?i.preventDefault():i.returnValue=!1,a.sliding=!0);(10<u.newPosY||-10>u.newPosY)&&!1===a.sliding&&e(n).off("touchmove.owl");u.newPosX=Math.max(Math.min(u.newPosX,u.newRelativeX/5),u.maximumPixels+u.newRelativeX/5);!0===u.browser.support3d?u.transition3d(u.newPosX):u.css2move(u.newPosX)}function o(n){n=n.originalEvent||n||t.event;var r;n.target=n.target||n.srcElement;a.dragging=!1;!0!==u.browser.isTouch&&u.$owlWrapper.removeClass("grabbing");u.dragDirection=0>u.newRelativeX?u.owl.dragDirection="left":u.owl.dragDirection="right";0!==u.newRelativeX&&(r=u.getNewPosition(),u.goTo(r,!1,"drag"),a.targetElement===n.target&&!0!==u.browser.isTouch&&(e(n.target).on("click.disable",function(t){t.stopImmediatePropagation();t.stopPropagation();t.preventDefault();e(t.target).off("click.disable")}),n=e._data(n.target,"events").click,r=n.pop(),n.splice(0,0,r)));i("off")}var u=this,a={offsetX:0,offsetY:0,baseElWidth:0,relativePos:0,position:null,minSwipe:null,maxSwipe:null,sliding:null,dargging:null,targetElement:null};u.isCssFinish=!0;u.$elem.on(u.ev_types.start,".owl-wrapper",function(n){n=n.originalEvent||n||t.event;var s;if(3===n.which)return!1;if(!(u.itemsAmount<=u.options.items)){if(!1===u.isCssFinish&&!u.options.dragBeforeAnimFinish||!1===u.isCss3Finish&&!u.options.dragBeforeAnimFinish)return!1;!1!==u.options.autoPlay&&t.clearInterval(u.autoPlayInterval);!0===u.browser.isTouch||u.$owlWrapper.hasClass("grabbing")||u.$owlWrapper.addClass("grabbing");u.newPosX=0;u.newRelativeX=0;e(this).css(u.removeTransition());s=e(this).position();a.relativePos=s.left;a.offsetX=r(n).x-s.left;a.offsetY=r(n).y-s.top;i("on");a.sliding=!1;a.targetElement=n.target||n.srcElement}})},getNewPosition:function(){var e=this.closestItem();e>this.maximumItem?e=this.currentItem=this.maximumItem:0<=this.newPosX&&(this.currentItem=e=0);return e},closestItem:function(){var t=this,n=!0===t.options.scrollPerPage?t.pagesInArray:t.positionsInArray,r=t.newPosX,i=null;e.each(n,function(s,o){r-t.itemWidth/20>n[s+1]&&r-t.itemWidth/20<o&&"left"===t.moveDirection()?(i=o,t.currentItem=!0===t.options.scrollPerPage?e.inArray(i,t.positionsInArray):s):r+t.itemWidth/20<o&&r+t.itemWidth/20>(n[s+1]||n[s]-t.itemWidth)&&"right"===t.moveDirection()&&(!0===t.options.scrollPerPage?(i=n[s+1]||n[n.length-1],t.currentItem=e.inArray(i,t.positionsInArray)):(i=n[s+1],t.currentItem=s+1))});return t.currentItem},moveDirection:function(){var e;0>this.newRelativeX?(e="right",this.playDirection="next"):(e="left",this.playDirection="prev");return e},customEvents:function(){var e=this;e.$elem.on("owl.next",function(){e.next()});e.$elem.on("owl.prev",function(){e.prev()});e.$elem.on("owl.play",function(t,n){e.options.autoPlay=n;e.play();e.hoverStatus="play"});e.$elem.on("owl.stop",function(){e.stop();e.hoverStatus="stop"});e.$elem.on("owl.goTo",function(t,n){e.goTo(n)});e.$elem.on("owl.jumpTo",function(t,n){e.jumpTo(n)})},stopOnHover:function(){var e=this;!0===e.options.stopOnHover&&!0!==e.browser.isTouch&&!1!==e.options.autoPlay&&(e.$elem.on("mouseover",function(){e.stop()}),e.$elem.on("mouseout",function(){"stop"!==e.hoverStatus&&e.play()}))},lazyLoad:function(){var t,n,r,i,s;if(!1===this.options.lazyLoad)return!1;for(t=0;t<this.itemsAmount;t+=1)n=e(this.$owlItems[t]),"loaded"!==n.data("owl-loaded")&&(r=n.data("owl-item"),i=n.find(".lazyOwl"),"string"!==typeof i.data("src")?n.data("owl-loaded","loaded"):(void 0===n.data("owl-loaded")&&(i.hide(),n.addClass("loading").data("owl-loaded","checked")),(s=!0===this.options.lazyFollow?r>=this.currentItem:!0)&&r<this.currentItem+this.options.items&&i.length&&this.lazyPreload(n,i)))},lazyPreload:function(e,n){function r(){e.data("owl-loaded","loaded").removeClass("loading");n.removeAttr("data-src");"fade"===s.options.lazyEffect?n.fadeIn(400):n.show();"function"===typeof s.options.afterLazyLoad&&s.options.afterLazyLoad.apply(this,[s.$elem])}function i(){o+=1;s.completeImg(n.get(0))||!0===u?r():100>=o?t.setTimeout(i,100):r()}var s=this,o=0,u;"DIV"===n.prop("tagName")?(n.css("background-image","url("+n.data("src")+")"),u=!0):n[0].src=n.data("src");i()},autoHeight:function(){function n(){var n=e(i.$owlItems[i.currentItem]).height();i.wrapperOuter.css("height",n+"px");i.wrapperOuter.hasClass("autoHeight")||t.setTimeout(function(){i.wrapperOuter.addClass("autoHeight")},0)}function r(){o+=1;i.completeImg(s.get(0))?n():100>=o?t.setTimeout(r,100):i.wrapperOuter.css("height","")}var i=this,s=e(i.$owlItems[i.currentItem]).find("img"),o;void 0!==s.get(0)?(o=0,r()):n()},completeImg:function(e){return!e.complete||"undefined"!==typeof e.naturalWidth&&0===e.naturalWidth?!1:!0},onVisibleItems:function(){var t;!0===this.options.addClassActive&&this.$owlItems.removeClass("active");this.visibleItems=[];for(t=this.currentItem;t<this.currentItem+this.options.items;t+=1)this.visibleItems.push(t),!0===this.options.addClassActive&&e(this.$owlItems[t]).addClass("active");this.owl.visibleItems=this.visibleItems},transitionTypes:function(e){this.outClass="owl-"+e+"-out";this.inClass="owl-"+e+"-in"},singleItemTransition:function(){var e=this,t=e.outClass,n=e.inClass,r=e.$owlItems.eq(e.currentItem),i=e.$owlItems.eq(e.prevItem),s=Math.abs(e.positionsInArray[e.currentItem])+e.positionsInArray[e.prevItem],o=Math.abs(e.positionsInArray[e.currentItem])+e.itemWidth/2;e.isTransition=!0;e.$owlWrapper.addClass("owl-origin").css({"-webkit-transform-origin":o+"px","-moz-perspective-origin":o+"px","perspective-origin":o+"px"});i.css({position:"relative",left:s+"px"}).addClass(t).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend",function(){e.endPrev=!0;i.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");e.clearTransStyle(i,t)});r.addClass(n).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend",function(){e.endCurrent=!0;r.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");e.clearTransStyle(r,n)})},clearTransStyle:function(e,t){e.css({position:"",left:""}).removeClass(t);this.endPrev&&this.endCurrent&&(this.$owlWrapper.removeClass("owl-origin"),this.isTransition=this.endCurrent=this.endPrev=!1)},owlStatus:function(){this.owl={userOptions:this.userOptions,baseElement:this.$elem,userItems:this.$userItems,owlItems:this.$owlItems,currentItem:this.currentItem,prevItem:this.prevItem,visibleItems:this.visibleItems,isTouch:this.browser.isTouch,browser:this.browser,dragDirection:this.dragDirection}},clearEvents:function(){this.$elem.off(".owl owl mousedown.disableTextSelect");e(n).off(".owl owl");e(t).off("resize",this.resizer)},unWrap:function(){0!==this.$elem.children().length&&(this.$owlWrapper.unwrap(),this.$userItems.unwrap().unwrap(),this.owlControls&&this.owlControls.remove());this.clearEvents();this.$elem.attr("style",this.$elem.data("owl-originalStyles")||"").attr("class",this.$elem.data("owl-originalClasses"))},destroy:function(){this.stop();t.clearInterval(this.checkVisible);this.unWrap();this.$elem.removeData()},reinit:function(t){t=e.extend({},this.userOptions,t);this.unWrap();this.init(t,this.$elem)},addItem:function(e,t){var n;if(!e)return!1;if(0===this.$elem.children().length)return this.$elem.append(e),this.setVars(),!1;this.unWrap();n=void 0===t||-1===t?-1:t;n>=this.$userItems.length||-1===n?this.$userItems.eq(-1).after(e):this.$userItems.eq(n).before(e);this.setVars()},removeItem:function(e){if(0===this.$elem.children().length)return!1;e=void 0===e||-1===e?-1:e;this.unWrap();this.$userItems.eq(e).remove();this.setVars()}};e.fn.owlCarousel=function(t){return this.each(function(){if(!0===e(this).data("owl-init"))return!1;e(this).data("owl-init",!0);var n=Object.create(r);n.init(t,this);e.data(this,"owlCarousel",n)})};e.fn.owlCarousel.options={items:5,itemsCustom:!1,itemsDesktop:[1199,4],itemsDesktopSmall:[979,3],itemsTablet:[768,2],itemsTabletSmall:!1,itemsMobile:[479,1],singleItem:!1,itemsScaleUp:!1,slideSpeed:200,paginationSpeed:800,rewindSpeed:1e3,autoPlay:!1,stopOnHover:!1,navigation:!1,navigationText:["prev","next"],rewindNav:!0,scrollPerPage:!1,pagination:!0,paginationNumbers:!1,responsive:!0,responsiveRefreshRate:200,responsiveBaseWidth:t,baseClass:"owl-carousel",theme:"owl-theme",lazyLoad:!1,lazyFollow:!0,lazyEffect:"fade",autoHeight:!1,jsonPath:!1,jsonSuccess:!1,dragBeforeAnimFinish:!0,mouseDrag:!0,touchDrag:!0,addClassActive:!1,transitionStyle:!1,beforeUpdate:!1,afterUpdate:!1,beforeInit:!1,afterInit:!1,beforeMove:!1,afterMove:!1,afterAction:!1,startDragging:!1,afterLazyLoad:!1}})(jQuery,window,document)