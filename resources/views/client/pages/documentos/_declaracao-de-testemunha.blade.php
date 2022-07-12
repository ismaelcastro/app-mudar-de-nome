<style>
    #info { margin: 50px; }
    #radio-inline { margin-left: 15px; }
    #info label, select, input { font-size: 18px !important; }
    #info label { margin: 0 25px 0px 0; }
    #info input, select { margin-bottom: 25px; }
    #info table td { font-size: 18px}
</style>

<div id="declaracao-testemunha">

    <div id="radioContrata{{$cdid}}" class="col-12 col-form-label">
        <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">1</span>
        <div id="info">
            <h5>Qual o tipo de assinatura Declaração?</h5>
            <p>Informe por gentileza qual será o tipo de assinatura utilizada para dar validade juridica para a Declaração</p>

            <div id="radio-inline" class="row radio-inline" style="justify-content: space-between;margin-left: 0px;">
                <div class="col-5 option" style="width: 279.2px;">
                    <div class="radio-inline">
                        <label class="radio radio-outline radio-success">
                            <input type="radio" name="checkDeclaracao_{{$cdid}}" value="cartorio">
                            <span></span>
                            <div class="option-label" style="width: 190px !important;"><b>Cartorio</b>
                                <span style="float: right;">R$ 5,00 – 10,00</span>
                            </div>
                        </label>
                    </div>
                    <div class="option-body text-justify">Declaração com <strong>assinatura manual</strong>, com
                        autencidade confirmada através de
                        <strong>firma reconhecida por semelhança</strong> em Cartório de Notas onde a testemunha
                        tenha firma aberta.
                    </div>
                </div>
                <div class="col-5 option" style="width: 279.2px;">
                    <div class="radio-inline">
                        <label class="radio radio-outline radio-success">
                            <input type="radio" name="checkDeclaracao_{{$cdid}}" value="online">
                            <span></span>
                            <div class="option-label" style="width: 190px !important;"><b>Online</b>
                                &nbsp;<img src="{{ asset('images/govbr-logo.png') }}" alt="" width="60" height="20"
                                           style="vertical-align:middle;">&nbsp;
                                <span style="float: right;">R$ 120,00</span>
                            </div>
                        </label>
                    </div>
                    <div class="option-body text-justify">Declaração com <strong>assinatura 100% digital</strong>,
                        com autencidade confirmada através do uso de
                        <strong>selfie</strong> integrada ao banco de dados do Governo Federal. (<i
                                class="text-success">Recomendado</i>)
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="declaracaoTestemunhaCartorio{{$cdid}}" style="display:none;">
        <div class="form-row mt-4">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">2</span>
            <div id="info">
                <h5>Baixe o Modelo de Declaração</h5>
                <p>Baixe o modelo de Declaração de Testemunha em formato Word clicando no botão abaixo.</p>
                    <a href="{{ route('client.documentos.generatedocument',['document' => $item->doc_id]) }}" download>
                        <img src="{{ asset('images/modelo-de-contratacao.png') }}" alt="W3Schools" width="250" height="50">
                    </a>
            </div>
        </div>
        <div class="form-row mt-4">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">3</span>
            <div id="info">
                <h5>Preencha os Dados da Testemunha</h5>
                <p>Substitua os campos destacados em <b class="text-danger">vermelho</b> pelos dados pessoais completos da Testemunha.</p>
            </div>
        </div>
        <div class="form-row mt-4">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">4</span>
            <div id="info">
                <h5>Depoimento detalhado</h5>
                <p>Substitua o campo em destaque <b style="color: #0000cc">azul</b> pelo depoimento que a Testemunha
                    pretende prestar ao juiz. Para maiores orientações favor ler as instruções do modelo disponivel.
                </p>
            </div>
        </div>
        <div class="form-row mt-4">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">5</span>
            <div id="info">
                <h5>Imprima e Solicite a Assinatura da Testemunha</h5>
                <p>A assinatura deve ter reconhecimento de firma por semelhaça em Cartório de Notas onde as testemunhas tiveram registro.</p>
            </div>
        </div>
        <div class="form-row mt-4">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">6</span>
            <div id="info">
                <h5>Anexe a Declaração com firma Reconhecida</h5>
                <p>Após a reconhecimento de firma em cartório, basta acessar o arquivo digitalizado em seu dispositivo,
                    ou tirar uma foto utilizando seu smartphone</p>
            </div>
        </div>
    </div>

    <form id="formDeclaracaoTestemunhaOnline{{$cdid}}" action="{{ route('client.documentos.contratar.declaracao') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="document_id" value="{{$doc_id}}">
        <div id="stepTestemunhaCnh{{$cdid}}" class="form-row mt-4" style="display: none">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">2</span>
            <div id="info">
                <h5>A Testemunha possui CNH?</h5>
                <p>No momento da selfie, será realizada uma consulta nas bases do DENATRAN para identificar se a selfie
                    resgistrada confere com o CPF informado da testemunha.
                </p>
                <div id="radio-inline" class="radio-inline">
                    <label class="radio radio-outline radio-success">
                        <input type="radio" name="radioCnh{{$cdid}}" value="sim"/>
                        <span></span>
                        <div class="option-label">Sim</div>
                    </label>
                    <label class="radio radio-outline radio-success">
                        <input type="radio" name="radioCnh{{$cdid}}" value="nao"/>
                        <span></span>
                        <div class="option-label">Não</div>
                    </label>
                </div>
                <div id="TestemunhaCnhDanger{{$cdid}}" class="col-12 col-sm-6" style="display: none">
                    <p class="text-danger">Infelizmente a Testemunha não conseguirá seguir com a assinatura de forma online,
                        favor selecionar a opção <b>Cartório</b> na etapa anterior
                    </p>
                </div>
            </div>
        </div>
        <div id="stepTestemunhaDados{{$cdid}}" class="form-row mt-4" style="display: none" >
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">3</span>
            <div id="info">
                <h5>Dados da Testemunha</h5>
                <p>Preencha os dados pessoais completos da Testemunha para a elaboração da Declaração</p>

                <div class="row">
                    <div class="col-12 col-12-xsmall">
                        {{ Form::text("name", null, ['id' => "name{$cdid}", 'class' => $errors->has('name') ?  'is-invalid' : '', 'placeholder' => 'Nome completo da Testemunha']) }}
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input id="nacionality{{$cdid}}" class="typeahead-nacionality{{$cdid}}" name="nacionality" type="text" placeholder="Nacionalidade">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input id="job{{$cdid}}" class="typeahead-job{{$cdid}}" name="job" type="text" placeholder="Profissão">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label for="cpf" class="mb-10"></label>
                        {{ Form::text("cpf", null, [ 'id' => "cpf{$cdid}",'class' => $errors->has('cpf') ?  'is-invalid cpf' : 'cpf', 'placeholder' => 'CPF']) }}
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label for="rg" class="mb-10"></label>
                        {{ Form::text("rg", null, [ 'id' => "rg{$cdid}",'class' => $errors->has('rg') ?  'is-invalid' : '', 'placeholder' => 'RG']) }}
                    </div>
                    <div class="col-12 col-12-xsmall">
                        {{ Form::text("phone", null, [ 'id' => "phone{$cdid}",'class' => $errors->has('phone') ?  'is-invalid sp_celphones' : 'sp_celphones', 'placeholder' => 'Celular da Testemunha']) }}
                    </div>
                    <div class="col-12 col-12-xsmall">
                        {{ Form::email("email", null, [ 'id' => "email{$cdid}",'class' => $errors->has('email') ?  'is-invalid' : '', 'placeholder' => 'E-mail da Testemunha']) }}
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label for="vinculo{{$cdid}}">Vinculo com Autor da ação? </label>
                        <select name="vinculo" id="vinculo{{$cdid}}">
                            <option value="">Selecione</option>
                            <option value="amigo(a)">Amigo(a)</option>
                            <option value="avo">Avô</option>
                            <option value="colega de trabalho">Colega de Trabalho</option>
                            <option value="irmao">Irmão</option>
                            <option value="mae">Mãe</option>
                            <option value="namorado(a)">Namorado(a)</option>
                            <option value="pai">Pai</option>
                            <option value="professor(a)">Professor(a)</option>
                            <option value="psicologo">Psicólogo</option>
                            <option value="tio(a)">Tio(a)</option>
                            <option value="vizinho">Vizinho</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div id="stepTestemunhaEndereco{{$cdid}}" class="form-row mt-4" style="display: none">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">4</span>
            <div id="info">
                <h5>Endereço da Testemunha</h5>
                <p>Preencha o endereço completo da testemunha para constar na Declaração.</p>

                <div class="row">
                    <div class="col-6 col-12-xsmall">
                        {{ Form::text("addresscep", null, [ 'id' => "addresscep{$cdid}", 'class' => $errors->has('addresscep') ?  'is-invalid cep' : 'cep', 'placeholder' => 'CEP']) }}
                    </div>
                    <div class="col-12 col-12-xsmall">
                        {{ Form::text("addressstreet", null, [ 'id' => "addressstreet{$cdid}", 'class' => $errors->has('addressstreet') ?  'is-invalid' : '', 'placeholder' => 'Endereço']) }}
                    </div>
                    <div class="col-6 col-12-xsmall">
                        {{ Form::text("addressnumber", null, [ 'id' => "addressnumber{$cdid}", 'class' => $errors->has('addressnumber') ?  'is-invalid' : '', 'placeholder' => 'Número']) }}
                    </div>
                    <div class="col-6 col-12-xsmall">
                        {{ Form::text("addresscomplement", null, [ 'id' => "addresscomplement{$cdid}", 'class' => $errors->has('addresscomplement') ?  'is-invalid' : '', 'placeholder' => 'Complemento']) }}
                    </div>
                    <div class="col-12 col-12-xsmall">
                        {{ Form::text("addressdistrict", null, [ 'id' => "addressdistrict{$cdid}", 'class' => $errors->has('addressdistrict') ?  'is-invalid' : '', 'placeholder' => 'Bairro']) }}
                    </div>
                    <div class="col-9 col-12-xsmall">
                        {{ Form::text("addresscity", null, [ 'id' => "addresscity{$cdid}", 'class' => $errors->has('addresscity') ?  ' is-invalid' : '', 'placeholder' => 'Cidade']) }}
                    </div>
                    <div class="col-3 col-12-xsmall">
                        {{ Form::text("addressstate", null, [ 'id' => "addressstate{$cdid}", 'class' => $errors->has('addressstate') ?  'text-uppercase is-invalid' : 'text-uppercase', 'placeholder' => 'UF']) }}
                    </div>
                </div>
            </div>

        </div>
        <div id="stepTestemunhaPagamento{{$cdid}}" class="form-row mt-4" style="display: none" >
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">5</span>
            <div id="info">
                <H5>Efetue o pagamento</H5>
                <p>Use dos dados abaixo para fazer a transferência Bancária ou PIX.</p>

                <div class="row">
                    <div class="col-4 col-12-xsmall text-center">
                        <img src="/assets-client/images/banco-inter-pj.jpg" alt="Banco Inter" class="img-responsive w-100">
                    </div>
                    <div class="col-8 col-12-xsmall">
                        <p class="fs-14"><strong>Banco Inter - 077</strong></p>
                        <p class="fs-14"><strong>Agência:</strong> 0001 | <strong>Conta:</strong> 711337-3 </p>
                        <p class="fs-14"><strong>CNPJ:</strong> 37.837.462/0001-78</p>
                        <p class="fs-14"><strong>Razão Social:</strong> Ratsbone & Magri Advogados Associados</p>
                        <p class="fs-14">
                            <strong>PIX:</strong>
                            <input type="text" id="mail_pix" value="financeiro@ratsbonemagri.com.br" readonly>
                            <a class="btn btn-default btn_cpoy" href="javascript:void(0);" onclick="copy_field('mail_pix');"> <i class="fa fa-copy"></i></a>
                        </p>
                        <p class="fs-14"><strong>Valor da Certidão:&nbsp;&nbsp;</strong>R$ 
                            <input id="valorPagamento{{$cdid}}" name="valorPagamento" disabled value="150,00" style="border: none;">
                        </p>
                    </div>
                </div>

                <div id="box_comprovante_pagamento_{{$cdid}}" class="box_field_upload">
                    <input type="file" id="comprovante_pagamento_{{$cdid}}" name="anexos[comprovante_pagamento]" required>
                    <p><i class="fa fa-upload"></i><br/>
                        Clique ou arraste o arquivo aqui para fazer o upload do comprovante
                    </p>
                </div>
                <div id="comprovante_pagamento_sucesso_{{$cdid}}" style="display:none;">
                    <div class="alert_success">
                        Comprovante enviado com sucesso
                    </div>
                </div>

            </div>
        </div>
        <div id="stepTestemunhaSubmit{{$cdid}}" class="button-row text-center" style="display: none;">
            <button id="formTestemunhaSubmit{{$cdid}}" class="btn btn-default mb-10" type="submit" title="Enviar" disabled>Enviar</button>
        </div>
    </form>

</div>
@push('scriptjs2')
    <script>
        function copy_field(t) {
            window.document.getElementById(t).select(), document.execCommand("copy"), toastr.success("Sucesso!", "Copiado para à área de transferência com sucesso")
        }

        $(window).bind("resize", function () {
            $(this).width() <= 991 ? $(".option").removeClass('col-5') : $(".option").removeClass('col-12').addClass('col-5');
        }).trigger('resize');

        $(document).ready(function () {
            $(`#uploadDoc{{$item->cdid}}Modal`).on('hidden.bs.modal', function () {
                location.reload();
            });

            $("#addresscep{{$cdid}}").focusout(function(){
                let cep = $(this).val().replace(/[^0-9]/, '');
                if(cep){
                    var url = 'https://viacep.com.br/ws/'+cep+'/json/';
                    $.ajax({
                        url: url,
                        dataType: 'jsonp',
                        crossDomain: true,
                        contentType: "application/json",
                        success : function(json){
                            if(json.logradouro){
                                $('#addressstreet{{$cdid}}').val(json.logradouro);
                                $('#addressdistrict{{$cdid}}').val(json.bairro);
                                $('#addresscity{{$cdid}}').val(json.localidade);
                                $('#addressstate{{$cdid}}').val(json.uf);
                            } else {
                                $('#addressstreet{{$cdid}}, #addressdistrict{{$cdid}}, #addresscity{{$cdid}}, #addressstate{{$cdid}}').val('');
                                alert('CEP não encontrado!');
                            }
                        }
                    });
                }
            });

            let job = [
                'Acabador de Mármore e Granito', 'ACONDICIONADOR', 'Acondicionador', 'Açougueiro', 'Acupunturista', 'Adestrador de Animais',
                'Administrador', 'Administrador de Empresas', 'Administrador de Fazenda', 'Administrador Rural', 'Administrador Financeiro',
                'ADMINISTRADOR RURAL', 'Advogado', 'Aeromodelista', 'Aeronauta', 'Aeroviário', 'Agenciador de Propaganda', 'AGENCIADOR DE PROPAGANDA',
                'Agente Administrativo', 'Agente de Compras e Vendas', 'AGENTE DE COMPRAS/VENDAS', 'Agente de Saúde', 'Agente de Segurança',
                'Agente de Seguros', 'Agente de Serviços Gerais', 'Agente de Turismo', 'Agente de Viagem', 'Agente Funerário', 'Agente Operacional',
                'Agente Penitenciário', 'Agente Publicitário', 'AGENTE VISTOR', 'Agricultor', 'Agrimensor', 'Agrônomo', 'Agropecuarista',
                'Ajudante de Cozinha', 'Ajudante de Eletricista', 'Ajudante de Motorista', 'Ajudante de Padeiro', 'Ajudante de Pedreiro',
                'Ajudante de Pintor', 'Ajudante de Serralheiro', 'Ajudante Geral', 'Ajustador Mecânico', 'Alfaiate', 'Almoxarife', 'Ambulante',
                'Amolador', 'Analista Contábil', 'Analista de Cargos e Salários', 'Analista de Desenvolvimento de Sistemas', 'ANALISTA DE ORG E METODOS',
                'Analista de Organização e Métodos', 'Analista de Recursos Humanos', 'Analista de Suporte', 'Analista de Vendas', 'Analista Financeiro',
                'Analista Químico', 'Anestesista', 'Antenista', 'ANTROPOLOGO', 'Antropólogo', 'Apicultor', 'APICULTOR', 'Apontador', 'Apontador de Mão de Obra',
                'Aposentado', 'Apresentador de TV', 'APRESENTADOR DE TV', 'ARBITRO DESPORTIVO', 'Árbitro Desportivo', 'Armador', 'Armeiro', 'Arqueólogo',
                'ARQUEOLOGO(A)', 'Arquiteto', 'Arquivista de Documentos', 'Arrumador', 'Artesão', 'Artífice', 'Artista', 'Artista Plástico', 'Ascensorista',
                'Assessor', 'Assessor Legislativo', 'Assistente Administrativo', 'Assistente de Filmagem', 'Assistente de Finanças', 'Assistente de Marketing',
                'Assistente de vendas', 'ASSISTENTE JUDICIARIO', 'Assistente Social', 'Assistente Técnico', 'Astrólogo', 'Astrônomo', 'Atendente',
                'Atendente de Enfermagem', 'Atendente de Lanchonete', 'Atendente de Portaria de Hotel', 'Atleta Amador', 'Atleta Profissional', 'Ator',
                'Atuário', 'Auditor', 'Autônomo', 'Autor-Roteirista', 'Auxiliar Administrativo', 'Auxiliar de Almoxarifado', 'Auxiliar de Biblioteca',
                'Auxiliar de cartório', 'Auxiliar de Cobrança', 'Auxiliar de Contabilidade', 'Auxiliar de Cozinha', 'Auxiliar de Dentista',
                'Auxiliar de Enfermagem', 'Auxiliar de Escritório', 'Auxiliar de Estatística', 'Auxiliar de Estoque', 'Auxiliar de Expedição',
                'Auxiliar de Farmácia', 'Auxiliar de Garçom', 'Auxiliar de Laboratório', 'Auxiliar de lavanderia', 'Auxiliar de Limpeza', 'Auxiliar de Manutenção',
                'Auxiliar de maquinista de trem', 'Auxiliar de Marceneiro', 'Auxiliar de Marketing', 'Auxiliar de Mecânico', 'Auxiliar de Montagem',
                'Auxiliar de pessoal', 'Auxiliar de Produção', 'Auxiliar de Radiologia', 'Auxiliar de Serviço Extrajudicial', 'Auxiliar de Serviços Gerais',
                'Auxiliar de Vendas', 'Auxiliar de Veterinário', 'Auxiliar Escolar', 'Auxiliar Financeiro', 'Auxiliar Operacional',
                'Auxiliar Técnico de Informática', 'Auxiliar Técnico de Refrigeração', 'Avaliador', 'Avicultor', 'Azulejista', 'Babá', 'Bailarino',
                'Balanceador', 'Balanceiro', 'Balconista', 'Bancário', 'Banqueiro', 'Barbeiro', 'Barman', 'Bedel', 'Bibliotecário', 'Biólogo', 'Biomédico',
                'BIOQUIMICO', 'Bioquímico', 'Bolsista', 'Bombeiro', 'BORDADEIRA', 'BORDADOR', 'Bordador', 'Borracheiro', 'Botânico', 'Botoeiro', 'Cabeleireiro',
                'Cabineiro', 'Cabista', 'Caixa', 'Caixeiro Viajante', 'CALCADISTA', 'Calceteiro', 'Caldeireiro', 'Camareiro', 'Camelô', 'Caminhoneiro', 'Cantor',
                'Capataz', 'Capitalista', 'CAPITALISTA DE ATIVOS FINANC.', 'Capitalista de Ativos Financeiros', 'Capitão', 'Capoteiro', 'Carcereiro',
                'Carpinteiro', 'CarregadorCarroceiro', 'Carteiro', 'Cartorário', 'Carvoeiro', 'Caseiro', 'Castrador', 'CASTRADOR', 'Catador de Material Reciclável',
                'Cavalariço', 'Ceramista', 'Chacreiro', 'Chapa', 'CHAPEADOR', 'Chapeador', 'Chapeiro', 'Chapista', 'Chaveiro', 'Chefe', 'Chefe de Estação',
                'Chefe de Seção', 'Chefe de Trem', 'Chefe Intermediário', 'Churrasqueiro', 'Cientista', 'Cientista Político', 'CINEASTA', 'Cinegrafista',
                'Circuleiro', 'Cirurgião', 'Cirurgião Dentista', 'Cisterneiro', 'Citotécnico', 'Classificador', 'CLASSIFICADOR', 'Clicheiro', 'Cobrador',
                'cocheiro', 'Colchoeiro', 'Coletor', 'Colocador de Carpetes', 'COLOCADOR DE CARPETES', 'Colunista Social', 'Comandante',
                'Comentarista de Rádio e Televisão', 'COMENTARISTA DE RADIO E TV', 'Comerciante', 'Comerciário', 'Comissário de Polícia', 'Compositor',
                'Comprador', 'Comunicador Visual', 'Comunicólogo', 'COMUNICOLOGO(A)', 'Confeiteiro', 'Conferente', 'Conferente de Carga e Descarga',
                'Conselheiro Tutelar', 'Construtor', 'Consultor', 'Consultor Administrativo', 'Consultor de Empresas', 'Consultor de Informação',
                'Consultor em Remuneração', 'Consultor Fiscal', 'CONSULTOR FISCAL', 'Consultor Jurídico', 'CONSULTOR TECNICO', 'Consultor Técnico',
                'Contabilista', 'Contador', 'Contínuo', 'Contra-regra', 'Contramestre', 'Controlador de Qualidade', 'Coordenador', 'Coordenador Administrativo',
                'Copeiro', 'Cordeiro', 'Coreógrafo', 'Coronel Bombeiro Militar', 'Corretor', 'Corretor de Imóveis', 'Corretor de Seguros',
                'Corretor de Títulos e Valores', 'Cortador', 'Costurador de Lona', 'Costureiro', 'Coveiro', 'Cozinheiro', 'Crediarista', 'Criador',
                'Cronoanalista', 'Dama de Companhia', 'Dançarino', 'Datilógrafo', 'DATILOGRAFO(A)', 'Datiloscopista', 'Decorador', 'Defensor Público',
                'Degustador', 'DEGUSTADOR', 'Delegado de Polícia', 'Demonstrador', 'Dentista', 'Deputado Estadual', 'Deputado Federal', 'DEPUTADO FEDERAL',
                'Desembargador', 'Desempregado', 'Desenhista', 'Desenhista Comercial', 'Desenhista Industrial', 'DESENHISTA TECNICO', 'Desenhista Técnico',
                'Designer', 'Despachante', 'Despachante Policial', 'Desportista Amador', 'Desportista Profissional', 'Detetive', 'Diarista', 'Digitador',
                'Diplomata', 'Diretor', 'Diretor Administrativo', 'Diretor de Cinema', 'Diretor de Empresas', 'Diretor de Escola', 'Diretor de Espetáculos',
                'Diretor de Espetáculos Públicos', 'Diretor de Estabelecimento de Ensino', 'Diretor de Logística', 'Diretor de Serviços',
                'DIRETOR(A) DE EMPRESAS', 'Discotecário', 'Do Comércio', 'DO LAR\DONA DE CASA', 'Doceiro', 'Domador', 'Economiário', 'Economista', 'Editor',
                'Educador', 'Eletricista', 'Eletricista de Automóveis', 'Eletricitário', 'Eletrônico de Manutenção', 'Eletrotécnico', 'Embaixador',
                'Embalador', 'Embalsamador', 'Empacotador', 'Empregado Doméstico', 'Empregado em Transportes e Cargas', 'Empregado Rural', 'EMPREGADO RURAL',
                'Empreiteiro', 'Empresário', 'Empresário Comercial', 'Empresário Industrial', 'Encadernador', 'ENCADERNADOR(A)', 'Encanador',
                'Encanador de Manutenção', 'Encanador Industrial', 'Encarregado', 'Encarregado Administrativo', 'ENCARREGADO DE COMPRAS',
                'Encarregado de Compras', 'ENCARREGADO DE DEPOSITO', 'Encarregado de Depósito', 'ENCARREGADO DE LABORATORIO', 'Encarregado de Laboratório',
                'Encarregado de Manutenção', 'Encarregado de Obras', 'Encarregado de Pintura', 'Encarregado de Produção', 'ENCARREGADO DE REFLORESTAMENTO',
                'Encarregado de Reflorestamento', 'Encarregado do Setor de Tráfego', 'Enfermeiro', 'Enfestador de roupas', 'ENFESTADOR(A)', 'Engenheiro',
                'Engenheiro Agrônomo', 'Engenheiro Civil', 'Engenheiro de Produção', 'Engenheiro Eletricista', 'Engenheiro Eletrônico', 'Engenheiro Florestal',
                'Engenheiro Mecânico', 'Engenheiro Metalúrgico', 'Engenheiro Químico', 'Engraxate', 'Enlonador', 'ENLONADOR', 'Entregador', 'Entregador de Gás',
                'Entregador de Jornal', 'Entregador de Pizza', 'Entrevistador', 'Ervateiro', 'Erveiro', 'Escrevente', 'Escrevente do Serviço Extrajudicial',
                'Escritor', 'Escriturário', 'Escrivão', 'Escrivão de Polícia', 'Escultor', 'ESCULTOR(A)', 'Espelhador', 'Estagiário', 'Estampador', 'Estatístico',
                'Estenógrafo', 'Esteticista', 'Estilista', 'Estivador', 'Estofador', 'Estopador', 'Estoquista', 'Estudante', 'Farmacêutico', 'Farmacologista',
                'Faturista', 'Faxineiro', 'Fazendeiro', 'Feirante', 'Ferramenteiro', 'Ferreiro', 'Ferroviário', 'Fiandeiro', 'Fiel', 'Figurinista', 'Fiscal',
                'Fiscal de Transportes Coletivos', 'Fiscal Rodoviário', 'Físico', 'Fisioterapeuta', 'Fitotecário (Cultiva Plantas)', 'Fitotecário (Informática)',
                'FITOTERAPICO', 'Florista', 'Foguista', 'Fonoaudiólogo', 'Forneiro', 'Fotógrafo', 'Frentista', 'Fresador', 'Freteiro', 'Fruticultor',
                'Funcionário Público Civil', 'Funcionário Público Civil Aposentado', 'Fundidor', 'Funileiro', 'Galvanizador', 'Garagista', 'Garçom', 'Gari',
                'Garimpeiro', 'Gasista', 'Geofísico', 'Geógrafo', 'Geólogo', 'Gerente', 'Gerente Administrativo', 'Gerente Comercial', 'Gerente de Empresa',
                'Gerente de Governança', 'Gerente de Logística', 'Gerente de Mercado', 'Gerente de Mercearia', 'GERENTE DE NEGOCIO', 'Gerente de Negócios',
                'Gerente de Produção', 'Gerente de Vendas', 'Gerente Financeiro', 'Gesseiro', 'GESTOR AMBIENTAL', 'Governador de Estado', 'Governanta',
                'Gráfico', 'Gravador', 'Guarda Florestal', 'Guarda Municipal', 'Guarda Urbano', 'Guarda Vigilante', 'Guardador de Carros', 'Guia Turístico',
                'Guincheiro', 'Historiador', 'Hoteleiro', 'Iluminador', 'Impressor', 'Industrial', 'Industriário', 'Inseminador', 'Inspetor',
                'Inspetor de Qualidade', 'Instalador', 'Instalador de Som', 'Instalador de telefones', 'Instrumentador Cirúrgico', 'Instrumentista',
                'Instrutor', 'Intérprete', 'Inválido', 'Investigador de Polícia', 'Investigador Particular', 'Jardineiro', 'Joalheiro', 'Jogador de Futebol',
                'Jóquei', 'Jornaleiro', 'Jornalista', 'Juiz de Direito', 'Jurista', 'Laboratorista', 'Lacrador de Embalagens', 'Lactarista', 'Ladrilheiro',
                'Laminador', 'Lancheiro', 'Lanterneiro', 'Lapidador', 'Lavadeiro', 'Lavador de Veículos', 'Lavrador', 'Leiloeiro', 'Leiteiro', 'Leiturista',
                'Lenhador', 'Lenheiro', 'Letrista', 'Limpador de vidros', 'Linotipista', 'Lixador', 'Lixeiro', 'Locutor', 'Lustrador', 'Maçariqueiro', 'Madeireiro',
                'Magarefe', 'Maître', 'Manequim', 'Manicure', 'Manobrista', 'Maquilador', 'Maquinista', 'Marceneiro', 'Marinheiro', 'Marítimo', 'Marmiteiro',
                'Marmorista', 'Massagista', 'Masseiro', 'Massoterapeuta', 'Matemático', 'Mecânico', 'Mecânico de Automóvel', 'Mecânico de Manutenção',
                'Mecânico de Precisão', 'Mecânico de Refrigeração', 'Mecânico Eletricista', 'MECANICO(A) ELETRECISTA', 'Mecanógrafo', 'Médico',
                'Médico Veterinário', 'Meio Oficial', 'Membro de Ordem Religiosa', 'Mensageiro', 'Merendeiro', 'Mergulhador', 'Mestre de Obras',
                'Mestre em Produção Industrial', 'Metalúrgico', 'Meteorologista', 'Metroviário', 'Micro-Empresário', 'Militar', 'Militar Reformado',
                'Mineiro', 'Minerador', 'Ministro de Culto Religioso', 'Ministro de Estado', 'Ministro de Tribunal Superior', 'Missionário', 'Modelista',
                'Modelo artístico', 'Modelo de Modas', 'Modista', 'Moldador', 'Monitor', 'Montador', 'Montador de Automóveis', 'Montador de Móveis de Madeira',
                'Mordomo', 'Motoboy', 'Motoqueiro', 'Motorista', 'Motorista de Ambulância', 'Motorista de ônibus urbano', 'Mototaxista', 'Museólogo', 'Músico',
                'Navegador', 'Nutricionista', 'Ocupante de Cargo Político', 'Office-Boy', 'Oficial das Forças Armadas', 'Oficial de Cartório',
                'Oficial de Justiça', 'Oficial Geral', 'Oleiro', 'Operador de Acabamento', 'OPERADOR DE AUDIO', 'Operador de áudio de continuidade (rádio)',
                'Operador de Bombas', 'Operador de Caixa', 'Operador de Caldeira', 'Operador de Câmeras de Cinema e TV', 'OPERADOR DE CAMERAS TV/CINEMA',
                'Operador de ceifadeira', 'Operador de cobrança bancária', 'Operador de Computador', 'Operador de Embalagem', 'Operador de Empilhadeira',
                'Operador de escavadeira', 'Operador de Máquinas', 'Operador de Marketing', 'Operador de Moto Serra', 'Operador de Produção',
                'Operador de Silkscreen', 'Operador de Telecomunicações', 'Operador de Telemarketing', 'Operador de torno automático',
                'Operador de Tráfego', 'Operador de triagem e transbordo', 'OPERADOR DE TRIAGEM/TRASBORDO', 'Operário', 'Ordenador', 'Ordenhador',
                'Orientador educacional', 'Ourives', 'Ouvidor do meio de comunicação', 'Overloquista', 'Padeiro', 'Padre', 'Paisagista', 'Panfleteiro',
                'Pantografista', 'Papeleiro', 'Parlamentar', 'Parteiro', 'Passadeira', 'Pasteleiro', 'Pastor', 'Peão Boiadeiro', 'Pecuarista', 'Pedagogo',
                'Pedicure', 'Pedreiro', 'Peixeiro', 'Peleteiro', 'Pensionista', 'Perfurador de Cartões', 'Perito', 'Perueiro', 'Pescador',
                'Pesquisador Datiloscópico', 'Piloto', 'Pintor', 'Pintor de Automóveis', 'Pintor de Paredes', 'Pipoqueiro', 'Pizzaiolo', 'Plaineiro',
                'Plaqueiro', 'Poceiro', 'Podólogo', 'Poeta', 'Policial Civil', 'Policial Federal', 'Policial Militar', 'POLICIAL MILITAR OUTRO ESTADO',
                'Policial Rodoviário', 'Policial rodoviário Federal', 'Polidor de Metais', 'Polidor de Pedras', 'Polidor de Veículos', 'Porteiro',
                'Praça da aeronáutica', 'Prático de Farmácia', 'Prefeito Municipal', 'Prendas do Lar', 'Prensista', 'Preparador de Máquinas',
                'Preparador do Fumo', 'Presidente da República', 'Procurador', 'Procurador de Justiça', 'Produtor de Espetáculos Públicos',
                'Produtor Musical', 'Produtor Rural', 'Professor', 'Profissional de Artefatos de Couro', 'Profissional de Letras/Artes',
                'Programador', 'PROGRAMADOR CONTROLE PROD', 'Programador de Controle de Produção', 'Projetista', 'Promotor de Eventos',
                'Promotor de Justiça', 'Promotor de Negócios', 'Promotor de Vendas', 'Propagandista', 'Proprietário', 'Prostituta', 'Protético',
                'Protético dentário', 'Psicanalista', 'Psicólogo', 'Publicitário', 'Pugilista', 'Químico', 'Químico industrial', 'Radialista',
                'Radiologista', 'Radiotécnico', 'Radiotelegrafista', 'Raspador', 'Recenseador', 'Recepcionista', 'Recreacionista', 'Redator',
                'Relações Públicas', 'Relojoeiro', 'Repórter', 'Repórter Cinematográfico', 'REPORTER FOTOGRAFICO', 'Repositor', 'Repóter fotográfico',
                'Representante Comercial', 'Restaurador', 'Retificador', 'Retificador de Fieiras', 'Retireiro', 'Revisor', 'Roteirista', 'Sacerdote',
                'Salgadeiro', 'Salineiro', 'Salva - Vidas', 'Sapateiro', 'Secretário', 'Secretário de Estado', 'Secretário Municipal', 'Securitário',
                'Segurança', 'Sem Profissão Definida', 'Senador da República', 'Separador de Sucata', 'Serigrafista', 'Seringueiro', 'Serrador',
                'Serralheiro', 'Servente', 'Servente de Pedreiro', 'Serventuário da Justiça', 'Servidor Público', 'Servidor Público Estadual',
                'Servidor Público Federal', 'Servidor Público Municipal', 'Siderúrgico', 'Síndico', 'Sitiante', 'Sociólogo', 'Soldado do Exército Brasileiro',
                'Soldador', 'Sonoplasta', 'Suinocultor', 'Superintendente', 'Supervisor', 'Supervisor de Produção', 'Supervisor de Segurança',
                'Supervisor de Vendas', 'SUPERVISOR(A) DE TELEMARKETING', 'Tabageiro', 'Tabelião', 'Tanoeiro', 'Tapeceiro', 'Taquígrafo', 'Tatuador',
                'Taxista', 'Tecelão', 'Técnico', 'TECNICO DE AGRIMENSURA', 'Técnico de Copiadora', 'Técnico de Futebol', 'Técnico de Saneamento',
                'Técnico de vendas', 'Técnico em Administração', 'Técnico em Agrimensura', 'Técnico em Agronomia', 'Técnico em Agropecuária',
                'Técnico em Aparelhos Eletrodomésticos', 'Técnico em Biologia', 'Técnico em Bioterismo', 'Técnico em Contabilidade',
                'Técnico em Desportos', 'Técnico em Edificações', 'Técnico em Eletricidade', 'Técnico em Eletrônica', 'Técnico em Enfermagem',
                'Técnico em Engenharia', 'TECNICO EM ENGENHARIA CIVIL', 'Técnico em Estatística', 'Técnico em Farmácia', 'Técnico em Geologia',
                'Técnico em Informática', 'Técnico em Laboratório', 'Técnico em Manutenção', 'Técnico em Mecânica', 'Técnico em Mecânica de Produção',
                'Técnico em Metalurgia', 'Técnico em Mineração', 'Técnico em Nutrição', 'Técnico em Piscicultura', 'Técnico em Plástico',
                'Técnico em Processamento de Dados', 'Técnico em Produção Industrial', 'Técnico em Química', 'Técnico em Radiologia', 'Técnico em Raios X',
                'Técnico em Refrigeração', 'Técnico em Segurança do Trabalho', 'Técnico em Telecomunicações', 'Técnico em Telefonia',
                'Técnico em Veterinária', 'Técnico Fiscal em Arrecadação', 'Técnico Fiscal em Tributação', 'Técnico Industrial', 'Técnico Têxtil',
                'TÉCNICO(A) OPTICO', 'Tecnólogo', 'Telefonista', 'Telegrafista', 'Teletipista', 'Terapeuta Ocupacional', 'Tesoureiro', 'Tintureiro',
                'Tipógrafo', 'Torneiro Ferramenteiro', 'Torneiro Mecânico', 'Trabalhador Agrícola', 'TRABALHADOR CONSTR CIVIL',
                'Trabalhador em Fábrica de Alimentos', 'Trabalhador em Fábrica de Calçados', 'Trabalhador em Fábrica de Papel',
                'Trabalhador em Fábrica Têxteis', 'TRABALHADOR FABR PAPEL', 'Trabalhador na Construção Civil', 'Trabalhador Rural', 'Tradutor',
                'Transportador', 'Trapezista', 'Tratador', 'Tratorista', 'Urbanista', 'Usineiro', 'Vacinador', 'Vaqueiro', 'Varredor de Ruas', 'Vendedor',
                'Verdureiro', 'Vereador', 'Veterinário', 'Viajante', 'Vice-Diretor', 'Vice-Prefeito', 'Vice-Presidente', 'Vidraceiro', 'Vigilante',
                'Vigilante Bancário', 'Vigilante noturno', 'Vimeiro', 'Zelador', 'Zoólogo', 'Zootecnista'
            ];
            $('.typeahead-job{{$cdid}}').typeahead({hint: true, highlight: true, minLength: 1}, {
                name: "job{{$cdid}}",
                displayKey: 'value',
                source: substringMatcher(job)
            });

            let nacionality = [
                'albanês', 'albanesa', 'alemão', 'alemã', 'austríaco', 'austríaca', 'belga', 'belga', 'búlgaro', 'búlgara', 'croata', 'croata',
                'cipriota', 'cipriota', 'dinamarquês', 'dinamarquesa', 'eslovaco', 'eslovaca', 'esloveno', 'eslovena', 'espanhol', 'espanhola',
                'francês', 'francesa', 'finlandês', 'finlandesa', 'grego', 'grega', 'húngaro', 'húngara', 'islandês', 'islandesa', 'irlandês', 'irlandesa',
                'italiano', 'italiana', 'kosovar', 'kosovar', 'lituano', 'lituana', 'luxemburguês', 'luxemburguesa', 'montenegrino', 'montenegrina',
                'holandês', 'holandesa', 'norueguês', 'norueguesa', 'polaco', 'polaca', 'português', 'portuguesa', 'inglês', 'inglesa', 'romenos', 'romena',
                'russo', 'russa', 'sueco', 'sueca', 'suíço', 'suíça', 'turco', 'turca', 'ucraniano', 'ucraniana', 'argentino', 'argentina', 'brasileiro', 'brasileira',
                'canadiano', 'canadiana', 'chileno', 'chilena', 'colombiano', 'colombiana', 'cubano', 'cubana', 'americano', 'americana', 'mexicano', 'mexicana',
                'venezuelano', 'venezuelana', 'afegão', 'afegã', 'chinês', 'chinesa', 'norte-coreano', 'norte-coreana', 'sul-coreano', 'sul-coreana',
                'indiano', 'indiana', 'indoneso', 'indonesa', 'iraniano', 'iraniana', 'iraquiano', 'iraquiana', 'israelita', 'israelita', 'japonês',
                'japonesa', 'jordano', 'jordana', 'libanês', 'libanesa', 'paquistanês', 'paquistanesa', 'sírio', 'síria', 'tailandês', 'tailandesa',
                'timorense', 'timorense', 'vietnamita', 'vietnamita', 'sul-africano', 'sul-africana', 'argelino', 'argelina', 'angolano', 'angolana',
                'cabo-verdiano', 'cabo-verdiana', 'guineense', 'guineense', 'queniano', 'queniana', 'líbio', 'líbia', 'marroquino', 'marroquina',
                'moçambicano', 'moçambicana', 'nigeriano', 'nigeriana', 'ruandês', 'ruandesa', 'santomense', 'santomense', 'senegalês', 'senegalesa',
                'somalí', 'somalí', 'sudanês', 'sudanesa', 'tunisino', 'tunisina', 'australiano', 'australiana', 'neozelandês', 'neozelandesa'
            ];
            $('.typeahead-nacionality{{$cdid}}').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {name: "nacionality{{$cdid}}", displayKey: 'value', source: substringMatcher(nacionality)});

            // VALIDATIONS RULES - INICIO //
            $("#name{{$cdid}}, #nacionality{{$cdid}}, #job{{$cdid}}, #cpf{{$cdid}}, #rg{{$cdid}}, #phone{{$cdid}}, #email{{$cdid}}, #vinculo{{$cdid}}").on('change keyup past', function () {
                if ($("#name{{$cdid}}").val() !== '' && $("#nacionality{{$cdid}}").val() !== ''
                    && $("#job{{$cdid}}").val() !== '' && $("#cpf{{$cdid}}").val() !== ''
                    && $("#phone{{$cdid}}").val() !== '' && $("#email{{$cdid}}").val() !== ''
                    && $("#vinculo{{$cdid}}").val() !== '') {
                    $(`#stepTestemunhaEndereco{{$cdid}}`).show();
                }
            });

            $("#addresscep{{$cdid}}, #addressstreet{{$cdid}}, #addressnumber{{$cdid}}, #addressdistrict{{$cdid}}, #addresscity{{$cdid}}, #addressstate{{$cdid}}").on('change keyup past', function () {
                if ($("#addresscep{{$cdid}}").val() !== '' && $("#addressstreet{{$cdid}}").val() !== ''
                    && $("#addressnumber{{$cdid}}").val() !== '' && $("#addressdistrict{{$cdid}}").val() !== ''
                    && $("#addresscity{{$cdid}}").val() !== '' && $("#addressstate{{$cdid}}").val() !== '') {
                    $(`#stepTestemunhaPagamento{{$cdid}}`).show();
                }
            });

            $('#comprovante_pagamento_{{$cdid}}').on('change keyup past', function () {
                if (document.getElementById("comprovante_pagamento_{{$cdid}}").files.length != 0) {
                    $(`#stepTestemunhaSubmit{{$cdid}}, #comprovante_pagamento_sucesso_{{$cdid}}`).show();
                    $('#formTestemunhaSubmit{{$cdid}}').removeAttr("disabled");
                    $(`#box_comprovante_pagamento_{{$cdid}}`).hide();
                }
            });
            // VALIDATIONS RULES - FIM //

            // Qual o tipo de assinatura Declaração? //
            $('input[name="checkDeclaracao_{{$cdid}}"]').click(function () {
                if ($(this).val() === "online") {
                    $(`#formDeclaracaoTestemunhaOnline{{$cdid}}, #stepTestemunhaCnh{{$cdid}}, #stepTestemunhaSubmit{{$cdid}}`).show();
                    $(`#declaracaoTestemunhaCartorio{{$cdid}},#anexarBtnDeclaracao{{$cdid}}`).hide();

                } else if ($(this).val() === "cartorio") {
                    $(`#anexarBtnDeclaracao{{$cdid}}`).removeAttr("disabled");
                    $(`#declaracaoTestemunhaCartorio{{$cdid}},#anexarBtnDeclaracao{{$cdid}}`).show();
                    $(`#formDeclaracaoTestemunhaOnline{{$cdid}}`).hide();
                }
            });

            // A Testemunha possui CNH? //
            $('input[name="radioCnh{{$cdid}}"]').click(function () {
                if ($(this).val() === "sim") {
                    $(`#stepTestemunhaDados{{$cdid}}`).show();
                    $(`#TestemunhaCnhDanger{{$cdid}}`).hide();
                } else if ($(this).val() === "nao") {
                    $(`#TestemunhaCnhDanger{{$cdid}}`).show();
                    $(`#stepTestemunhaDados{{$cdid}}`).hide();
                }
            });


        });
    </script>
@endpush