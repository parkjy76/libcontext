<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * LibContext_Query_Decode
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


class LibContext_Query_Decode implements LibContextInterface
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
        parse_str($data, $output);

        return array($output, $options);
    }
}
