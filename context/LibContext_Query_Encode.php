<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * LibContext_Query_Encode
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


class LibContext_Query_Encode implements LibContextInterface
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
        return array(http_build_query($data), $options);
    }
}
