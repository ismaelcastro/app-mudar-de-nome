<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailNotification;
use App\Models\Client;

class CheckStageCall
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if (!auth('client')->check())
            return redirect()->route('client.login.show');

        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id', 'desc')->first();

        $route = Route::getRoutes()->match($request);
        $path = $request->path();
        $current_route_name = $route->getName();

        if (!$call) {
            $to = 'registro@ratsbonemagri.com.br';
            $data2 = [
                'aviso' => '<h2>Erro ao acessar a página</h2><p>Cliente ' . $client->name . ', ID: ' . $client->id . ' tentou acessar página "<i>' . $path . '</i>", mas ainda não existe nenhum atendimento para ele.</p><p>Isto pode ser feito pela área administrativa.</p>'
            ];
            Mail::to($to)->send(new SendMailNotification($data2));
            return redirect()->route('client.login.show')->with('error', 'Nosso time foi notificado para criar um atendimento para que você tenha acesso ao painel');
        }

        $stage_call = $call->stage_call;
        $stage_case = $call->stage_case;
        $procedural_step = $call->procedural_step;

        if (!is_null($procedural_step)) {
            if ($current_route_name == 'client.contratacao.dados') {
                return redirect()->route('client.processo.acompanhamento');
            }
        } elseif (!is_null($stage_case)) {
            if ($stage_case == 'aguardando_procuracao' && $current_route_name != 'client.documentos.documentacao') {
                return redirect()->route('client.documentos.documentacao');
            }elseif ($current_route_name == 'client.custas.processuais.index') {
                if ($stage_case == 'elaboracao_inicial' || $stage_case == 'processo_distribuido') {
                    return redirect()->route('client.elaboracao.protocolado.start');
                }
            } elseif ($current_route_name == 'client.contratacao.dados') {
                if ($stage_case == 'analise_documentacao' || $stage_case == 'aguardando_envio_cliente') {
                    return redirect()->route('client.documentos.documentacao');
                } elseif ($stage_case == 'aguardando_pgto') {
                    return redirect()->route('client.custas.processuais.index');
                } elseif ($stage_case == 'primeiro_acesso') {
                    return redirect()->route('client.iniciais.primeiro.acesso');
                } elseif ($stage_case == 'solicitacao_documentos') {
                    return redirect()->route('client.iniciais.start');
                }elseif ($stage_case == 'emissao_guias') {
                    return redirect()->route('client.documentos.documentacao');
                }  elseif ($stage_case == 'elaboracao_inicial') {
                    return redirect()->route('client.elaboracao.protocolado.start');
                } elseif ($stage_case == 'conferir_guias') {
                    return redirect()->route('client.custas.processuais.index');
                }
            } elseif ($current_route_name == 'client.documentos.documentacao') {
                if ($stage_case == 'aguardando_pgto' || $stage_case == 'conferir_guias') {
                    return redirect()->route('client.custas.processuais.index');
                }
            } elseif ($current_route_name == 'client.contratacao.dados') {
                $percents_claimant = \App\Helpers\Functions::_percents_claimant();
                $percents_itens_breve = \App\Helpers\Functions::_percents_breve();
                if (!is_null($call->is_claimant)) {
                    if ($percents_claimant < 100) {
                        return redirect()->route('client.iniciais.requerente.outros');
                    } else {
                        if ($percents_itens_breve >= 100) {
                            return redirect()->route('client.iniciais.start');
                        } else {
                            if (is_null($call->breve_relato)) {
                                return redirect()->route('client.iniciais.breve.relato');
                            } else {
                                return redirect()->route('client.iniciais.retificacoes');
                            }
                        }
                    }
                } else {
                    return redirect()->route('client.iniciais.primeiro.acesso');
                }
            } elseif ($current_route_name == 'client.iniciais.retificacoes') {
                if ($call->stage_case == 'aguardando_envio_cliente' || $call->stage_case == 'analise_documentacao') {
                    return redirect()->route('client.documentos.documentacao');
                }
            } elseif ($current_route_name == 'client.iniciais.requerente.outros') {
                if (!is_null($call->is_claimant)) {
                    if ($call->is_claimant == 0) { //não sou o requerente
                        //verifica se o requerente esta cadastrado
                        $claimant = $call->Affiliations()->where('type', 'claimant')->first();
                        if ($claimant) {
                            //verifica se o requerente é casado
                            $requerent_id = $claimant->client_id;
                            $requerent = Client::find($requerent_id);
                            if ($requerent->marital_status == 'casado') {
                                $spouse = $call->Affiliations()->where('type', 'spouse')->first();
                                //verifica se preencheu o formulario
                                if ($spouse) {
                                    //verifica se tem filhos
                                    if (!is_null($call->descendants_quantity)) {
                                        $descendants_quantity = $call->descendants_quantity;
                                        $descendant_count = $call->Affiliations()->where('type', 'descendant')->count();
                                        if ($descendant_count < $descendants_quantity) {
                                            return redirect()->route('client.iniciais.descendente.dados');
                                        } else {
                                            //concluiu
                                            return redirect()->route('client.iniciais.start');
                                        }
                                    } else {
                                        //concluiu
                                        return redirect()->route('client.iniciais.start');
                                    }
                                } else {
                                    return redirect()->route('client.iniciais.conjuge.dados');
                                }
                            } else {
                                //verifica se tem filhos
                                if (!is_null($call->descendants_quantity)) {
                                    $descendants_quantity = $call->descendants_quantity;
                                    $descendant_count = $call->Affiliations()->where('type', 'descendant')->count();
                                    if ($descendant_count < $descendants_quantity) {
                                        return redirect()->route('client.iniciais.descendente.dados');
                                    } else {
                                        //concluiu
                                        return redirect()->route('client.iniciais.start');
                                    }
                                } else {
                                    //concluiu
                                    return redirect()->route('client.iniciais.start');
                                }
                            }
                        } else {
                            return redirect()->route('client.iniciais.requerente.dados');
                        }

                    } else {//sou o requerente
                        //verifica se é casado
                        if ($client->marital_status == 'casado') {
                            $spouse = $call->Affiliations()->where('type', 'spouse')->first();
                            if ($spouse) {
                                //verifica se tem filhos
                                if (!is_null($call->descendants_quantity)) {
                                    $descendants_quantity = $call->descendants_quantity;
                                    $descendant_count = $call->Affiliations()->where('type', 'descendant')->count();
                                    if ($descendant_count < $descendants_quantity) {
                                        return redirect()->route('client.iniciais.descendente.dados');
                                    } else {
                                        //concluiu
                                        return redirect()->route('client.iniciais.start');
                                    }
                                } else {
                                    //concluiu
                                    return redirect()->route('client.iniciais.start');
                                }
                            } else {
                                return redirect()->route('client.iniciais.conjuge.dados');
                            }

                        } else {
                            //verifica se tem filhos
                            if (!is_null($call->descendants_quantity)) {
                                $descendants_quantity = $call->descendants_quantity;
                                $descendant_count = $call->Affiliations()->where('type', 'descendant')->count();
                                if ($descendant_count < $descendants_quantity) {
                                    return redirect()->route('client.iniciais.descendente.dados');
                                } else {
                                    //concluiu
                                    return redirect()->route('client.iniciais.start');
                                }
                            } else {
                                //concluiu
                                return redirect()->route('client.iniciais.start');
                            }
                        }

                    }
                }
            } elseif ($stage_case == 'solicitacao_documentos' && $current_route_name != 'client.iniciais.start' && $call->progress > 0) {
                return redirect()->route('client.iniciais.start');
            } elseif ($stage_case == 'solicitacao_documentos' && $current_route_name != 'client.iniciais.primeiro.acesso' && $current_route_name != 'client.iniciais.start') {
                return redirect()->route('client.iniciais.primeiro.acesso');
            } elseif ($current_route_name == 'client.iniciais.primeiro.acesso') {
                $percents_claimant = \App\Helpers\Functions::_percents_claimant();
                if ($percents_claimant == 100 && !is_null($call->breve_relato)) {
                    return redirect()->route('client.iniciais.requerente.outros');
                }elseif ($percents_claimant == 100 && is_null($call->breve_relato)){
                    return redirect()->route('client.iniciais.start'); //01
                }
            }

        } elseif (!is_null($stage_call)) {
            //dd($stage_call);
            if ($stage_call == 'dados' && $current_route_name != 'client.contratacao.dados') {
                return redirect()->route('client.contratacao.dados');
            } elseif ($stage_call == 'emissao' && $current_route_name != 'client.contratacao.forma' && $current_route_name != 'client.contratacao.contrato') {
                return redirect()->route('client.contratacao.forma');
            } elseif ($stage_call == 'assinatura' && $current_route_name != 'client.contratacao.contrato_aviso') {
                return redirect()->route('client.contratacao.contrato_aviso');
            } elseif ($stage_call == 'cancelado') {
                return redirect()->route('client.login.show')->with('error', 'Acesso não permitido');
            }
        }

        return $next($request);
    }
}
