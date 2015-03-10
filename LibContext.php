<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * LibContext
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

require_once('context/LibContext_Json_Decode.php');
require_once('context/LibContext_Json_Encode.php');
require_once('context/LibContext_Query_Decode.php');
require_once('context/LibContext_Query_Encode.php');
require_once('context/LibContext_XML_Decode.php');
require_once('context/LibContext_XML_Encode.php');
require_once('context/LibContext_Jsonp.php');
require_once('context/LibContext_XML_XSL.php');


class LibContext
{
    /**
     * _commands
     * 
     * @access private
     * @var    array
     */
    private $_commands = array();


    /**
     * addCommand
     * 
     * @access public
     * @param  LibContextInterface $cmd
     * @return bool
     */
    public function addCommand( LibContextInterface $cmd )
    {
        $this->_commands[] = $cmd;

        return TRUE;
    }

    /**
     * flushCommand
     * 
     * @access public
     * @return bool
     */
    public function flushCommand()
    {
        $this->_commands = array();

        return TRUE;
    }

    /**
     * run
     * 
     * @access public
     * @param  mixed
     * @param  array [Optional]
     * @return mixed
     * @throws ErrorException
     */
    public function run( $data, array $options=array() )
    {
        foreach( $this->_commands as $cmdObj )
        {
            list($data, $options) = $cmdObj->execute($data, $options);
            if( $data === FALSE ) throw new ErrorException('Not Available, Aborted'); 
        }

        return $data;
    }
}
