<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * LibContext_Json_Encode
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 *  
 * PHP 5 Later
 * 
 * @category   common
 * @package    lib
 * @author     Junyong Park
 * @copyright  2012
 * @version    SVN: $Id:$
 */

require_once('interface/LibContextInterface.php');


class LibContext_Json_Encode implements LibContextInterface
{
    /**
     * execute
     * Experimental!
     * 
     * @access public
     * @param  mixed
     * @param  array
     * @return array
     */
    public function execute( $data, array $options )
    {
        /*
         * xmlデータをjson_encodeした場合<a></a>がa:{}に変換され、json_decodeするとaは空文字ではなく空配列になる問題がある。
         * <a/>の場合もa:{}に変換され、json_decodeすると空配列になるので問題はない。
         * array('a' => array());をjson_encodeするとa:[]なる。
         * json_decodeした時、<a/>の場合は空配列にならなければいけないが<a></a>は空文字にならなければいけない。
         * <a/>の場合のリストをもらって[]に変換して{}は""に変換しておけばjson_decodeしたときにも正しく結果が出るはず。
         */
        $data = json_encode($data);

        if( count($options) )
        {
            $search = $replace = array();
            foreach( $options as $field )
            {
                $search[] = "\"$field\":{}";
                $replace[] = "\"$field\":[]";
            }

            $data = str_replace($search, $replace, $data);
        }

        return array(str_replace('{}', '""', $data), $options);
    }
}
