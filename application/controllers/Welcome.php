<?php if(!defined('RUN')){exit();}

class Welcome_Controller extends Controller {
    
    public function __construct() {
        parent::__construct();
        
        // This is the default controller defined in the 'application' config file.
        
        // Load the welcome page.
        $data = array('page_title' => 'Welcome to PHP Blueprint');
        $this->load->view('welcome', $data);
    }
}