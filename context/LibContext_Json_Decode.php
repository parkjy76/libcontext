<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * LibContext_Json_Decode
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


class LibContext_Json_Decode implements LibContextInterface
{
    /**
     * _toArray
     * 
     * @access private
     * @var    bool
     */
    private $_toArray;


    /**
     * Constructor
     * 
     * @access public
     * @param  bool $toArray [Optional]
     * @return void
     */
    public function __construct( $toArray=TRUE )
    {
        if( $toArray ) $this->_toArray = TRUE;
        else $this->_toArray = FALSE; 
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
        return array(json_decode($data, $this->_toArray), $options);
    }
}
