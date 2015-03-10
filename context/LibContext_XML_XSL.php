<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * LibContext_XML_XSL
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


class LibContext_XML_XSL implements LibContextInterface
{
    /**
     * _stylesheet
     * 
     * @access private
     * @var    string
     */
    private $_stylesheet;


    /**
     * Constructor
     * 
     * @access public
     * @param  string $stylesheet [Optional]
     * @return void
     */
    public function __construct( $stylesheet='' )
    {
        $this->_stylesheet = $stylesheet;
    }

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
        if( strlen($this->_stylesheet) )
            $data = str_replace(
                        '<!--?xml version="1.0"?-->',
                        sprintf('<!--?xml version="1.0"?--><!--?xml-stylesheet type="text/xsl" href="%s"?-->', $this->_stylesheet),
                        $data
                    );

        return array($data, $options);
    }
}
