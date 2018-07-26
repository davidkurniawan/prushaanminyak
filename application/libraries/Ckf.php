<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Ckf {
    
    function ckf()
    {
        check_login();
    }
 
    function load($param=NULL)
    {
        global $config;
        global $connector;
        
        include APPPATH.'/third_party/ckfinder/core/connector/php/connector.php';
    }
}