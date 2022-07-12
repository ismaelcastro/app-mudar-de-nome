
<consulting-notes-tasks class="ng-isolate-scope">
    <div>
                
        @include('admin.partials._next_activities')

        
        <div class="px-2 pb-4">
            <button type="button" class="ga-button @if ($call->status=='novo' || $call->status=='encerrado') bg-success @endif ga--is-large d-block text-center" style="width: 100%"
                @if ($call->status=='novo' || $call->status=='encerrado') onclick="document.getElementById('status_dinamic').value='tentativa';document.getElementById('form-status-change').submit();" @endif>
                <span class="au-consulting-notes-write__send text-white">Abrir Atendimento</span> 
            </button>
        </div>
        

        {{ Form::model($call, ['route' => ['admin.calls.proposal_store',$call->id], 'method' => 'POST' ]) }}
        {{ Form::hidden('stage_call', 'dados') }}
        <div class="box-sidebar action-hover">
            <h6>
                <svg width="28px" height="28px" viewBox="0 0 32 32">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <path d="M19.7916667,2 L5.20833333,2 C3.435,2 2,3.45363636 2,5.25 L2,24.75 C2,26.5463636 3.435,28 5.20833333,28 L20.5,28 C18.5,26.3333333 18.3333333,24.3333333 20,22 C19.4501502,21.4106857 19.1168169,20.9106857 19,20.5 C18.2592283,17.895716 20,14.5 23,14 L23,5.25 C23,3.45363636 21.565,2 19.7916667,2 Z" fill="#D5AC29" fill-rule="nonzero"></path><g transform="translate(5.000000, 8.000000)" fill="#FFFFFF" fill-rule="nonzero"><path d="M11,11 L1,11 C0.447,11 0,10.552 0,10 C0,9.448 0.447,9 1,9 L11,9 C11.553,9 12,9.448 12,10 C12,10.552 11.553,11 11,11 Z"></path><path d="M11,7 L1,7 C0.447,7 0,6.552 0,6 C0,5.448 0.447,5 1,5 L11,5 C11.553,5 12,5.448 12,6 C12,6.552 11.553,7 11,7 Z"></path><path d="M6.85714286,2 L1.14285714,2 C0.510857143,2 0,1.552 0,1 C0,0.448 0.510857143,0 1.14285714,0 L6.85714286,0 C7.48914286,0 8,0.448 8,1 C8,1.552 7.48914286,2 6.85714286,2 Z"></path></g><path d="M25.5,20.8895495 C24.3246401,20.8895495 23.3684834,20.1715518 23.3684834,19.2891798 C23.3684834,18.4066846 24.3247585,17.6885637 25.5,17.6885637 C26.6753599,17.6885637 27.6315166,18.4066846 27.6315166,19.2891798 C27.6315166,19.8627647 28.1617016,20.3275472 28.8157583,20.3275472 C29.469815,20.3275472 30,19.8627647 30,19.2891798 C30,17.5962726 28.5926472,16.16804 26.6842417,15.7419484 L26.6842417,15.0384906 C26.6842417,14.4649057 26.1540567,14 25.5,14 C24.8459433,14 24.3157583,14.4649057 24.3157583,15.0384906 L24.3157583,15.7419484 C22.4072344,16.16804 21,17.5963958 21,19.2891798 C21,21.3167501 23.0187768,22.9664074 25.5,22.9664074 C26.6753599,22.9664074 27.6315166,23.6844051 27.6315166,24.5669003 C27.6315166,25.4493955 26.6753599,26.1673931 25.5,26.1673931 C24.3246401,26.1673931 23.3684834,25.4492722 23.3684834,24.5669003 C23.3684834,23.9933154 22.8382984,23.5284097 22.1842417,23.5284097 C21.530185,23.5284097 21,23.9933154 21,24.5669003 C21,26.2598075 22.4073528,27.68804 24.3157583,28.1140085 L24.3157583,28.9615094 C24.3157583,29.5350943 24.8459433,30 25.5,30 C26.1540567,30 26.6842417,29.5350943 26.6842417,28.9615094 L26.6842417,28.1140085 C28.5927656,27.68804 30,26.2598075 30,24.5669003 C30,22.53933 27.9812232,20.8895495 25.5,20.8895495" fill="#D5AC29"></path></g>
                </svg>
                <strong>Proposta de Honorários</strong> 
            </h6>


            <div class="row pb-2">
                <div class="col-sm-12 d-flex">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50">
                        ESTRELAS:
                    </div>
                    <div class="task-list-table f-left">                
                        <div class="stars stars-example-css">
                            <select class="rating-star" id="crm-rating-star" name="rating" autocomplete="off">
                                <option value=""></option>
                                <option value="1" @if ($call->stars == 1) selected="selected" @endif>1</option>
                                <option value="2" @if ($call->stars == 2) selected="selected" @endif>2</option>
                                <option value="3" @if ($call->stars == 3) selected="selected" @endif>3</option>
                                <option value="4" @if ($call->stars == 4) selected="selected" @endif>4</option>
                                <option value="5" @if ($call->stars == 5) selected="selected" @endif>5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-2" id="motivo_star">

            </div>

            @if($call->occupation_area == 'retificacao')
            <div class="row pb-2 box_esconde" id="box_object_of_action">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                        OBJETO DA AÇÃO
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{Form::select('object_of_action', [''=>'Selecione','Retificação de Registro Civil'=>'Retificação de Registro Civil','Destituição Paterna'=>'Destituição Paterna','Destituição Paterna com Adoção' => 'Destituição Paterna com Adoção'],null,['class' => $errors->has('object_of_action') ?  'form-control is-invalid' : 'form-control' ])}}
                    </div>
                </div>
            </div>

            <div class="row pb-2" id="box_is_claimant">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 required verify-required text-uppercase">
                        Contratante é o Autor?
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{Form::select('is_claimant', [''=>'Selecione','1'=>'Sim','0'=>'Não'],null,['class' => $errors->has('is_claimant') ?  'form-control is-invalid' : 'form-control', 'onchange' => "openrelationship(this.value)" ])}}
                    </div>
                </div>
            </div>

            <div class="row pb-2 box_esconde" id="box_relationship_claimant">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required required text-uppercase">
                        Qual a relação com o Autor?
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{Form::select('relationship_claimant', [''=>'Selecione']+$relationship_list,null,['class' => $errors->has('relationship_claimant') ?  'form-control is-invalid' : 'form-control'])}}
                    </div>
                </div>
            </div>

            <div class="row pb-2 " id="box_descendants_quantity">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required required text-uppercase">
                        Qtd. de filhos do autor?
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{Form::select('descendants_quantity', [''=>'Nenhum']+number_array(10),$call->descendants_quantity,['class' => $errors->has('descendants_quantity') ?  'form-control is-invalid' : 'form-control' ])}}
                    </div>
                </div>
            </div>
            @endif

            @if($call->occupation_area == 'divorcio')
                <div class="row pb-2 box_esconde" id="box_object_of_action">
                    <div class="col-sm-12 d-flex ">
                        <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                            OBJETO DA AÇÃO
                        </div>
                        <div class="task-list-table f-left w-50">
                            {{Form::select('object_of_action', [''=>'Selecione','litigioso'=>'Divórcio Litigioso','consensual'=>'Divórcio Consensual'],null,['class' => $errors->has('object_of_action') ?  'form-control is-invalid' : 'form-control' ])}}
                        </div>
                    </div>
                </div>
                <div class="row pb-2 box_esconde" id="box_assets">
                    <div class="col-sm-12 d-flex ">
                        <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                            BENS
                        </div>
                        <div class="task-list-table f-left w-50">
                            {{Form::select('assets', [''=>'Selecione','com_partilha'=>'com Partilha','sem_partilha'=>'sem Partilha'],null,['class' => $errors->has('assets') ?  'form-control is-invalid' : 'form-control' ])}}
                        </div>
                    </div>
                </div>
                <div class="row pb-2 box_esconde" id="box_descendants_quantity">
                    <div class="col-sm-12 d-flex ">
                        <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                            QUANTIDADE DE FILHOS
                        </div>
                        <div class="task-list-table f-left w-50">
                            {{Form::select('descendants_quantity', [''=>'Selecione']+number_array(10),$call->descendants_quantity,['class' => $errors->has('descendants_quantity') ?  'form-control is-invalid' : 'form-control' ])}}
                        </div>
                    </div>
                </div>
                <div class="row pb-2 box_esconde" id="box_custodian">
                    <div class="col-sm-12 d-flex ">
                        <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                            GUARDA
                        </div>
                        <div class="task-list-table f-left w-50">
                            {{Form::select('custodian', [''=>'Selecione','mae'=>'Mãe','pai'=>'Pai','processo'=>'Processo','outros'=>'Outros'],null,['class' => $errors->has('custodian') ?  'form-control is-invalid' : 'form-control' ])}}
                        </div>
                    </div>
                </div>
                <div class="row pb-2 box_esconde" id="box_fixed_food">
                    <div class="col-sm-12 d-flex ">
                        <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                            ALIMENTOS FIXOS
                        </div>
                        <div class="task-list-table f-left w-50">
                            {{ Form::text('fixed_food', null, ['class' => $errors->has('fixed_food') ?  'form-control is-invalid money' : 'form-control money', 'autocomplete' => 'off']) }}
                        </div>
                    </div>
                </div>
                <div class="row pb-2 box_esconde" id="box_percentage_food">
                    <div class="col-sm-12 d-flex ">
                        <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                            ALIMENTOS PERCENTUAL
                        </div>
                        <div class="task-list-table f-left w-50">
                            {{Form::select('percentage_food', [''=>'Selecione','10%'=>'10%','15%'=>'15%','20%'=>'20%','25%'=>'25%','30%'=>'30%'],null,['class' => $errors->has('percentage_food') ?  'form-control is-invalid' : 'form-control' ])}}
                        </div>
                    </div>
                </div>
                <div class="row pb-2 box_esconde" id="box_unemployed_food">
                    <div class="col-sm-12 d-flex ">
                        <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                            ALIMENTOS DESEMPREGADO
                        </div>
                        <div class="task-list-table f-left w-50">
                            {{Form::select('unemployed_food', [''=>'Selecione','20%'=>'20%','25%'=>'25%','30%'=>'30%','50%'=>'50%','100%'=>'100%','Outros'=>'Outros'],null,['class' => $errors->has('unemployed_food') ?  'form-control is-invalid' : 'form-control' ])}}
                        </div>
                    </div>
                </div>
                <div class="row pb-2 box_esconde" id="box_ex_spouse_pension">
                    <div class="col-sm-12 d-flex ">
                        <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                            PENSÃO EX-CÔNJUGE
                        </div>
                        <div class="task-list-table f-left w-50">
                            {{Form::select('ex_spouse_pension', [''=>'Selecione','nao'=>'Não','20%'=>'20%','25%'=>'25%','30%'=>'30%','50%'=>'50%','100%'=>'100%','Outros'=>'Outros'],null,['class' => $errors->has('ex_spouse_pension') ?  'form-control is-invalid' : 'form-control' ])}}
                        </div>
                    </div>
                </div>
                <div class="row pb-2 box_esconde" id="box_value_of_goods">
                    <div class="col-sm-12 d-flex ">
                        <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                            VALOR DOS BENS
                        </div>
                        <div class="task-list-table f-left w-50">
                            {{Form::select('value_of_goods', [''=>'Selecione','20%'=>'20%','25%'=>'25%','30%'=>'30%','50%'=>'50%','100%'=>'100%','Outros'=>'Outros'],null,['class' => $errors->has('value_of_goods') ?  'form-control is-invalid' : 'form-control' ])}}
                        </div>
                    </div>
                </div>
                <div class="row pb-2 box_esconde" id="box_court_costs">
                    <div class="col-sm-12 d-flex ">
                        <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                            CUSTAS JUDICIAIS
                        </div>
                        <div class="task-list-table f-left w-50">
                            {{Form::select('court_costs', [''=>'Selecione','convencional'=>'Convencional','justica_gratuita'=>'Justiça Gratuita'],null,['class' => $errors->has('court_costs') ?  'form-control is-invalid' : 'form-control' ])}}
                        </div>
                    </div>
                </div>
            @endif

            @if($call->occupation_area == 'retificacao')
            <div class="row pb-2 box_esconde" id="box_honorary_corrections_quantity">                
                <div class="col-sm-12 d-flex">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                        QUANTIDADE DE RETIFICAÇÕES
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{Form::select('corrections_quantity', $qtd_installment,null,['class' => $errors->has('corrections_quantity') ?  'form-control is-invalid' : 'form-control'])}}
                    </div>
                </div>                
            </div>
            @endif

            <div class="row pb-2 box_esconde" id="box_honorary_gender">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                        GÊNERO
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{Form::select('gender', $gender_list,null,['class' => $errors->has('gender') ?  'form-control is-invalid' : 'form-control' ])}}
                    </div>
                </div>
            </div>
            <div class="row pb-2 box_esconde" id="box_honorary_date_birth">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                        DATA DE NASCIMENTO
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{ Form::date('date_birth', null,['class' => $errors->has('date_birth') ?  'form-control is-invalid' : 'form-control'])}}
                    </div>
                </div>
            </div>
            <div class="row pb-2 box_esconde" id="box_honorary_job">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 verify-required">
                        PROFISSÃO
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{ Form::text('job', null, ['class' => $errors->has('job') ?  'typeahead-job form-control is-invalid' : 'typeahead-job form-control', 'autocomplete' => 'off']) }}
                    </div>
                </div>
            </div>
            <div class="row pb-2 box_esconde" id="box_honorary_amount_honorary">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 text-uppercase verify-required">
                        Honorários Advocatícios
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{ Form::text('amount_honorary', null, ['class' => $errors->has('amount_honorary') ?  'form-control is-invalid money' : 'form-control money']) }}
                    </div>
                </div>
            </div>
            <div class="row pb-2 box_esconde" id="box_honorary_paymentform">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 text-uppercase verify-required">
                        Forma de Pagamento
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{Form::select('paymentform', $payment_form,null,['class' => $errors->has('paymentform') ?  'form-control is-invalid' : 'form-control', 'onchange' => 'changeInstallments(this.value);' ])}}
                    </div>
                </div>
            </div>

            <div class="row pb-2" @if( !isset($call->paymentform) || $call->paymentform!='gerencianet' ) style="display:none" @endif id="nInstallments">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 text-uppercase">
                        Quantidade de Parcelas
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{Form::select('max_installments', $qtd_installment,null,['class' => $errors->has('max_installments') ?  'form-control is-invalid' : 'form-control'])}}
                    </div>
                </div>
            </div>

            <div class="row pb-2" @if( !isset($call->paymentform) || $call->paymentform!='gerencianet' ) style="display:none" @endif id="box_gerencianetId">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 text-uppercase">
                        Código do Boleto
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{ Form::text('gerencianet_id', null, ['class' => $errors->has('gerencianet_id') ?  'form-control is-invalid' : 'form-control']) }}
                    </div>
                </div>
            </div>

            <div class="row pb-2 box_esconde" id="box_honorary_paydate">
                <div class="col-sm-12 d-flex ">
                    <div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 text-uppercase verify-required">
                        Data Primeiro Pagamento
                    </div>
                    <div class="task-list-table f-left w-50">
                        {{ Form::date('paydate', null, ['class' => $errors->has('paydate') ?  'form-control is-invalid' : 'form-control']) }}
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-12 text-center px-4 pb-4">
                

                @if (is_null($call->stage_call))                    
                    <button type="submit" class="ga-button ga--is-primary ga--is-large text-center" style="width: 100%" name="button_title" id="button_title" value="send_propost">
                        <svg width="30px" height="40px" viewBox="0 0 30 48">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <path d="M25.5,20.8895495 C24.3246401,20.8895495 23.3684834,20.1715518 23.3684834,19.2891798 C23.3684834,18.4066846 24.3247585,17.6885637 25.5,17.6885637 C26.6753599,17.6885637 27.6315166,18.4066846 27.6315166,19.2891798 C27.6315166,19.8627647 28.1617016,20.3275472 28.8157583,20.3275472 C29.469815,20.3275472 30,19.8627647 30,19.2891798 C30,17.5962726 28.5926472,16.16804 26.6842417,15.7419484 L26.6842417,15.0384906 C26.6842417,14.4649057 26.1540567,14 25.5,14 C24.8459433,14 24.3157583,14.4649057 24.3157583,15.0384906 L24.3157583,15.7419484 C22.4072344,16.16804 21,17.5963958 21,19.2891798 C21,21.3167501 23.0187768,22.9664074 25.5,22.9664074 C26.6753599,22.9664074 27.6315166,23.6844051 27.6315166,24.5669003 C27.6315166,25.4493955 26.6753599,26.1673931 25.5,26.1673931 C24.3246401,26.1673931 23.3684834,25.4492722 23.3684834,24.5669003 C23.3684834,23.9933154 22.8382984,23.5284097 22.1842417,23.5284097 C21.530185,23.5284097 21,23.9933154 21,24.5669003 C21,26.2598075 22.4073528,27.68804 24.3157583,28.1140085 L24.3157583,28.9615094 C24.3157583,29.5350943 24.8459433,30 25.5,30 C26.1540567,30 26.6842417,29.5350943 26.6842417,28.9615094 L26.6842417,28.1140085 C28.5927656,27.68804 30,26.2598075 30,24.5669003 C30,22.53933 27.9812232,20.8895495 25.5,20.8895495" fill="#FFFFFF"></path>
                            </g>
                        </svg>
                        <span class="au-consulting-notes-write__send">Enviar Proposta</span> 
                    </button>
                @else
                    <button type="submit" class="ga-button ga--is-primary ga--is-large text-center mb-4" style="width: 100%;display: inline-block;" name="button_title" value="save">

                        <svg width="30px" height="30px"
                            xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                            xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:dc="http://purl.org/dc/elements/1.1/"
                            xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                            xmlns:svg="http://www.w3.org/2000/svg"
                            xmlns:ns1="http://sozi.baierouge.fr"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            id="svg1468"
                            sodipodi:docname="disk1.svg"
                            viewBox="0 0 187.5 187.5"
                            sodipodi:version="0.32"
                            version="1.0"
                            inkscape:output_extension="org.inkscape.output.svg.inkscape"
                            y="0"
                            x="0"
                            inkscape:version="0.46">
                        <sodipodi:namedview
                            id="base"
                            bordercolor="#ffffff"
                            inkscape:pageshadow="2"
                            inkscape:window-width="704"
                            pagecolor="#d5ac29"
                            inkscape:zoom="1.8346667"
                            inkscape:window-x="66"
                            showgrid="false"
                            borderopacity="1.0"
                            inkscape:current-layer="svg1468"
                            inkscape:cx="93.75"
                            inkscape:cy="93.75"
                            inkscape:window-y="6"
                            inkscape:window-height="715"
                            inkscape:pageopacity="0.0"
                        />
                        <g
                            id="layer1"
                            transform="translate(.54506 1.0901)">
                            <g
                                id="g2098"
                                transform="translate(11.649 12.217)">
                            <rect
                                id="rect2052"
                                style="stroke-linejoin:round;stroke:#ffffff;stroke-width:4.063;fill:#d5ac29"
                                rx="2.97"
                                ry="2.8871"
                                height="110.2"
                                width="108.4"
                                y="25.341"
                                x="27.357"
                            />
                            <rect
                                id="rect2054"
                                style="stroke-linejoin:round;stroke:#ffffff;stroke-width:4.063;fill:#d5ac29"
                                rx="2.0454"
                                ry="1.4745"
                                height="56.282"
                                width="74.653"
                                y="25.703"
                                x="44.497"
                            />
                            <rect
                                id="rect2056"
                                style="stroke-linejoin:round;stroke:#ffffff;stroke-width:4.063;fill:#d5ac29"
                                rx="1.8157"
                                ry="1.2523"
                                height="31.224"
                                width="50.282"
                                y="104.02"
                                x="54.873"
                            />
                            <rect
                                id="rect2060"
                                style="stroke-linejoin:round;stroke:#ffffff;stroke-width:4.063;fill:#d5ac29"
                                rx="1.8157"
                                ry="1.2523"
                                height="31.224"
                                width="38.051"
                                y="104.02"
                                x="54.42"
                            />
                            <rect
                                id="rect2058"
                                style="fill:#ffffff"
                                height="20.587"
                                width="9.9589"
                                y="108.85"
                                x="59.661"
                            />
                            </g>
                        </g>  
                        </svg>

                        <span class="au-consulting-notes-write__send text-center">Salvar</span> 
                    </button>

                    <button type="submit" class="ga-button ga--is-large text-center" style="width: 100%" id="button_title" name="button_title" value="send_propost">
                        <svg width="30px" height="40px" viewBox="0 0 30 48">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <path d="M25.5,20.8895495 C24.3246401,20.8895495 23.3684834,20.1715518 23.3684834,19.2891798 C23.3684834,18.4066846 24.3247585,17.6885637 25.5,17.6885637 C26.6753599,17.6885637 27.6315166,18.4066846 27.6315166,19.2891798 C27.6315166,19.8627647 28.1617016,20.3275472 28.8157583,20.3275472 C29.469815,20.3275472 30,19.8627647 30,19.2891798 C30,17.5962726 28.5926472,16.16804 26.6842417,15.7419484 L26.6842417,15.0384906 C26.6842417,14.4649057 26.1540567,14 25.5,14 C24.8459433,14 24.3157583,14.4649057 24.3157583,15.0384906 L24.3157583,15.7419484 C22.4072344,16.16804 21,17.5963958 21,19.2891798 C21,21.3167501 23.0187768,22.9664074 25.5,22.9664074 C26.6753599,22.9664074 27.6315166,23.6844051 27.6315166,24.5669003 C27.6315166,25.4493955 26.6753599,26.1673931 25.5,26.1673931 C24.3246401,26.1673931 23.3684834,25.4492722 23.3684834,24.5669003 C23.3684834,23.9933154 22.8382984,23.5284097 22.1842417,23.5284097 C21.530185,23.5284097 21,23.9933154 21,24.5669003 C21,26.2598075 22.4073528,27.68804 24.3157583,28.1140085 L24.3157583,28.9615094 C24.3157583,29.5350943 24.8459433,30 25.5,30 C26.1540567,30 26.6842417,29.5350943 26.6842417,28.9615094 L26.6842417,28.1140085 C28.5927656,27.68804 30,26.2598075 30,24.5669003 C30,22.53933 27.9812232,20.8895495 25.5,20.8895495" fill="#FFFFFF"></path>
                            </g>
                        </svg>
                        <span class="au-consulting-notes-write__send">Enviar Proposta Novamente</span> 
                    </button>
                    @if ($access && isset($access->url))
                        <div class="row">
                            <div class="col-sm-4 pt-4">
                                <a href="javascript:void(0);" class="btn btn-primary" onclick="copy_field('field_login');">
                                    <i class="fa fa-copy"></i> &nbsp; Copiar
                                </a>
                            </div>
                            <div class="col-sm-8 pt-4">
                                <input type="text" value="{{$access->url}}" id="field_login" class="form-control" style="border:0px" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pt-4">
                                <a href="javascript:void(0);" class="btn btn-primary d-block" onclick="copy_field('field_login_text');">
                                    <i class="fa fa-copy"></i> &nbsp; Copiar Texto Com Link
                                </a>
                                <input type="text" name="field_login_text d-none" id="field_login_text" cols="30" rows="10" style="opacity: 0" value="*{{$call->client->first_name}}*, para realizar nossa *Contratação*, basta seguir as orientações abaixo:
                                    1. Acessar o link *{{$access->url}}* e *preencher os dados* do Contratante; {{chr(13)}}
                                    2. Selecionar a *forma de pagamento*; {{chr(13)}}
                                    3. Após conferir se os dados informados estão corretos, *emitir o contrato*; {{chr(13)}}
                                    4. O contrato será encaminhado para o seu e-mail pela *D4SIGN*; {{chr(13)}}
                                    5. Acesse seu e-mail e clique em *Ver documento*; {{chr(13)}}
                                    6. Leia atentamente o contrato e clique em *Assinar como parte*;"
                                >
                            <div>
                        </div>                                         
                    @endif
                @endif
            </div>
        </div>
        {{ Form::close() }}

     
        

        @if (!is_null($call->stage_call))
            <div class="row">
                <div class="col-sm-12 text-center p-4">

                    @if ($access)
                        <label style="display:none">Link de acesso até {{date('d/m/Y H:i:s',strtotime($access->finish))}}:</label><br />
                        <a href="{{route('client.login.access',['code'=>$access->code])}}" class="text-success" target="_blank" style="display:none">
                            {{route('client.login.access',['code'=>$access->code])}}
                        </a>
                    @else
                        {{ Form::open(['route' => ['admin.access.store',$call->id,$call->client->id] ]) }}
                        {{ Form::hidden('stage_call', 'dados') }}
                        <button type="submit" class="ga-button ga--is-primary ga--is-large d-block text-center" style="width: 100%;">
                            <i class="fa fa-plus fa-lg"></i>
                            <span class="au-consulting-notes-write__send"> Gerar Link temporário de acesso</span> 
                        </button>
                        {{ Form::close() }}
                    @endif

                    
                </div>
            </div>
        @endif

        

        

    </div>
    
</consulting-notes-tasks>


<script>
    function openrelationship(valor){
        if(valor == '0'){
            $('#box_relationship_claimant').show();
        }else{
            $('#box_relationship_claimant').hide();
        }
    }
</script>