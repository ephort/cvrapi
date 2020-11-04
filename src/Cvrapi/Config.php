<?php

namespace Cvrapi;

/**
 * Config
 * 
 * @author Kristian Just
 */
class Config
{   
    /**
     * API version
     * 
     * @var int
     */
    static $version = 6;
    
    /**
     * Use HTTPS
     * 
     * @var boolean
     */
    static $secure = false;
    
    /**
     * Return format from API
     * 
     * @var string json or xml
     */
    static $format = 'json';
    
    /**
     * Countries available in the API
     * 
     * @var array
     */
    static $countriesAvailable = array('dk', 'no');
}
