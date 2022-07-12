<?php

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            [
                'name' => 'Excluir sobrenome do pai biológico não afeta filiação', 
                'news_category_id' => 1, 
                'image' => '5e43fb23cee29_excluir-sobrenomejpg.jpeg', 
                'date' => '2014-03-17', 
                'summary' => 'Uma das expressões concretas do princípio da dignidade da pessoa humana é o direito ao nome. Nesse sentido, caso o sobrenome não corresponda à realidade familiar da', 
                'description' => '<p>Uma das express&otilde;es concretas do princ&iacute;pio da dignidade da pessoa humana &eacute; o direito ao nome. Nesse sentido, caso o sobrenome n&atilde;o corresponda &agrave; realidade familiar da pessoa, ela pode alter&aacute;-lo sem que isso afete seu v&iacute;nculo como filho no registro civil. Assim entendeu a 2&ordf; C&acirc;mara C&iacute;vel do Tribunal de Justi&ccedil;a do Rio de Janeiro, ao prover recurso de um homem que requereu a substitui&ccedil;&atilde;o do sobrenome do seu pai biol&oacute;gico pelo do seu padrasto na certid&atilde;o de nascimento. A&nbsp;<a href="https://www.conjur.com.br/dl/tj-rj-provimento-recurso-assegurando1.pdf">decis&atilde;o</a>, por unanimidade, foi tomada nesta quarta-feira (12/3).</p>
                <p>A senten&ccedil;a de primeiro grau julgou procedente o pedido para mudan&ccedil;a no registro civil, por&eacute;m indeferiu a exclus&atilde;o do sobrenome paterno. O Minist&eacute;rio P&uacute;blico opinou no mesmo sentido.</p>                
                <p>O autor, ent&atilde;o, recorreu alegando n&atilde;o possuir qualquer v&iacute;nculo afetivo com o pai biol&oacute;gico. Criado desde os dois anos de idade por sua m&atilde;e e pelo padrasto, afirma que o uso do sobrenome do seu genitor n&atilde;o corresponde &agrave; sua realidade familiar. Ele n&atilde;o mant&eacute;m qualquer v&iacute;nculo material ou afetivo com ele, com quem s&oacute; esteve pessoalmente em uma ocasi&atilde;o, aos 20 anos. Por outro lado, sustenta que o uso do sobrenome lhe causa constrangimento, uma vez que o difere dos demais irm&atilde;os, criados sem distin&ccedil;&atilde;o pelo padrasto, que, ali&aacute;s, concorda com o seu pedido. Aspira com a mudan&ccedil;a ser reconhecido pela sociedade como parte da fam&iacute;lia a qual efetivamente integra.</p>                
                <p>De acordo com a desembargadora-relatora Claudia Telles, por estar profundamente ligado &agrave; identidade da pessoa no meio social, o nome civil pode ser alterado em circunst&acirc;ncias excepcionais, desde que haja justa motiva&ccedil;&atilde;o e n&atilde;o imponha preju&iacute;zo a terceiros.</p>                
                <p>&ldquo;Com efeito, sempre que a altera&ccedil;&atilde;o pleiteada se mostrar necess&aacute;ria para assegurar a dignidade humana, que deve servir de base para a cria&ccedil;&atilde;o, aplica&ccedil;&atilde;o e interpreta&ccedil;&atilde;o das normas relacionadas aos direitos da personalidade, a mudan&ccedil;a deve ser autorizada&rdquo;, pontua. A relatora acrescenta que a altera&ccedil;&atilde;o requerida manter&aacute; tanto o sobrenome de fam&iacute;lia materno como a filia&ccedil;&atilde;o ao pai biol&oacute;gico, uma vez que a modifica&ccedil;&atilde;o afetar&aacute; somente o nome, e n&atilde;o o registro dos genitores na certid&atilde;o de nascimento. Nesse sentido, salienta, n&atilde;o h&aacute; raz&atilde;o para se discutir a possibilidade de ado&ccedil;&atilde;o, conforme alegado pela Procuradoria de Justi&ccedil;a, que se manifestou contr&aacute;ria ao recurso.</p>                
                <p>Em seu voto, Claudia Telles cita precedentes do Superior Tribunal de Justi&ccedil;a favor&aacute;veis &agrave; possibilidade de que um filho, abandonado pelo genitor, alterasse seu nome para excluir o sobrenome paterno. Al&eacute;m disso, diz, o direito ao nome est&aacute; consagrado no artigo 16 do C&oacute;digo Civil. &ldquo;Vale notar que, por ser o mais importante dos atributos da personalidade, o nome est&aacute; presente em todos os acontecimentos da vida do indiv&iacute;duo e em todos os atos jur&iacute;dicos, j&aacute; que a pessoa deve se apresentar com o nome sob o qual foi registrado, que o acompanhar&aacute; at&eacute; a morte&rdquo;, conclui.</p>                
                <p><strong>Fonte:&nbsp;<a href="https://www.conjur.com.br/2014-mar-17/excluir-sobrenome-pai-biologico-nao-altera-filiacao-decide-tj-rj">Conjur</a></strong></p>', 
                'websites' => 'incluirsobrenome', 
                'slug' => 'excluir-sobrenome-do-pai-biologico-nao-afeta-filiacao', 
                'metatitle' => 'Excluir sobrenome do pai biológico não afeta filiação', 
                'metadescription' => 'Uma das expressões concretas do princípio da dignidade da pessoa humana é o direito ao nome. Nesse sentido, caso o sobrenome não corresponda à realidade familiar da pessoa'
            ]
        ];

        News::insert($listArray);
    }
}
