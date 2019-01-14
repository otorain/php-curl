<?php

/**
 * Class Curl
 */

class Curl
{
    /** 使用get请求,返回数组格式数据
     * @param $url
     * @param array $params
     * @return array|mixed
     */
    public static function get( $url, $params = [] )
    {
        return json_decode( self::getRaw( $url, 'GET', $params ), true );
    }

    /**
     * 获取原生json数据
     * @param $url
     * @param array $params
     * @return mixed
     */
    public static function getRaw( $url, $method, $params = [] )
    {
        if ( $params && 'GET' === strtoupper( $method ) )  {
            $query = http_build_query( $params );
            $url .= false === strpos( $url, '?' ) ? "?${query}" : "&${query}";
        }

        $ch = curl_init();

        curl_setopt_array( $ch, [
            CURLOPT_URL             => $url,
            CURLOPT_HEADER          => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_SSL_VERIFYHOST  => false,
            CURLOPT_SSL_VERIFYPEER  => 0,
        ] );
        if ( 'POST' === strtoupper( $method ) ) {
            curl_setopt_array( $ch, [
                CURLOPT_POSTFIELDS  => http_build_query( $params ),
                CURLOPT_POST        => 1
            ] );
        }

        $result = curl_exec( $ch );
        curl_close( $ch );
        return $result;
    }

    /**
     * 使用post请求，返回数组格式数据
     * @param $url
     * @param array $params
     * @return array|mixed|object
     */
    public static function post( $url, $params = [] )
    {
        return json_decode( self::getRaw( $url, 'POST', $params ), true );
    }

}