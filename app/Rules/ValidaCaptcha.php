<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidaCaptcha implements Rule
{
    
    public function passes($attribute, $value)
    {        
        $opts = $this->getOpts($value);
        $context  = stream_context_create($opts);
        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
        $result = json_decode($response);
        if (!$result->success) {		
            return false;
        }
        return true;
    }

    public function getOpts($value)
    {
        $post_data = http_build_query(
            array(
                'secret' => config('captcha.captcha_secret_key'),
                'response' => $value,
                'remoteip' => app('request')->getClientIp()
            )
        );
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $post_data
            )
        );
        return $opts;
    }

    public function message()
    {
        return 'Antes de enviar é preciso fazer a validação captcha';
    }
}