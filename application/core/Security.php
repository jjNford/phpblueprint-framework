<?php if(!defined('RUN')){exit();}

##################################################
##                                              ##
##                    SECURITY                  ##
##                                              ##
##################################################
#
class Security {
    
    ##############################################
    #
    # Constructor
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    public function __construct()
    {
        $this->cleanse_globals();
    }
    
    
    
    ##############################################
    #
    # Cleanse Globals
    #
    # Remove global variables from the envrionment.
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    private function cleanse_globals() 
    {
        if (ini_get('REGISTER_GLOBALS')) {
            
            $type = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
            
            foreach ($type as $value) {
                foreach ($GLOBAL[$value] as $key => $var) {
                    if ($var === $GLOBALS[$key]) {
                        unset($GLOBAL[$key]);
                    }
                }
            }
        }
    }
}