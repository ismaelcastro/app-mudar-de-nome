<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $config_array = config('setting.setting');
        return view('admin.pages.settings.index', compact('config_array'));
    }

    public function store(Request $request)
    {
        $dataForm = $request->except('_token');
        foreach ($dataForm as $key => $value) {
            $value = (is_array($value) ? implode(',', $value) : $value);
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        return redirect()->back()->with('success', 'Configuração Atualizada com sucesso!');
    }
}
