<style>
    .modal .modal-dialog-aside {
        width: 350px;
        max-width: 80%;
        height: 100%;
        margin: 0;
        transform: translate(0);
        transition: transform .2s;
    }

    .modal .modal-dialog-aside .modal-content {
        height: inherit;
        border: 0;
        border-radius: 0;
    }

    .modal .modal-dialog-aside .modal-content .modal-body {
        overflow-y: auto
    }

    .modal.fixed-left .modal-dialog-aside {
        margin-left: auto;
        transform: translateX(100%);
    }

    .modal.fixed-right .modal-dialog-aside {
        margin-right: auto;
        transform: translateX(-100%);
    }

    .modal.show .modal-dialog-aside {
        transform: translateX(0);
    }
</style>

<div class="wrapperStepProcesso">
    <ul class="StepProgress">
        <li class="StepProgress-item">
            <a href="javascript:void(0);" data-toggle="modal" data-target="#principaisDuvidasModal">
                <img src="{{asset('assets-client/images/icones/info-black.png')}}" alt="Principais Dúvidas"
                     height="40">
            </a>
        </li>
        <li class="StepProgress-item">
            <a href="https://api.whatsapp.com/send?phone=5511941684755&text=RatsboneMagri%20Advogados"
               target="_blank">
                <img src="{{asset('assets-client/images/icones/whatsapp.png')}}" alt="Fale conosco" height="40">
            </a>
        </li>
    </ul>
</div>

<div class="modal fade" id="principaisDuvidasModal" tabindex="-1" role="dialog"
     aria-labelledby="principaisDuvidasModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Principais Dúvidas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <nav style="padding: 15px 10px 0px 10px">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @php
                        $cont = 1;
                    @endphp
                    @foreach($top_questions_category as $category)
                        <a class="nav-item nav-link @if($cont==1) active @endif" id="nav-help{{$category->id}}-tab" data-toggle="tab" href="#nav-help{{$category->id}}" role="tab" aria-controls="nav-help{{$category->id}}" aria-selected="@if($cont==1) true @else false @endif ">{{ $category->name }}</a>
                    @php
                        $cont ++;
                    @endphp
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent" style="padding: 0px 10px">
                @php
                    $cont = 1;
                @endphp
                @foreach($top_questions_category as $category)
                <div class="tab-pane fade @if($cont==1) show active @endif" id="nav-help{{$category->id}}" role="tabpanel" aria-labelledby="nav-help{{$category->id}}-tab">
                    @foreach($category->topQuestion as $question)
                        <div class="box-accordion">
                            <h3 class="accordion">{{ $question->question }}</h3>
                            <div class="accordion" data-id="1">
                                <p class="text-justify"> {{ $question->answer }} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                @php
                    $cont ++;
                @endphp
                @endforeach
            </div>

        </div>
    </div>
</div>
