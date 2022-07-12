<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Declaração de Testemunha</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            padding-bottom: 100px;
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
            <h2 style="text-align: center;">Pedido de Declaração de Testemunha</h2>
        </div>
        <table>
            <tbody>
                <tr>
                    <td><strong>Nome</strong></td>
                    <td colspan="8">{{ $data['name'] ?? " - "}}</td>
                </tr>
                <tr>
                    <td><strong>CPF</strong></td>
                    <td colspan="4">{{ $data['cpf'] ?? " - "}}</td>
                    <td><strong>RG</strong></td>
                    <td colspan="4">{{ $data['rg'] ?? " - " }}</td>
                </tr>
                <tr>
                    <td><strong>Contato</strong></td>
                    <td colspan="8">{{ $data['phone'] ?? " - " }}</td>
                </tr>
                <tr>
                    <td><strong>Nacionalidade</strong></td>
                    <td colspan="4">{{ $data['nacionality'] ?? " - "}}</td>
                    <td><strong>Ocupação</strong></td>
                    <td colspan="4">{{ $data['job'] ?? " - "}}</td>
                </tr>
                <tr>
                    <td><strong>Endereço</strong></td>
                    <td colspan="2">{{$data['addresscep'] ?? " - "}}</td>
                    <td colspan="4">{{ $data['addressstreet'] ?? " - "}} {{ $data['addressnumber'] ?? " - "}} {{
                        $data['addresscomplement'] ?? " - "}}</td>
                    <td colspan="4">{{ $data['addressdistrict'] ?? " - "}} {{ $data['addresscity'] ?? " - "}} {{
                        $data['addressstate'] ?? " - "}}</td>
                </tr>
                @if(!is_null($callDocument->document->price))
                <tr>
                    <td><strong>Valor Pago</strong></td>
                    <td colspan="8">R$ {{ $callDocument->document->price }}</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    @if(isset($data['anexos']['comprovante_pagamento']) && $data['anexos']['comprovante_pagamento']->extension() != 'pdf')
    <div>
        <img src="{{storage_path()." /app/private/{$folder}/$filePagamento"}}" width="600">
    </div>
    @endif
</body>

</html>