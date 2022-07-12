@foreach ($helps as $help)
    <div class="box-accordion">
        <h3 class="accordion">{{$help->name}}</h3>
        <div class="accordion" data-id="{{$help->id}}">
            @if($help->id != 9)
                {!! $help->description !!}
            @else
                <div style="margin-bottom:20px">
                    <h5><i class="fa fa-envelope"></i> Verifique seu e-mail</h5>
                    
                    <p>Voc&ecirc; receber&aacute; no seu e-mail um link &uacute;nico e totalmente seguro.</p>
                </div>
                    
                <div style="margin-bottom:20px">
                    <h5><i class="fa fa-file-pdf"></i> Visualize o documento</h5>
                    
                    <p>Analise o documento pelo tempo que precisar e assine quando desejar.</p>
                </div>
                    
                <div class="col-md-12 col-sm-4" style="margin-bottom:20px">
                    <h5><i class="fa fa-check"></i> Assine</h5>
                    
                    <p>Preencha seus dados e assine o documento eletronicamente. Simples, r&aacute;pido e seguro. Ser&atilde;o registrados v&aacute;rios pontos de autentica&ccedil;&atilde;o para garantir a seguran&ccedil;a da sua assinatura.</p>
                </div>

                <div class="shot-container">
                    <div id="owl-carousel-shots-phone" class="owl-carousel">
                        <div class="owl-container text-center shots-modal" style='margin-left: -3px;'>
                            <img src="/assets-client/images/app-screenshot1alt.jpg" height='423px' width='240px' alt="Visualizando o documento" title="Visualizando o documento" />
                        </div>

                        <div class="owl-container text-center shots-modal" style='margin-left: -3px;'>
                            <img src="/assets-client/images/app-screenshot2alt.gif" height='423px' width='240px' alt="Assinando como parte" title="Assinando como parte" />
                        </div>

                        <div class="owl-container text-center shots-modal" style='margin-left: -3px;'>
                            <img src="/assets-client/images/app-screenshot3alt.jpg" height='423px' width='240px' alt="Assinado com sucesso" title="Assinado com sucesso" />
                        </div>
                    </div><!-- /End owl carousel-->
                </div>
            @endif
        </div>
    </div>
@endforeach