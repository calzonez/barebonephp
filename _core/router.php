<?php
/**
 * This controller routes all incoming requests to the appropriate controller
 */

//fetch the passed request
$request = $_SERVER['QUERY_STRING'];

//parse the page request and other GET variables
$parsed = explode('&' , $request);

//the page is the first element
$page = explode('/', array_shift($parsed));

//the rest of the array are get statements, parse them out.
$getVars = array();
foreach ($parsed as $argument)
{
    //split GET vars along '=' symbol to separate variable, values
    list($variable , $value) = split('=' , $argument);
    $getVars[$variable] = $value;
}

//compute the path to the file



$target = './controllers/' . $page[0] . '.php';



//get target
if (file_exists($target))
{
    include_once($target);

    //modify page to fit naming convention
    $class = ucfirst($page[0]) . '_Controller';

    //instantiate the appropriate class
    if (class_exists($class))
    {
    	$controller = new $class;
    	//once we have the controller instantiated, execute the default function
    	//pass any GET varaibles to the main method
    	   
    	if(method_exists($class, $page[1])){
    		$controller->$page[1]($getVars);	
    	}else{
    		$controller->main($getVars);
    	}
    }
    else
    {
        //did we name our class correctly?
        die('class does not exist!');
    }
}
else
{
    //can't find the file in 'controllers'! 
    die('page does not exist!');
}

