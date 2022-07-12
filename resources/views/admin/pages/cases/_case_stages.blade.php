@php

    $class1 = '';
    $class2 = '';
    $class3 = '';

    switch ($stages) {
        case "solicitacao_documentos":
            $class1 = 'current';
            $class2 = 'disabled';
            $class3 = 'disabled';
            break;
        case "aguardando_envio_cliente":
            $class1 = 'current';
            $class2 = 'disabled';
            $class3 = 'disabled';
            break;
        case "analise_documentacao":
            $class1 = 'current';
            $class2 = 'disabled';
            $class3 = 'disabled';
            break;
        case "emissao_guias":
            $class1 = 'done';
            $class2 = 'current';
            $class3 = 'disabled';
            break;
        case "aguardando_pgto":
            $class1 = 'done';
            $class2 = 'done';
            $class3 = 'current';
            break;
        case "conferir_guias":
            $class1 = 'done';
            $class2 = 'current';
            $class3 = 'disabled';
            break;
        case "elaboracao_inicial":
            $class1 = 'done';
            $class2 = 'done';
            $class3 = 'current';
            break;
        case "processo_distribuido":
            $class1 = 'done';
            $class2 = 'done';
            $class3 = 'done';
            break;
        case "solicitacao_rescisao":
            $class1 = 'done';
            $class2 = 'done';
            $class3 = 'done';
            break;
        case "rescisao_contratual":
            $class1 = 'done';
            $class2 = 'done';
            $class3 = 'done';
            break;
    }
@endphp
<div class="wizard">
    <div class="steps clearfix">                                                                                                    
        <ul role="tablist"> 
            <li role="tab" aria-disabled="false" class="first {{$class1}}" aria-selected="true">
                <a id="steps-uid-3-t-0" href="#steps-uid-3-h-0" aria-controls="steps-uid-3-p-0" style="background: transparent;">
                    <span class="current-info audible">current step: </span><span class="number">1</span>
                </a>
            </li>

            <li role="tab" aria-disabled="false" class="{{$class2}}" aria-selected="false">
                <a id="steps-uid-3-t-1" href="#steps-uid-3-h-1" aria-controls="steps-uid-3-p-1" style="background: transparent;">
                    <span class="number">2</span>
                </a>
            </li>

            <li role="tab" class="{{$class3}} last" aria-disabled="true">
                <a id="steps-uid-3-t-3" href="#steps-uid-3-h-3" aria-controls="steps-uid-3-p-3" style="background: transparent;">
                    <span class="number">3</span> 
                </a>
            </li>                                
        </ul>
    </div>
</div>