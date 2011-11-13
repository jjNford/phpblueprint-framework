<?php if(!defined('RUN')){exit();}

##################################################
##                                              ##
##                   load_class                 ##
##                                              ##
##################################################
#
# Load requested class, once loaded add it to an
# array of loaded class references so it will not 
# need to be loaded again.
#
# param - Class to load.
# param - Directory of class to load.
# return - Instance of requested class to load.
#
# JJ Ford - 10.15.2011 - Initial build.
#

if ( ! function_exists('load_class'))
{
    function &load_class($class_to_load, $directory)
    {
    	$class_to_load = ucfirst(strtolower($class_to_load));
    
        // Create a static array of loaded classes.
        static $loaded_classes = array();
        
        // Check if requested class has been loaded and return it if so.
        if (isset($loaded_classes[$class_to_load][$directory])) {return $loaded_classes[$class_to_load][$directory];}
        
        // Check if the class exists and load it.
        $class_found = false;
        if (file_exists(APPLICATION.DS.$directory.DS.$class_to_load.PHP)) {        
        
            if (class_exists($class_to_load) === false) {
                $class_found = true;
                require_once(APPLICATION.DS.$directory.DS.$class_to_load.PHP);
            }
        }
        
        // Kill the application if the class cannot be found.
        if ($class_found === false) {exit('Unable to load the following ' . $directory . ' class: ' . $class_to_load);}

        // If the class has been found and loaded add it to the array of loaded classes.
        $loaded_classes[$class_to_load][$directory] = new $class_to_load();
        
        return $loaded_classes[$class_to_load][$directory];
    }
}



##################################################
##                                              ##
##                  make_object                 ##
##                                              ##
##################################################
#
# Turn given array into an object and returns the object.
#
# param - The array to convert.
# return - The object created.
#
# 10.15.2011 - JJ Ford - Initial build.
#
if ( ! function_exists('make_object'))
{
    function make_object($array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = make_object($value);
            }
        }
    
        return (object) $array;
    }
}



##################################################
##                                              ##
##          remove_invisible_characters         ##
##                                              ##
##################################################
#
# Prevent sandwhiching null characters between ascii characters, like Java\0script
#
# param - The array to convert.
# return - The object created.
#
# 10.15.2011 - JJ Ford - Initial build (from CodeIgniter Source Code).
#
if ( ! function_exists('remove_invisible_characters'))
{
    function remove_invisible_characters($string)
    {
        // Define invisible characters.
        $non_displayables = array();
        $non_displayables[] = '/%0[0-8bcef]/';
        $non_displayables[] = '/%1[0-9a-f]/';
        $non_displayables[] = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';
        
        // Remove invisible characters.
        do {
            $str = preg_replace($non_displayables, '', $string, -1, $count);
        }
        while ($count);
        
        return $string;
    }
}