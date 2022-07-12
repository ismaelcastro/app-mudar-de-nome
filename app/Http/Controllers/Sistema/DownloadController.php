<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\CallExtra;
use App\Models\CallDocument;
use App\Models\CallGuide;
use App\Models\Dispatcher;

class DownloadController extends Controller
{

    public function recibo_protocol(Call $call)
    {
        //dd('aqui');
        $file = $call->protocol;
        //dd($file);
        $folder = Str::slug($call->client->id.'-'.$call->client->name);
        $pathToFile = storage_path("app/private/{$folder}/" . $file);
        return response()->download($pathToFile);
    }

    public function document_client(CallDocument $call_document)
    {
        //dd('aqui');
        $file = $call_document->file;
        //dd($file);
        $folder = Str::slug($call_document->call->client->id.'-'.$call_document->call->client->name);
        $pathToFile = storage_path("app/private/{$folder}/" . $file);
        return response()->download($pathToFile);
    }

    public function document_dispatche(Dispatcher $dispatche)
    {
        //dd('aqui');
        $file = $dispatche->proof_of_payment;
        //dd($file);
        $folder = Str::slug($dispatche->call->client->id.'-'.$dispatche->call->client->name);
        $pathToFile = storage_path("app/private/{$folder}/" . $file);
        return response()->download($pathToFile);
    }

    public function guide_client(CallGuide $call_guide)
    {
        //dd('aqui');
        $file = $call_guide->file;
        //dd($file);
        $folder = Str::slug($call_guide->call->client->id.'-'.$call_guide->call->client->name);
        $pathToFile = storage_path("app/private/{$folder}/" . $file);
        return response()->download($pathToFile);
    }

    public function guide_download(CallGuide $call_guide)
    {
        //dd('aqui');
        $file = $call_guide->file_download;
        //dd($file);
        $folder = Str::slug($call_guide->call->client->id.'-'.$call_guide->call->client->name);
        $pathToFile = storage_path("app/private/{$folder}/" . $file);
        return response()->download($pathToFile);
    }

    public function guide_file_client(CallGuide $call_guide)
    {
        //dd('aqui');
        $file = $call_guide->file_download;
        //dd($file);
        $folder = Str::slug($call_guide->call->client->id.'-'.$call_guide->call->client->name);
        $pathToFile = storage_path("app/private/{$folder}/" . $file);
        return response()->download($pathToFile);
    }

    public function extra_client(CallExtra $call_extra)
    {
        //dd('aqui');
        $file = $call_extra->file;
        //dd($file);

        $folder = Str::slug($call_extra->call->client_id.'-'.$call_extra->call->client->name);
        $pathToFile = storage_path("app/private/{$folder}/" . $file);
        return response()->download($pathToFile);
    }

    public function view_file($folder, $file_name)
    {
        $file = storage_path("app/private/{$folder}/".$file_name);
        $ext = \File::extension($file);

        if($ext=='pdf'){
            $content_types='application/pdf';
        }elseif ($ext=='doc') {
            $content_types='application/msword';  
        }elseif ($ext=='docx') {
            $content_types='application/vnd.openxmlformats-officedocument.wordprocessingml.document';  
        }elseif ($ext=='xls') {
            $content_types='application/vnd.ms-excel';  
        }elseif ($ext=='xlsx') {
            $content_types='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';  
        }elseif ($ext=='txt') {
            $content_types='application/octet-stream';  
        }

        return response(file_get_contents($file),200)
                           ->header('Content-Type',$content_types);
    }
}
