@php
    switch ($stages) {
        case null:
            $class1 = 'disabled';
            $class2 = 'disabled';
            $class3 = 'disabled';
            break;
        case "dados":
            $class1 = 'current';
            $class2 = 'disabled';
            $class3 = 'disabled';
            break;
        case "emissao":
            $class1 = 'done';
            $class2 = 'current';
            $class3 = 'disabled';
            break;
        case "assinatura":
            $class1 = 'done';
            $class2 = 'done';
            $class3 = 'current';
            break;
        case "cancelado":
            $class1 = 'disabled';
            $class2 = 'disabled';
            $class3 = 'disabled';
            break;
        case "assinado":
            $class1 = 'done';
            $class2 = 'done';
            $class3 = 'done';
            break;
    }
@endphp
@if ($stages != 'cancelado')
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
@endif