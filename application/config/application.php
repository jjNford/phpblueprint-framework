<?php if(!defined('RUN')){exit();}

##################################################
##                                              ##
##        ERROR REPORTING CONFIGURATION         ##
##                                              ##
##################################################
#
# Don't forget to change the permissions on your log folder.
#
$config['error_reporting']['development_environment']   = true;
$config['error_reporting']['log_errors']                = true;
$config['error_reporting']['error_log']                 = 'application/logs/errors.log';

##################################################
##                                              ##
##              ROUTING CONFIGURATION           ##
##                                              ##
##################################################
#
$config['routing']['default_controller'] = 'welcome';
$config['routing']['controller_segment'] = 1;
$config['routing']['method_segment']     = 2;