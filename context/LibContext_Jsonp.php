<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * LibContext_Jsonp
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


class LibContext_Jsonp implements LibContextInterface
{
    /**
     * _callback
     * 
     * @access private
     * @var    string
     */
    private $_callback;


    /**
     * Constructor
     * 
     * @access public
     * @param  string $callback [Optional]
     * @return void
     */
    public function __construct( $callback='' )
    {
        $this->_callback = $callback;
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
        if( strlen($this->_callback) ) $data = sprintf('%s(%s)', $this->_callback, $data);
        
        return array($data, $options);
    }
}
