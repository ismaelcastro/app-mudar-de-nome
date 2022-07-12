<?php

namespace App\Observers;

use App\Helpers\Functions;
use App\Helpers\MauticHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMailCreatePassword;
use App\Models\Access;
use App\Models\Call;
use App\Models\ProcessCategory;
use App\Models\Reason;
use Carbon\Carbon;


class CallObserver
{
    /**
     * Handle the call "created" event.
     *
     * @param  \App\Models\Call  $call
     * @return void
     */
    public function created(Call $call)
    {
        try{
            $client = $call->client;
            $mautic = new MauticHelper();
            $mautic->send_mail(90, $client->mautic_id);
        }catch (\Exception $e) {
            //não faz nada
        }
    }

    /**
     * Handle the call "updated" event.
     *
     * @param  \App\Models\Call  $call
     * @return void
     */
    public function updated(Call $call)
    {
        $status_mautic = Call::STATUS_MAUTIC;
        $stage_call_mautic = Call::STAGE_CALL_MAUTIC;
        $stage_case_mautic = Call::STAGE_CASE_MAUTIC;


        $mautic = new MauticHelper();      
        
    
        
        if($call->isDirty('status')){
            $data = [
                'comercial' => $status_mautic[$call->status]
            ];
            $mautic->update_contact($call->client,$data);
        }
        if($call->isDirty('reason_id')){
            $reason = Reason::find($call->reason_id);
            if($reason){
                $data = [
                    'reason' => $reason->name
                ];
                $mautic->update_contact($call->client,$data);
            }
        }
        if($call->isDirty('paymentform')){
            $data = [
                'formapag' => $call->paymentform
            ];
            $mautic->update_contact($call->client,$data);
        }
        if($call->isDirty('stage_call')){
            $data = [
                'etapacomercial' => $call->stage_call
            ];
            $mautic->update_contact($call->client,$data);
        }
        if($call->isDirty('stage_case')){
            $data = [
                'stage_case' => $call->stage_case
            ];
            $mautic->update_contact($call->client,$data);
        }
        
        if($call->isDirty('procedural_step')){
            $procedural_step = $call->procedural_step;
            $process_category = ProcessCategory::where('name',$procedural_step)->first();
            if($process_category){
                $etapa_mautic = $process_category->etapa_mautic;
                $status_call = $process_category->status_call;
                
                if(!is_null($etapa_mautic)){
                    $data = [
                        'etapaprocessual' => $etapa_mautic
                    ];
                    $mautic->update_contact($call->client,$data);
                }
                
                DB::table('calls')
                ->where('id',$call->id)
                ->update(
                    [
                        'procedural_status' => $status_call,
                        'date_procedural_status' => Carbon::now()
                    ]
                );
                /*
                $call->procedural_status = $status_call;
                $call->date_procedural_status = Carbon::now();
                $call->save();
                */
            }            
        }

       
        
    }

    /**
     * Handle the call "updated" event.
     *
     * @param  \App\Models\Call  $call
     * @return void
     */
    public function updating(Call $call)
    {
        //if($call->isDirty('stage_call')){
            // stage_call has changed
            $new_stage_call = $call->stage_call; 
            $old_stage_call = $call->getOriginal('stage_call');
            //if( (is_null($old_stage_call) || $old_stage_call == 'dados' ) && $new_stage_call == 'dados' ){
            if( is_null($old_stage_call) && $new_stage_call == 'dados' ){
                $client = $call->client;
                /*
                $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
                $password = substr($random, 0, 10);
                $password_crypt = Hash::make($password);                
                $client->password = $password_crypt;
                $client->save();
                
                
                $to = $client->email;
                $data2 = [
                    'name' => $client->first_name,
                    'email' => $client->email,
                    'password' => $password
                ];
                Mail::to($to)->send(new SendMailCreatePassword($data2));
                */

                
                $code = rand(10, 99).$client->id.'_'.date('YmdHis');
                $finish = date('Y-m-d H:i:s', strtotime("+3650 day"));


                Access::where('client_id',$client->id)->where('call_id',$call->id)->delete();

                $link = route('client.login.access',['code'=>$code]);
                $function = new Functions;
                $url = $function->encurta_url($link);

                Access::create([
                    'client_id' => $client->id,
                    'call_id' => $call->id,
                    'code' => $code,
                    'finish' => $finish,
                    'url' => $url
                ]);

                




                $mautic = new MauticHelper();
                $forma_pgto = $call->paymentform;

                $forma_pgtoMautic = $forma_pgto=='gerencianet' ? 'Gerencianet' : ($forma_pgto=='deposito' ? 'Depósito' : 'Ad Exitum' );
                $sum_honrary = $call->call_honorary()->sum('amount');
                $data = [
                    'attribution' => $sum_honrary,
                    'parcelas' => $call->max_installments,
                    'potencial' => $call->stars,
                    'formapag' => $forma_pgtoMautic,
                    'link_de_acesso' => $link
                ];
                $mautic->update_contact($client,$data);

                $email_id = ( $forma_pgto=='gerencianet' ? 93 : ($forma_pgto=='deposito' ? 94 : 95 ) );
                $mautic->send_mail($email_id, $client->mautic_id);
            }
        //}
    }

    /**
     * Handle the call "deleted" event.
     *
     * @param  \App\Models\Call  $call
     * @return void
     */
    public function deleted(Call $call)
    {
        //
    }

    /**
     * Handle the call "restored" event.
     *
     * @param  \App\Models\Call  $call
     * @return void
     */
    public function restored(Call $call)
    {
        //
    }

    /**
     * Handle the call "force deleted" event.
     *
     * @param  \App\Models\Call  $call
     * @return void
     */
    public function forceDeleted(Call $call)
    {
        //
    }
}
