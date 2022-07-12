<div class="box-sidebar action-hover">
    <div class="card-header">
        <h5 class="mb-0" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
            <svg width="28px" height="28px" viewBox="0 0 32 32">
                <defs>
                    <path d="M0 0.0002L20.9999 0.0002 20.9999 26.0002 0 26.0002z"></path>
                </defs>
                <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                    <g transform="translate(2 2)">
                        <mask fill="#fff">
                            <use xlink:href="#path-1"></use>
                        </mask>
                        <path fill="#D5AC29" d="M21 13.48V3.25C21 1.453 19.566 0 17.792 0H3.209C1.435 0-.001 1.453-.001 3.25v19.5C0 24.547 1.436 26 3.21 26h11.229c-1.801-1.686-2.373-2.869-2.737-4.053-.404-1.31 1.077-1.3 1.077-1.57 0-.124.21-1.89 1.66-3.813 1.288-1.71 3.475-2.737 6.562-3.084z" mask="url(#mask-2)"></path>
                    </g>
                    <path fill="#FFF" d="M16.968 10H9.033C8.46 10 8 9.552 8 9s.461-1 1.033-1h7.935C17.538 8 18 8.448 18 9s-.461 1-1.032 1"></path>
                    <path fill="#FFF" d="M16.968 14H9.033C8.46 14 8 13.552 8 13s.461-1 1.033-1H15c.571 0 1.032.448 1.032 1s-.46 1-1.032 1"></path>
                    <path fill="#FFF" d="M16.968 18H9.033C8.46 18 8 17.552 8 17s.461-1 1.033-1H13c.571 0 1.033.448 1.033 1S13.57 18 13 18"></path>
                    <path fill="#FFF" d="M6 10a1 1 0 110-2 1 1 0 010 2"></path>
                    <path fill="#FFF" d="M6 14a1 1 0 110-2 1 1 0 010 2"></path>
                    <path fill="#FFF" d="M6 18a1 1 0 110-2 1 1 0 010 2"></path>
                    <g fill="#D5AC29" transform="translate(15 17)">
                        <path d="M1.607 6.5H.58a.27.27 0 00-.257.171c-.055.12-.01.225.042.295.646.87.97 1.321 1.657 2.177.059.073.147.19.362.205a.455.455 0 00.37-.142l1.849-2.24c.074-.11.104-.209.09-.295a.199.199 0 00-.199-.171h-1.1c.094-2.468 2.22-4.447 4.818-4.447 2.659 0 4.822 2.071 4.822 4.618S10.87 11.29 8.212 11.29A4.87 4.87 0 014.81 9.931c-.908-.875-2.08.455-1.267 1.213A6.713 6.713 0 008.213 13c3.643 0 6.606-2.839 6.606-6.329 0-3.49-2.963-6.329-6.607-6.329C4.63.342 1.702 3.09 1.607 6.5z"></path>
                        <path d="M7 4.215V7.48l2.706 1.656a.68.68 0 00.945-.24.717.717 0 00-.246-.97L8.43 6.715v-2.5a.715.715 0 00-1.43 0z"></path>
                    </g>
                </g>
            </svg>
            Últimos históricos
            <span class="action-box pull-right">
                <div class="dropdown-tmp-icon" tabindex="0">
                    <div class="dropdown">
                        @if ($step_send != 'precess')
                        <a href="javascript:void(0)" class="nix-padding-left_5" data-toggle="modal" data-target="#addHistoricModal">
                            <i class="fa fa-plus" data-toggle="tooltip" tooltip="Clique para adicionar" tooltip-placement="right" tooltip-append-to-body="true"></i>
                        </a>
                        @endif                      
    
                       
                        {{ Form::open(['route' => 'admin.historics.search', 'id' => 'showAllHistoric', 'class' => 'pull-right' ]) }}             
                        <input type="hidden" name="call_id" value="{{$call->id}}">
                        <a href="javascript:void(0);" class="nix-padding-left_5" data-toggle="tooltip" tooltip="Ver todos" onclick="window.document.getElementById('showAllHistoric').submit();">
                            <i class="fa fa-external-link-square css-8wh3uq-IconComponent e11c20nv0"></i>
                        </a>
                        {{ Form::close() }}
                    </div>
                </div>    
            </span>



        </h5>
    </div>
    <div id="collapseOne1" data-parent="#accordion-two">
        <div>
            <div class="table-responsive">

                <table class="table table-xs mb-0 table-hover table-borderless">
                    <tbody>
                        @foreach ($call_registers as $call_register)
                        <tr>                            
                            <td width="100">
                                {{ $call_register->created_date }}
                            </td>
                            <td width="15" style="padding: 13px 0px;">
                                <i class="fa fa-lg color-info @if($call_register->user_id ||$call_register->client_id ) fa-user @else fa-cloud @endif"></i>
                            </td>
                            <td>
                                | {!! $call_register->description !!}<br>

                                @if ($call_register->user_id)
                                    @if (auth()->user()->id == $call_register->user_id)
                                        <a href="#" class="badge badge-light text-uppercase">EU</a>
                                    @else
                                        <a href="#" class="badge badge-light text-uppercase">{{$call_register->user->name}}</a>
                                    @endif                    
                                @elseif ($call_register->client_id)
                                    <a href="#" class="badge badge-light text-uppercase">{{$call_register->client->name}}</a>
                                @endif

                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<div id="addHistoricModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
                <h5 class="modal-title">Adicionar histórico manual</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">

                {{ Form::model($call, ['route' => ['admin.call_register.store',$call->id] ]) }}              
                <input type="hidden" name="step" value="{{$step_send}}">
                <div class="form-group">
                    {{ Form::label('description', 'Histórico') }}                    
                    <textarea name="description" class="form-control" placeholder="Digite a descrição do histórico" rows="4"></textarea>
                    @include('admin.partials._help_block',['field' => 'description'])
                </div>
                <div class="form-group pt-20">
                    <div class="row">                        
                        <div class="col-sm-12 text-left">
                            <input type="submit" value="Salvar" class="btn btn-primary" style="padding:10px 40px;">
                        </div>
                    </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>