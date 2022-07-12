<?php

use App\Models\Dispatcher;

function get_tomcolor($color)
{
    $red = hexdec(substr($color, 1, 2));
    $green = hexdec(substr($color, 3, 2));
    $blue = hexdec(substr($color, 5, 2));
    $result = (($red * 299) + ($green * 587) + ($blue * 114)) / 1000;
    return $result;
    // Uma cor é considerada clara, quando o valor desta fórmula é maior que 128
}


function get_extensao($name_file)
{
    $name_file_array = explode('.',$name_file);
    return end($name_file_array);
}

function number_array($number)
{
    return \App\Helpers\Functions::number_array($number);
}


function dispatcher_clients($call_id, $category_id)
{
    $dispatcher = Dispatcher::where('call_id',$call_id)->where('document_category_id',$category_id)->get()->pluck('client_id')->all();
    return $dispatcher;
}

function dispatcher_select($call_id, $category_id, $client_id)
{
    $dispatcher = Dispatcher::where('call_id',$call_id)->where('document_category_id',$category_id)->where('client_id',$client_id)->first();
    return $dispatcher;
}