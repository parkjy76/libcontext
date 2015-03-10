<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * LibContext_XML_Encode
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


class LibContext_XML_Encode implements LibContextInterface
{
    /**
     * _declaration
     * 
     * @access private
     * @var    string
     */
    private $_declaration;

    /**
     * _encoding
     * 
     * @access private
     * @var    string
     */
    private $_encoding; 


    /**
     * Constructor
     * 
     * @access public
     * @param  string [Optional]
     * @param  string [Optional]
     * @return void
     */
    public function __construct( $root='root', $encoding='UTF-8' )
    {
        $this->_encoding = $encoding;
        $this->_declaration = "<?xml version=\"1.0\" encoding=\"$encoding\"?><$root/>";
    }

    /**
     * execute
     * キーがnumericの場合(同じ名にエレメント)も対応
     * Experimental!
     * 
     * @access public
     * @param  mixed
     * @param  array
     * @return array
     */
    public function execute( $data, array $options )
    {
        // mapじゃなく普通のarrayの場合、そのまま変換するとformatが崩れるので
        // rootとして指定したdirectiveをもう一個追加して変換させる
        $xmlObj = new SimpleXMLElement($this->_declaration);
        list($xmlObj, $repStrings) = isset($data[0]) ? $this->_arrayToXML(array($xmlObj->getName() => $data), $xmlObj) : $this->_arrayToXML($data, $xmlObj);
        $data = $xmlObj->asXML();

        if( count($repStrings) )
        {
            $search = $replace = array();
            foreach( array_keys($repStrings) as $value )
            {
                $search[] = "<$value><$value>";
                $replace[] = "<$value>";
    
                $search[] = "</$value></$value>";
                $replace[] = "</$value>";
            }

            $data = str_replace($search, $replace, $data);
        }

        return array($data, $options);
    }

    /**
     * _arrayToXML
     * キーがnumericの場合(同じ名にエレメント)も対応
     * Experimental!
     * 
     * @access private
     * @param  array
     * @param  SimpleXMLElement
     * @param  array [Optional]
     * @return SimpleXMLElement
     */
    private function _arrayToXML( array $arr, SimpleXMLElement $xmlObj, &$repStrings=array() )
    {
        // SimpleXMLElementのaddChildはxmlのescape対象の文字(\nなど含み)の中で「&」以外はやってくれるため「&」のみescapeする。
        foreach( $arr as $key => $value )
        {
           if( is_array($value) )
            {
                if( !is_numeric($key) ) $eleObj = $xmlObj->addChild($key);
                else
                {
                    $repStrings[$xmlObj->getName()] = NULL;
                    $eleObj = $xmlObj->addChild($xmlObj->getName());
                }

                $this->_arrayToXml($value, $eleObj, $repStrings);
            }
            else
            {
                if( !is_numeric($key) ) $xmlObj->addChild($key, str_replace('&', '&amp;', $value));
                else
                {
                    $repStrings[$xmlObj->getName()] = NULL;
                    $xmlObj->addChild($xmlObj->getName(), str_replace('&', '&amp;', $value));
                }
            }
        }

        return array($xmlObj, $repStrings);
    }
}
