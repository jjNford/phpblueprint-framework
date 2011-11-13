<?php if(!defined('RUN')){exit();}

##################################################
##                                              ##
##                      MODEL                   ##
##                                              ##
##################################################
#
# Parent model for application controllers.
#
class Model {
    
    // Database handle
    protected $db;
 
    ##############################################
    #
    # Constructor
    #
    # 10.15.2011
    #
    public function __construct()
    {
        // Load Configuration class.
        $this->config =& load_class('Configuration', CORE);
        
        // Set database configuration variables.
        $driver = $this->config->database->driver;
        $host = $this->config->database->host;
        $dbname = $this->config->database->db_name;
        $user = $this->config->database->user_name;
        $pass = $this->config->database->password;
        
        // Connect to database using PDO database object.
        try {
        	$this->db = new PDO("$driver:host=$host;dbname=$dbname", $user, $pass);
        } catch(Exception $e) {
        	echo "Database Configuration Invalid";
        }
    }
    
    
    
    ##############################################
    #
    # Destructor
    #
    # 10.15.2011 - JJ Ford - Initial build.
    #
    public function __destruct()
    {
        $this->db = null;
    }
}