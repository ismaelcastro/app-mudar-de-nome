<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

use App\Http\Controllers\Controller;

use App\Models\Call;

class UploadController extends Controller
{
    public function imagePublic(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {

            $validation = Validator::make($request->all(), [
                'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($validation->passes()) {
                $extension = $request->file->extension();
                $fileName = str_replace($extension, '', $request->file->getClientOriginalName());
                $fileSize = $request->file->getClientSize();
                $folder = (isset($request->folder) ? $request->folder : 'images');

                $fileNameFormated = uniqid() . '_' . Str::slug($fileName) . '.' . $extension;
                $upload = $request->file->storeAs($folder, $fileNameFormated);
                if ($upload) {
                    return Response()->json([
                        "success" => true,
                        "file" => $fileNameFormated,
                        'mesagem' => 'Upload realizado com sucesso!'
                    ]);
                } else {
                    return Response()->json([
                        "success" => false,
                        "file" => '',
                        'mesagem' => 'Houve algum problema no upload desta imagem!'
                    ]);
                }
            } else {
                return Response()->json([
                    "success" => false,
                    "file" => '',
                    'mesagem' => $validation->errors()->all()
                ]);
            }
        } else {
            return Response()->json([
                "success" => false,
                "file" => '',
                'mesagem' => 'Isto não é um arquivo de imagem!'
            ]);
        }
    }

    public function filePrivate(Request $request, Call $call)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $extension = $request->file->extension();
            $fileName = str_replace($extension, '', $request->file->getClientOriginalName());
            $folder = Str::slug($call->client->id . '-' . $call->client->name);
            $fileNameFormated = Str::slug($fileName) . '_' . rand(10, 99) . '.' . $extension;
            $upload = $request->file->storeAs($folder, $fileNameFormated, 'private');
            if ($upload) {
                return Response()->json([
                    "success" => true,
                    "file" => $fileNameFormated,
                    'mesagem' => 'Upload realizado com sucesso!'
                ]);
            } else {
                return Response()->json([
                    "success" => false,
                    "file" => '',
                    'mesagem' => 'Houve algum problema no upload deste arquivo!'
                ]);
            }
        } else {
            return Response()->json([
                "success" => false,
                "file" => '',
                'mesagem' => $validation->errors()->all()
            ]);
        }
    }

    public function filePublic(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {

            $validation = Validator::make($request->all(), [
                'file' => 'required|mimes:doc,docx,pdf,png,jpg|max:2048'
            ]);

            if ($validation->passes()) {
                $extension = $request->file->extension();
                $fileName = str_replace($extension, '', $request->file->getClientOriginalName());
                $fileSize = $request->file->getClientSize();
                $folder = (isset($request->folder) ? $request->folder : 'files');

                $fileNameFormated = uniqid() . '_' . Str::slug($fileName) . '.' . $extension;
                $upload = $request->file->storeAs($folder, $fileNameFormated);
                if ($upload) {
                    return Response()->json([
                        "success" => true,
                        "file" => $fileNameFormated,
                        'mesagem' => 'Upload realizado com sucesso!'
                    ]);
                } else {
                    return Response()->json([
                        "success" => false,
                        "file" => '',
                        'mesagem' => 'Houve algum problema no upload deste arquivo!'
                    ]);
                }
            } else {
                return Response()->json([
                    "success" => false,
                    "file" => '',
                    'mesagem' => $validation->errors()->all()
                ]);
            }
        } else {
            return Response()->json([
                "success" => false,
                "file" => '',
                'mesagem' => 'Isto não é um arquivo de válido!'
            ]);
        }
    }
}
