<?php

namespace App\Helpers;
use Request;
use App\Models\Setting as SettingModel;


class Setting
{
    public static function getList()
    {
        $settings = SettingModel::all();
        $arr = [];
        foreach($settings as $setting){
            $arr[$setting->key] = $setting->value;
        }
        return $arr;
    }

    public static function array_combine_recursive( array $data , $separator = ',' )
    {
        $response = new \stdClass();
        $callback = function( $item , $key , $aux ) use ( $response , $separator ) {
          $aux[ 2 ][] = $item;  
          if ( count( $aux[ 0 ] ) ){
            $array_shift1 = array_shift( $aux[ 0 ] );
            array_walk( $array_shift1 , $aux[ 1 ] , array( $aux[ 0 ] , $aux[ 1 ] , $aux[ 2 ] ) );
          }else{
            $response->data[] = implode( $separator , $aux[ 2 ] );
          }
        };  
        $response->data = array();
        $array_shift2 = array_shift( $data );
        array_walk( $array_shift2 , $callback , array( $data , $callback , array() ) );  
        return $response->data;
    }

}