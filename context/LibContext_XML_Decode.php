<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * LibContext_XML_Decode
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


class LibContext_XML_Decode implements LibContextInterface
{
    /**
     * execute
     * 
     * @access public
     * @param  mixed
     * @param  array
     * @return array
     */
    public function execute( $data, array $options )
    {
        if( is_file($data) ) $simpleXMLfuncName = 'simplexml_load_file';
        elseif( is_string($data) ) $simpleXMLfuncName = 'simplexml_load_string';
        else return array(FALSE, $options);

        $ret = @$simpleXMLfuncName($data, 'SimpleXMLElement', LIBXML_NOCDATA);
        // <???/>が含まれてるXMLのobjectをjson_encode()でjsonに変換する時、使えるようにoptionsに入れておく。
        if( $ret !== FALSE && preg_match_all("/<([^\/]+)\/>/", $data, $matches) ) $options = $matches[1];

        // 空文字含めparse出来なければFALSE
        return array($ret, $options);
    }
}
