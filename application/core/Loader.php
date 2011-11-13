<?php if(!defined('RUN')){exit();}

##################################################
##                                              ##
##                    LOADER                    ##
##                                              ##
##################################################
#
class Loader {
    
    ##############################################
    #
    # Constructor
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    public function __construct() {}
        
        
        
    ##############################################
    #
    # controller
    #
    # Load application controller.
    #
    # param - Name of controller.
    # return - Return controller if found.
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    public function controller($name)
    {    
    	$name = ucfirst(strtolower($name));
    
        if (file_exists(APPLICATION.DS.CONTROLLER.DS.$name.PHP)) {
            require_once(APPLICATION.DS.CONTROLLER.DS.$name.PHP);
            $name = $name.'_Controller';
            return new $name();
        }
        
        // No bueno if we made it here...
        echo "Unable to load the following controller: " . $name;
        die();
    }
    
    
    
    ##############################################
    #
    # library
    #
    # Load application library.
    #
    # param - Name of library.
    # return - Return library if found.
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    public function library($name)
    {
        return load_class($name, LIBRARY);
    }
    
    
    
    ##############################################
    #
    # model
    #
    # Load application model.
    #
    # param - Name of model.
    # return - Return model if found.
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    public function model($name)
    {
        load_class('Model', CORE);
        $name = ucfirst(strtolower($name));
        
        if (file_exists(APPLICATION.DS.MODEL.DS.$name.PHP)) {
            require_once(APPLICATION.DS.MODEL.DS.$name.PHP);
            $name = $name.'_Model';
            return new $name();
        }
        
        // No bueno if we made it here...
        echo "Unable to load the following model: " . $name;
        die();
    }
    
    
    
    ##############################################
    #
    # view
    #
    # Load application view.
    #
    # param - Name of view.
    # param - Associative array of data.
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    public function view($name, $data = null)
    {
        if($data) {extract($data);}
        
        if (file_exists(APPLICATION.DS.VIEW.DS.$name.PHP)) {
            include(APPLICATION.DS.VIEW.DS.$name.PHP);
        }
    }
}