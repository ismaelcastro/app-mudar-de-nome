<style>
    #info { margin: 50px; }
    #radio-inline { margin-left: 15px; }
    #info label, select, input { font-size: 18px !important; }
    #info label { margin: 0 25px 0px 0; }
    #info input, select { margin-bottom: 25px; }
    #info table td { font-size: 18px}
</style>

<div id="contratar-emissao">
    <div id="radioContrata{{$cdid}}" class="col-12 col-form-label">
        <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">1</span>

        <div id="info">
            <h5>Deseja contratar a 2ª via da Certidão</h5>
            <p>A certidão utilizada no processo deve ser recente, com no máximo 90 dias de emissão através do carório de registro</p>

            <div id="radio-inline" class="radio-inline">
                <label class="radio radio-outline radio-success">
                    <input type="radio" name="checkContrataEmissao{{$cdid}}" value="sim"/>
                    <span></span>
                    <div class="option-label">Sim</div>
                </label>
                <label class="radio radio-outline radio-success">
                    <input type="radio" name="checkContrataEmissao{{$cdid}}" value="nao"/>
                    <span></span>
                    <div class="option-label">Não</div>
                </label>
            </div>
        </div>
    </div>

    <div id="radioCertidaAntiga{{$cdid}}" class="col-12 col-form-label" style="display: none">
        <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">2</span>

        <div id="info">
            <h5>Você possui a Certidão antiga?</h5>
            <p>Certidão com mais de 90 dias de emissão, pode ser inclusive a certidão emitida no momento do Registro.</p>

            <div id="radio-inline" class="radio-inline">
                <label class="radio radio-outline radio-success">
                    <input type="radio" name="radioCertidaoAntiga{{$cdid}}" value="sim"/>
                    <span></span>
                    <div class="option-label">Sim</div>
                </label>
                <label class="radio radio-outline radio-success">
                    <input type="radio" name="radioCertidaoAntiga{{$cdid}}" value="nao"/>
                    <span></span>
                    <div class="option-label">Não</div>
                </label>
            </div>
        </div>
    </div>

    <div id="guideCertidaAntiga{{$cdid}}" class="col-12 col-form-label" style="display:none;">
        <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">2</span>
        <div id="info">
            <h5>Identifique se a Certidão está correta</h5>
            <p>Verique se a Certidão está com o no máximo 90 dias de emissão, se está bem enquadrado e em bom estado de
                conservação</p>
        </div>

        <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">3</span>
        <div id="info">
            <h5>Anexe a Certidão Atualizada</h5>
            <p>Para evniar a Certidão basta acessar o arquivo digitalizado em seu dispositivo, ou tirar uma foto legivel
                utilizando o seu smartphone</p>
        </div>
    </div>

    <form id="formCertidao{{$cdid}}" action="{{ route('client.documentos.contratar.emissao') }}" enctype="multipart/form-data" method="POST" style="display: none">
        @csrf
        <input type="hidden" name="document_id" value="{{$cdid}}">
        <div id="stepCartorio{{$cdid}}" class="form-row mt-4" style="display: none">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">3</span>
            <div id="info">
                <h5>Qual o Cartório de Registro?</h5>
                <p>Favor informar a localização do Cartório.</p>

                <div class="col-12 col-sm-12">
                    <label for="estados{{$cdid}}">Estado</label>
                    <select id="estados{{$cdid}}" name="client[estado]" class="form-control" required>
                        <option value="" selected="selected">Selecione um estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
                <div class="col-12 col-sm-12 mt-4 mt-sm-0">
                    <label for="cidades{{$cdid}}">Cidade</label>
                    <select id="cidades{{$cdid}}" name="client[cidade]" class="form-control" required disabled>
                        <option value="" selected="selected">Selecione uma cidade</option>
                    </select>
                </div>
                <div class="col-12 col-sm-12 mt-4 mt-sm-0">
                    <label for="cartorios{{$cdid}}">Cartório</label>
                    <select id="cartorios{{$cdid}}" name="client[cartorio]" class="form-control" required disabled>
                        <option value="" selected="selected">Selecione um cartório</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="stepIdentificacao{{$cdid}}" class="form-row mt-4" style="display: none" style="display:none">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">4</span>
            <div id="info">
                <h5>Identificação do Resgistrado</h5>
                <p>Informe os dados para localização da Certidão junto ao cartório de Registros.<br>
                    <span class="text-danger">*</span>Campos em <span class="text-danger">vermelho</span> são obrigatório </p>
                <div class="col-12 col-sm-6">
                    <label class="text-danger" for="nome_{{$cdid}}">Nome Completo*</label>
                    <input id="nome_{{$cdid}}" name="client[nome]" class="form-control" type="text" placeholder="Este campo é obrigatório" required/>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="cpf_{{$cdid}}">CPF</label>
                    <input id="cpf_{{$cdid}}" name="client[cpf]" class="form-control" type="text" minlength="14"/>
                </div>
                <div class="col-12 col-sm-6">
                    <label class="text-danger" for="data_nasc_{{$cdid}}">Data de Nascimento*</label>
                    <input id="data_nasc_{{$cdid}}" name="client[data_nasc]" class="form-control" type="text" placeholder="Este campo é obrigatório" required/>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="filiacao1_{{$cdid}}">Filiação 1</label>
                    <input id="filiacao1_{{$cdid}}" name="client[filiacao1]" class="form-control" type="text"/>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="filiacao2_{{$cdid}}">Filiação 2</label>
                    <input id="filiacao2_{{$cdid}}" name="client[filiacao2]" class="form-control" type="text"/>
                </div>
            </div>

        </div>
        <div id="stepIdentificacaoCasamento{{$cdid}}" class="form-row mt-4" style="display: none">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">4</span>
            <div id="info">
                <h5>Identificação dos Cônjuges</h5>
                <p>Informe os dados para localização da Certidão junto ao cartório de Registros.<br>
                    <span class="text-danger">*</span>Campos em <span class="text-danger">vermelho</span> são obrigatório </p>
                <div class="col-12 col-sm-6">
                    <label class="text-danger" for="conjuge_1_{{$cdid}}">Nome do primeiro cônjuge*</label>
                    <input id="conjuge_1_{{$cdid}}" name="client[conjuge_1]" class="form-control" type="text" placeholder="Este campo é obrigatório" required/>
                </div>
                <div class="col-12 col-sm-6">
                    <label class="text-danger" for="conjuge_2_{{$cdid}}">Nome do segundo cônjuge*</label>
                    <input id="conjuge_2_{{$cdid}}" name="client[conjuge_2]" class="form-control" type="text" placeholder="Este campo é obrigatório" required/>
                </div>
                <div class="col-12 col-sm-6">
                    <label class="text-danger" for="data_casamento_{{$cdid}}">Data do Casamento*</label>
                    <input id="data_casamento_{{$cdid}}" name="client[data_casamento]" class="form-control" type="text" placeholder="Este campo é obrigatório" required/>
                </div>
            </div>

        </div>
        <div id="stepResumo{{$cdid}}" class="form-row mt-4" style="display: none">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">5</span>
            <div id="info">
                <h5>Resumo do Pedido</h5>
                <p>Confira se os dados informados estão corretos e leia atentament aos termos de uso antes de finalizar a contratação</p>

                <div class="row">
                    <div class="col-12 col-sm-6">
                        <table class="table table-borderless">
                            <tbody>
                            <tr id="trNome_{{$cdid}}">
                                <td><strong>Nome</strong></td>
                                <td id="tdNome_{{$cdid}}" colspan="4"> - </td>
                            </tr>
                            <tr id="trCpf_{{$cdid}}">
                                <td><strong>CPF</strong></td>
                                <td id="tdCpf_{{$cdid}}" colspan="4"> - </td>
                            </tr>
                            <tr id="trConjuge1_{{$cdid}}">
                                <td><strong>1º Conjuge</strong></td>
                                <td id="tdConjuge1_{{$cdid}}" colspan="4"> - </td>
                            </tr>
                            <tr id="trConjuge2_{{$cdid}}">
                                <td><strong>1º Conjuge</strong></td>
                                <td id="tdConjuge2_{{$cdid}}" colspan="4"> - </td>
                            </tr>
                            <tr id="trData_{{$cdid}}">
                                <td><strong>Nascimento</strong></td>
                                <td id="tdData_{{$cdid}}" colspan="4"> - </td>
                            </tr>
                            <tr id="trFiliacoes_{{$cdid}}">
                                <td><strong>Filiação</strong></td>
                                <td id="tdFiliacao1_{{$cdid}}"> - </td>
                                <td id="tdFiliacao2_{{$cdid}}" colspan="3"> - </td>
                            </tr>
                            <tr>
                                <td><strong>Cartório</strong></td>
                                <td id="tdCartorio_{{$cdid}}"> - </td>
                                <td id="tdCidade_{{$cdid}}" colspan="2"> - </td>
                                <td id="tdEstado_{{$cdid}}" colspan="1"> - </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-row mt-4">
                        <input id="termos_{{$cdid}}" name="client[termos]" class="form-control" type="checkbox" required/>
                        <label for="termos_{{$cdid}}" style="font-size:18px;">* Declaro que li e aceito os termos de uso
                            <a target="_blank" href="{{ URL::to('/')}}/documents/termo_de_uso.pdf" download>
                                <strong style="color:#DABE67;">termos de uso</strong>
                            </a>
                        </label>
                    </div>
            </div>
            </div>
        </div>
        <div id="stepCertidaoAntiga{{$cdid}}" class="form-row mt-4" style="display: none">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">3</span>
            <div id="info">
                <h5>Anexe a Certidão Antiga</h5>
                <p>Para enviar a Certidão basta acessar o arquivo digitalizado em seu dispositivo, ou tirar uma foto legível utilizando seu smartphone.</p>

                <div class="col-12">
                    <div id="box_comprovante_certidao_{{$cdid}}" class="box_field_upload">
                        <input type="file" id="certidao_antiga_{{$cdid}}" name="anexos[certidao_antiga]" required>
                        <p><i class="fa fa-upload"></i><br/>
                            Clique ou arraste o arquivo aqui para fazer o upload do certidão antiga
                        </p>
                    </div>
                    <div id="comprovante_certidao_sucesso_{{$cdid}}" style="display:none;">
                        <div class="alert_success">
                            Certidão anexada com sucesso
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="stepPagamento{{$cdid}}" class="form-row mt-4" style="display: none">
            <span class="badge badge-secondary" style="background-color: #DABE67; border-radius: 0; font-size: 18px!important; float: left">7</span>
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
                            <input type="text" id="mail_pix" value="financeiro@ratsbonemagri.com.br">
                            <a class="btn btn-default btn_cpoy" href="javascript:void(0);" onclick="copy_field('mail_pix');"> <i class="fa fa-copy"></i></a>
                        </p>
                        <p class="fs-14"><strong>Valor da Certidão: &nbsp;&nbsp;</strong>R$
                            <input id="valorPagamento{{$cdid}}" name="client[valorPagamento]" disabled value="150,00" style="border: none;">
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
        <div id="stepSubmit{{$cdid}}" class="button-row text-center" style="display: none">
            <button id="formSubmit{{$cdid}}" class="btn btn-default mb-10" type="submit" title="Enviar" disabled>Enviar</button>
        </div>
    </form>

</div>
@push('scriptjs2')
    <script>
        function copy_field(t) {
            window.document.getElementById(t).select(), document.execCommand("copy"), toastr.success("Sucesso!", "Copiado para à área de transferência com sucesso")
        }

        // MASK INPUTS //
        $("#data_nasc_{{$cdid}}, #data_casamento_{{$cdid}}").mask("99/99/9999");
        $("#cpf_{{$cdid}}").mask("999.999.999-99");
        // MASK INPUTS //

        $(document).ready(function () {
            $(`#uploadDoc{{$item->cdid}}Modal`).on('hidden.bs.modal', function () {
                location.reload();
            });

            // VALIDATION  FIELDS STEPS //
            if({{$type === 'despachante'}}) {
                $('#formSubmit{{$cdid}}').removeAttr("disabled");
            }

            $('#cidades{{$cdid}}').on('change', function () {
                if ($(this).val() !== '') {
                    if ({{$cdid}} === 17) {
                        $(`#stepIdentificacaoCasamento{{$cdid}}`).show();
                    } else {
                        $(`#stepIdentificacao{{$cdid}}`).show();
                    }
                }
            });

            $("#nome_{{$cdid}}, #data_nasc_{{$cdid}}, #cpf_{{$cdid}}, #filiacao1_{{$cdid}}, #filiacao2_{{$cdid}}").on('change keyup past', function () {
                preencheResumo({{$cdid}});
                if ($("#nome_{{$cdid}}").val() !== '' && $("#data_nasc_{{$cdid}}").val() !== '' && $("#data_nasc_{{$cdid}}").val().length >= 10) {   
                    $(`#stepResumo{{$cdid}}`).show();
                } 
            });

            $("#conjuge_1_{{$cdid}}, #conjuge_1_{{$cdid}}, #data_casamento_{{$cdid}}").on('change keyup past', function () {
                preencheResumo({{$cdid}});
                if ($("#conjuge_1_{{$cdid}}").val() !== '' && $("#conjuge_2_{{$cdid}}").val() !== '' && $("#data_casamento_{{$cdid}}").val().length >= 10) {
                    $(`#stepResumo{{$cdid}}`).show();
                }
            });

            $('#termos_{{$cdid}}').on('change keyup past', function () {
                preencheResumo({{$cdid}});
                if ($(this).val() !== '') {
                    $(`#stepPagamento{{$cdid}}`).show();
                }
            });

            $('#certidao_antiga_{{$cdid}}').on('change keyup past', function () {
                if (document.getElementById("certidao_antiga_{{$cdid}}").files.length != 0) {
                    $(`#stepPagamento{{$cdid}}`).show();
                    $(`#box_comprovante_certidao_{{$cdid}}`).hide();
                    $(`#comprovante_certidao_sucesso_{{$cdid}}`).show();
                }
            });

            $('#comprovante_pagamento_{{$cdid}}').on('change blur', function () {
                if (document.getElementById("comprovante_pagamento_{{$cdid}}").files.length != 0) {
                    $('#formSubmit{{$cdid}}').removeAttr("disabled");
                    $(`#box_comprovante_pagamento_{{$cdid}}`).hide();
                    $(`#comprovante_pagamento_sucesso_{{$cdid}}`).show();
                }
            });
            // VALIDATION  FIELDS STEPS //

            // RADIO CONTRATAR EMISSÃO //
            $('input[name="checkContrataEmissao{{$cdid}}"]').click(function () {
                if ($(this).val() === "sim") {
                    $(`#guideCertidaAntiga{{$cdid}}, #anexarArquivo{{$cdid}}`).hide();
                    $(`#radioCertidaAntiga{{$cdid}}`).show();
                } else if ($(this).val() === "nao") {
                    $('#cidades, #estados, #cartorios, #nome, #data_nasc,#termos, #data_casa, #conjuge_1, #conjuge_2').removeAttr('required');
                    $(`#formCertidao{{$cdid}}`).hide();
                    $(`#radioCertidaAntiga{{$cdid}}`).hide();

                    $(`#guideCertidaAntiga{{$cdid}}, #anexarArquivo{{$cdid}}`).show();
                    $(".anexarArquivoBtn{{$cdid}}").removeAttr("disabled");
                }
            });
            // FIM - RADIO CONTRATAR EMISSÃO //

            $('input[name="radioCertidaoAntiga{{$cdid}}"]').change(function () {
                $('#certidao_antiga_{{$cdid}}, #comprovante_pagamento_{{$cdid}}').val("");
                $('#comprovante_pagamento_sucesso_{{$cdid}}, #comprovante_certidao_sucesso_{{$cdid}}, #stepPagamento{{$cdid}}').hide();
                $(`#box_comprovante_certidao_{{$cdid}}, #box_comprovante_pagamento_{{$cdid}}`).show();
            });

            // RADIO POSSUI CERTIDAO ANTIGA //
            $('input[name="radioCertidaoAntiga{{$cdid}}"]').click(function () {
                if ($(this).val() === "sim") {
                    $("#stepPagamento{{$cdid}} span").text("4");

                    $("#cidades{{$cdid}}, #estados{{$cdid}}, #cartorios{{$cdid}}, #nome_{{$cdid}}, #data_nasc_{{$cdid}},#termos_{{$cdid}}, #data_casamento_{{$cdid}}, #conjuge_1_{{$cdid}}, #conjuge_2_{{$cdid}}").removeAttr('required');

                    $(`#stepCartorio{{$cdid}}, #stepIdentificacao{{$cdid}}, #stepIdentificacaoCasamento{{$cdid}}, #stepResumo{{$cdid}}, #stepPagamento{{$cdid}}`).hide();
                    $(`#formCertidao{{$cdid}}, #stepCertidaoAntiga{{$cdid}}, #stepSubmit{{$cdid}}`).show();

                } else if ($(this).val() === "nao") {
                    $(`#stepCertidaoAntiga{{$cdid}}, stepPagamento{{$cdid}}`).hide();
                    $("#certidao_antiga_{{$cdid}}").removeAttr('required');
                    $("#stepPagamento{{$cdid}} span").text("6");

                    if ({{$cdid}} === 17) {
                        $("#nome_{{$cdid}}, #data_nasc_{{$cdid}}").removeAttr("required");
                        $("#conjuge_1_{{$cdid}}, #conjuge_2_{{$cdid}}, #data_casamento_{{$cdid}}").prop("required", true);
                    } else {
                        $("#conjuge_1_{{$cdid}}, #conjuge_2_{{$cdid}}, #data_casamento_{{$cdid}}").removeAttr("required");
                        $("#cidades, #estados, #cartorios, #nome_{{$cdid}}, #data_nasc_{{$cdid}}, #termos_{{$cdid}}").prop("required", true);
                    }
                    $(`#formCertidao{{$cdid}}, #stepCartorio{{$cdid}}, #stepSubmit{{$cdid}}`).show();
                }
            });
            // FIM - RADIO POSSUI CERTIDAO ANTIGA //

            {{-- SERVICE API RESGISTRO CIVIL --}}
            $(`#estados{{$cdid}}`).on('change', function () {
                let estadoSelecionado = $(this).val();
                estadoSelecionado === "SP" ? $('#valorPagamento{{$cdid}}').val('120,00') : $('#valorPagamento{{$cdid}}').val('150,00');

                $('#tdEstado').html(estadoSelecionado)
                $(`#cidades{{$cdid}}`).empty();
                preencheResumo({{$cdid}});
                pegarCidades(estadoSelecionado);
            });
            $(`#cidades{{$cdid}}`).on('change', function () {
                let cidadeSelecionada = $(this).val();
                let cidade_id = cidadeSelecionada.split("_");

                $('#tdCidade').html($(`#cidades{{$cdid}} option:selected`).text());
                $(`#cartorios{{$cdid}}`).empty();

                preencheResumo({{$cdid}});
                pegarCartorios(parseInt(cidade_id[0]));
            });
            {{-- SERVICE API RESGISTRO CIVIL --}}

            function pegarCidades(estado) {
                $.ajax({
                    url: `https://api-rc.registrocivil.org.br/api/cartorios/uf/${estado}/cidade`,
                    dataType: 'JSON',
                    type: 'GET',
                    success: function (response) {
                        $(`#cidades{{$cdid}}`).removeAttr("disabled");

                        $.each(response.cidades, function (i, item) {
                            $(`#cidades{{$cdid}}`).append($('<option>', {
                                value: `${item.cidade_id}_${item.nome}`,
                                text: item.nome
                            }))
                        })
                    }
                });
            }

            function pegarCartorios(cidade) {
                $.ajax({
                    url: `https://api-rc.registrocivil.org.br/api/cartorios/cidade/${cidade}/cartorio`,
                    dataType: 'JSON',
                    type: 'GET',
                    success: function (response) {
                        $(`#cartorios{{$cdid}}`).removeAttr("disabled");

                        $.each(response.cartorios, function (i, item) {
                            $(`#cartorios{{$cdid}}`).append($('<option>', {
                                value: item.nome,
                                text: item.nome
                            }))
                        })
                    }
                });
            }

            function preencheResumo(cdid) {
                if(cdid == 17) {
                    $(`#trNome_{{$cdid}},#trCpf_{{$cdid}},#trFiliacoes_{{$cdid}}`).hide();
                    $(`#trConjuge1_{{$cdid}}, #trConjuge2_{{$cdid}}`).show();

                    $('#tdConjuge1_{{$cdid}}').html($(`#conjuge_1_{{$cdid}}`).val());
                    $('#tdConjuge2_{{$cdid}}').html($(`#conjuge_2_{{$cdid}}`).val());
                    $('#tdData_{{$cdid}}').html($(`#data_casamento_{{$cdid}}`).val());
                } else {
                    $(`#trConjuge1_{{$cdid}}, #trConjuge2_{{$cdid}}`).hide();
                    $(`#trNome_{{$cdid}},#trCpf_{{$cdid}},#trFiliacoes_{{$cdid}}`).show();

                    $('#tdNome_{{$cdid}}').html($(`#nome_{{$cdid}}`).val());
                    $('#tdCpf_{{$cdid}}').html($(`#cpf_{{$cdid}}`).val());
                    $('#tdData_{{$cdid}}').html($(`#data_nasc_{{$cdid}}`).val());
                    $('#tdFiliacao1_{{$cdid}}').html($(`#filiacao1_{{$cdid}}`).val());
                    $('#tdFiliacao2_{{$cdid}}').html($(`#filiacao2_{{$cdid}}`).val());
                }
                $(`#tdEstado_{{$cdid}}`).html($(`#estados{{$cdid}} option:selected`).text());
                $(`#tdCidade_{{$cdid}}`).html($(`#cidades{{$cdid}} option:selected`).text());
                $('#tdCartorio_{{$cdid}}').html($(`#cartorios{{$cdid}} option:selected`).text());
            }
        });
    </script>
@endpush