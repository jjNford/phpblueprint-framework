<?php if(!defined('RUN')){exit();}

##################################################
##                                              ##
##                     LOGGING                  ##
##                                              ##
##################################################
#
class Logging {
    
    private $config;
    
    ##############################################
    #
    # Constructor
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    public function __construct()
    {
        // Load Configuration.
        $this->config =& load_class('Configuration', CORE);
        
        // Set logging.
     	$this->set_php_error_reporting();
    }
    
    
    
    ##############################################
    #
    # set_php_error_reporting
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    private function set_php_error_reporting()
    {
        ini_set('error_reporting', E_ALL);
        ini_set('log_errors', $this->config->error_reporting->log_errors);
        ini_set('error_log', $this->config->error_reporting->error_log);
        ini_set('display_errors', $this->config->error_reporting->development_environment);
    }
}