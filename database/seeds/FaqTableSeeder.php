<?php

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listArray = [
            ['name' => 'Como alterar meus diplomas, vistos e demais documentos?', 'faq_category_id' => 1, 'websites' => 'incluirsobrenome', 'description' => '<p>De forma simples, solicitando a institui&ccedil;&atilde;o de ensino, empresa ou &oacute;rg&atilde;o que possua seu cadastro antigo a &ldquo;atualiza&ccedil;&atilde;o de seu cadastro&rdquo;, apresentando para tanto sua Certid&atilde;o de Nascimento/Casamento devidamente atualizada com o nome que passou a adotar.</p>'],
            ['name' => 'Como faço para alterar meus documentos após a Retificação?', 'faq_category_id' => 1, 'websites' => 'incluirsobrenome', 'description' => '<p>O exemplo que costumamos dar aos nossos clientes &eacute; o seguinte: Da mesma forma que emitiria suas 2&ordf; vias de documentos caso houvesse perda ou furto de seus documentos, ou seja,&nbsp;portando a Certid&atilde;o de Nascimento/Casamento devidamente atualizada o interessado dever&aacute; se dirigir ao Poupatempo*&nbsp;e solicitar a emiss&atilde;o dos documentos novos. Lembrando que nenhuma numera&ccedil;&atilde;o &eacute; afetada, somente o nome (<em>n&ordm;s de RG, CPF e outros permanecem os mesmos</em>)</p><p>*Poupatempo foi utilizado como exemplo de S&atilde;o Paulo capital, casos em outras cidades ou estados podem ser em outro local. &nbsp;</p>'],
            ['name' => 'Como posso contratar o escritório?', 'faq_category_id' => 2, 'websites' => 'incluirsobrenome', 'description' => '<p>Nossa contrata&ccedil;&atilde;o pode ser realizada 100% de forma digital, sem que o interessado precise sair de casa. Para tanto ap&oacute;s a realiza&ccedil;&atilde;o de consulta para analisarmos o caso,&nbsp;disponibilizamos aos nossos clientes atrav&eacute;s da &ldquo;&aacute;rea de cliente&rdquo; as seguintes funcionalidades:</p><ol><i>Agendamento de consulta;</li><li>Cadastramento;</li><li>Assinatura de contrato digital;</li><li>Pagamento de Boletos;</li><li>Envio de documentos digitalizados;</li><li>Acompanhamento processual;</li><li>Tirar d&uacute;vidas processais;</li><li>Entre outros;</li></ol>']
        ];

        Faq::insert($listArray);
    }
}
