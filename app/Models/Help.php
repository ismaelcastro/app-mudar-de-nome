<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $fillable = [
        'pages', 'name', 'description', 'order',
    ];


    public function getPagesAttribute($value)
    {
        $array = !is_null($value) ? explode(',',$value) : [];
        return $array;
    }

    public function itens($page)
    {
        $itens = $this->where('pages','REGEXP','[[:<:]]'.$page.'[[:>:]]')->orderBy('order')->get();
        return $itens;
    }

    public function setPagesAttribute($value)
    {
        $this->attributes['pages'] = implode(',',$value);
    }


    const PAGES = [
        'forma_contratacao' => 'Forma de Contratação',
        'visualizacao_contrato' => 'Visualização do Contrato',
        'assinatura_eletronica' => 'Assinatura Eletrônica',
        'requerente_outros' => 'Requerente e Outros',
        'breve_relato' => 'Breve Relato',
        'retificacoes_desejadas' => 'Retificações Desejadas',
        'procuracao' => 'Procuração',
        'documentos_pessoais' => 'Documentos Pessoais',
        'documentos_pessoais_interna' => 'Documentos Pessoais Interna',
        'provas' => 'Provas',
        'certidoes_negativas' => 'Certidões Negativas',
        'certidoes_negativas_interna' => 'Certidões Negativas Interna',
        'custas_processuais' => 'Custas Processuais',
        'documentos_extras' => 'Documentos Extras',
        'fase_final_elaboração' => 'Fase Final de Elaboração',
        'financeiro_carne' => 'Financeiro - Carnê',
        'financeiro_transferencia' => 'Financeiro - Transferência Bancária',
        'financeiro_adexitum' => 'Financeiro - Ad Exitum',
        'financeiro_pagseguro' => 'Financeiro - PagSeguro'
    ];
}
