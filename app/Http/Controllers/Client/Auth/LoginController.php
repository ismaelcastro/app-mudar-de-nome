<?php

namespace App\Http\Controllers\Client\Auth;

use App\Mail\Login;
use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('client.pages.auth.login');
    }

    public function login(Request $request)
    {
        $data = $this->_validate($request);

        $client = Client::where('email', $data['username'])->orWhere('cpf', $data['username'])->first();
        if (!$client) {
            return redirect()->back()->with('error', 'Credenciais inválidas!')->withInput();
        }

        Mail::to($client)->send(new Login($client));

        return redirect()->back()->with('success', 'E-Mail de Acesso enviado!')->withInput();
    }

    public function login_access($code)
    {
        $access = Access::where('code', $code)->where('finish', '>=', date('Y-m-d H:i:s'))->first();

        if ($access) {
            $call_id = $access->call_id;
            session(['call_id' => $call_id]);
            Auth::guard('client')->login($access->client); // logando            
            
            return redirect()->route('client.perfil');
        } else {
            return redirect()->back()->with('error', 'este link não é mais inválido');
        }
    }

    public function logout()
    {
        Auth::guard('client')->logout();
        return redirect('/');
    }


    protected function _validate(Request $request, $id = null)
    {
        return $this->validate($request, [
            'username' => "required|string|max:191",
            // 'g-recaptcha-response' => [
            //     'required',
            //     new ValidaCaptcha()
            // ]
        ]);
    }

}