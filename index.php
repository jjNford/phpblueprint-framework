<?php

##################################################
##                                              ##
##         CREATE APPLICATION DEFINITIONS       ##
##                                              ##
##################################################
#
define('APPLICATION', 'application');
define('CONFIG', 'config');
define('CONTROLLER', 'controllers');
define('CORE', 'core');
define('DS', DIRECTORY_SEPARATOR);
define('ERRORS', 'errors');
define('LIBRARY', 'libraries');
define('MODEL', 'models');
define('RUN', true);
define('PHP', '.php');
define('VIEW', 'views');

##################################################
##                                              ##
##                 GET UTILITIES                ##
##                                              ##
##################################################
#
require_once(APPLICATION.DS.CORE.DS.'Utilities'.PHP);

##################################################
##                                              ##
##                   BOOTSTRAP                  ##
##                                              ##
##################################################
#
load_class('Logging', CORE);
load_class('Controller', CORE);
load_class('Security', CORE);
load_class('Router', CORE);