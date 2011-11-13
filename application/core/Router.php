<?php if(!defined('RUN')){exit();}

##################################################
##                                              ##
##                     ROUTER                   ##
##                                              ##
##################################################
#
class Router {
    
    private $config;
    private $load;
    
    ##############################################
    #
    # Constructor
    #
    # 10.17.2011 - Initial build.
    #
    public function __construct()
    {
        // Get dependencies.
        $this->config =& load_class('Configuration', CORE);
        $this->load =& load_class('Loader', CORE);
        
        // Start routing.
        $this->route();
    }
    
    
    
    ##############################################
    #
    # router
    #
    # Route th application to the correct controller->method().
    #
    # 10.17.2011 - JJ Ford - Initial build.
    #
    public function route()
    {
        // Get the Uri.
        $uri_segments = preg_split('@/@', remove_invisible_characters(trim($_SERVER['REQUEST_URI'], '/')), NULL, PREG_SPLIT_NO_EMPTY);
                
        // Get controller from Uri.
        $controller = $this->config->routing->default_controller;
        $controller_segment = $this->config->routing->controller_segment - 1;
        if (($controller_segment >= 0) && ($controller_segment < sizeof($uri_segments))) {
            $controller = $uri_segments[$controller_segment];
        }
        
        // Get the method if applicatable.
        if ($controller) {
            $method = false;
            $method_segment = $this->config->routing->method_segment - 1;
            if (($method_segment >= 0) && ($method_segment < sizeof($uri_segments))) {
                $method = $uri_segments[$method_segment];
            }
        }
		
        // Route to correct location
        if ($controller = $this->load->controller($controller)) {
            if ($method && method_exists($controller, $method)) {
                $controller->$method();
            }
        }

        // Throw a 404 Error
        else {include(APPLICATION.DS.ERRORS.DS.'404.html');}
    }
}