<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Models\Reason;
use App\Models\Client;
use App\Models\Call;
use App\Observers\ClientObserver;
use App\Observers\CallObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Reason $reason)
    { 
        \Carbon\Carbon::setLocale('pt-BR');
        setlocale(LC_TIME, 'pt-BR');
        Schema::defaultStringLength(191);   

        Client::observe(ClientObserver::class);
        Call::observe(CallObserver::class);  
        view()->composer('*', function ($view) use($reason)
        {
            View::share('websites_list', 
                [
                    'ratsbonemagri' => 'ratsbonemagri.com.br',
                    'alterarnome' => 'alterarnome.com.br',
                    'acrescentarsobrenome' => 'acrescentarsobrenome.com.br',
                    'incluirsobrenome' => 'incluirsobrenome.com.br',
                    'mudardenome' => 'mudardenome.com.br',
                    'mudarnome' => 'mudarnome.com.br',
                    'retificacaoderegistro' => 'retificacaoderegistro.com.br'
                ]
            );
            
            $reason_list = $reason->all()->pluck('name', 'id');
            $reasons_all = $reason->all();
            View::share('reasons_list', $reason_list);
            View::share('reasons_all', $reasons_all);

            $setting = \App\Helpers\Setting::getList();
            $view->with('setting', $setting);
        });
    }
}
