<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientsController extends Controller
{
    public function change_mail(Request $request): RedirectResponse
    {
        $client = auth('client')->user();
        $data = $this->_validate_change_mail($request, $client->id);
        $client->fill($data);
        $client->save();
        return redirect()->back()->with('success', 'e-mail alterado!');
    }

    public function change_stagecall(Request $request): RedirectResponse
    {
        if (isset($request->clear)) {
            $stage = $request->stage;
            $client = auth('client')->user();
            $call = $client->call()->orderBy('calls.id', 'desc')->first();
            $call->stage_call = $stage;
            $call->save();
        }
        return redirect()->back();
    }

    protected function _validate_change_mail(Request $request, $id): array
    {
        return $this->validate($request, [
            'email' => "required|string|email|max:191|unique:clients,email,{$id},id"
        ]);
    }

    public function profile()
    {
        return view('client.pages.perfil.index');
    }

    public function updateProfile(UpdateProfileRequest $profileRequest, Client $client): RedirectResponse
    {
        $client->fill($profileRequest->validated())->save();

        return redirect()->route('client.perfil')->with('success', 'Atualizado com sucesso');
    }

    public function updateAddress(Request $request, Client $client)
    {
        //
    }
}
