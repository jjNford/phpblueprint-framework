<?php if(!defined('RUN')){exit();}

##################################################
##                                              ##
##                  CONFIGURATION               ##
##                                              ##
##################################################
#
class Configuration {
    
    ##############################################
    #
    # Constructor
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    public function __construct()
    {
        // Load all config files.
        $config_files = scandir(APPLICATION.DS.CONFIG);
        
        foreach ($config_files as $config_file) {
            if ($config_file === '.' || $config_file === '..') {continue;}
            include(APPLICATION.DS.CONFIG.DS.$config_file);
        }
        
        // Turn config array into objects.
        $config_object = make_object($config);
        
        // Turn config into Configuration member data.
        foreach ($config_object as $member => $value) {
            $this->$member = $value;
        }
    }
}