<?php
/**
 * Router decides what controller to load based on the get variables
 */

//this array is used to store get variables trailing the controller variable.
$getVars = array();	

//fetch the passed request
$request = $_SERVER['QUERY_STRING'];

//controller specified?
if(isset($request) && !empty($request)){

	//parse the page request and other GET variables
	$parsed = explode('&' , $request);
				
	//the page is the first element
	$page = explode('/', array_shift($parsed));
	
	//compute the path to the file
	if(empty($page[0])){
		$page[0] = LANDING;
	}
			
	//the rest of the array are get statements, parse them out
	foreach ($parsed as $argument){	
		//split GET vars along '=' symbol to separate variable, values
		list($variable , $value) = explode('=' , $argument);
		$getVars[$variable] = $value;		
	}
				
}else{
	//default page if controller is not specified.
	$page = array(LANDING);
}

$target = dirname(realpath(__DIR__)) . '/controllers/' . $page[0] . '.php';
	
//get target page
if (file_exists($target)){
	include_once($target);
	
	//modify page to fit naming convention
	$class = ucfirst($page[0]) . '_Controller';

	//instantiate the appropriate class
	if (class_exists($class)){
			
		$controller = new $class();
		
		//check if function is specified
		if(!isset($page[1]) || empty($page[1])){
			//function not specified. load the default (main) function. pass any get variable.
			$controller->main($getVars);			
		}else{
			//function specified. load the function if it exists
			if(method_exists($class, $page[1])){
				$controller->$page[1]($getVars);
			}else{
				exit();
			}
		}
	}else{
		//incorrect class name
		exit();
	}
}else{
	//file doesn't exist.
	exit();
}
