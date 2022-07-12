<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Emissão de Certidão</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <div>
        <div>
            <h2 style="text-align: center;">Pedido de Certidão de {{ $callDocument['document_id'] == 14 ? "Nascimento" : "Casamento" }}</h2>
        </div>

        @if(isset($data['client']))
        <table>
            <tbody>
                @if(isset($data['client']['nome']))
                <tr>
                    <td><strong>Nome</strong></td>
                    <td colspan="8">{{ $data['client']['nome'] }}</td>
                </tr>
                @elseif(isset($data['client']['conjuge_1']) && isset($data['client']['conjuge_2']))
                <tr>
                    <td><strong>Nome do primeiro conjuge</strong></td>
                    <td colspan="4">{{ $data['client']['conjuge_1'] }}</td>
                </tr>
                <tr>
                    <td><strong>Nome do segundo conjuge</strong></td>
                    <td colspan="4">{{ $data['client']['conjuge_2'] }}</td>
                </tr>
                @endif
                <tr>
                    @if(isset($data['client']['cpf']) || $data['client']['data_nasc'])
                    <td><strong>CPF</strong></td>
                    <td colspan="3">{{ $data['client']['cpf'] ?? " - "}}</td>
                    <td><strong>Nascimento</strong></td>
                    <td colspan="3">{{ $data['client']['data_nasc'] }}</td>
                    @elseif(isset($data['client']['data_casamento']))
                    <td><strong>Casamento</strong></td>
                    <td colspan="6">{{ $data['client']['data_casamento'] }}</td>
                    @endif
                </tr>
                @if(isset($data['client']['filiacao1']) || isset($data['client']['filiacao2']))
                <tr>
                    <td><strong>Filiação</strong></td>
                    <td colspan="4">{{ $data['client']['filiacao1'] ?? ' - ' }}</td>
                    <td colspan="4">{{ $data['client']['filiacao2'] ?? ' - ' }}</td>
                </tr>
                @endif
                @if(isset($data['client']['cartorio']) && isset($data['client']['cidade']) && $data['client']['estado'])
                <tr>
                    <td><strong>Cartório</strong></td>
                    <td colspan="4">{{$data['client']['cartorio'] }}</td>
                    <td colspan="4">{{ str_replace("_"," ",$data['client']['cidade']) }} - {{$data['client']['estado'] }}</td>
                </tr>
                @endif
                <tr>
                    <td><strong>Valor Pago</strong></td>
                    <td colspan="8">R$ {{ $data['price'] }}</td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>

    @if($data['anexos']['comprovante_pagamento']->extension() != 'pdf')
    <div>
        <img src="{{storage_path()." /app/private/{$folder}/{$filePagamento}"}}" width="600">
    </div>
    @endif

    @if(isset($data['anexos']['certidao_antiga']) && $data['anexos']['certidao_antiga']->extension() != 'pdf')
    <div>
        <img src="{{storage_path()." /app/private/{$folder}/{$fileCertidao}"}}" width="600">
    </div>
    @endif
</body>

</html>