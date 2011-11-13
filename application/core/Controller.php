<?php if(!defined('RUN')){exit();}

##################################################
##                                              ##
##                   CONTROLLER                 ##
##                                              ##
##################################################
#
# Parent controller for application controllers.
#
class Controller {
    
    protected $config;
    protected $load;
    
    ##############################################
    #
    # Constructor
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    public function __construct()
    {
        // Load the controllers Configuration and Loader objects.
        $this->config =& load_class('Configuration', CORE);
        $this->load =& load_class('Loader', CORE);
    }
}