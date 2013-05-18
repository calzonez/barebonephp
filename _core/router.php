<?php
/**
 * This controller routes all incoming requests to the appropriate controller
 */





	
	$path = dirname(realpath(__DIR__));
	

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
	
	if($load_md){
	
		$page[0] = $page[1];
		$page[1] = $page[2];
		$load_md = FALSE;
	}

	$target = $path . '/controllers/' . $page[0] . '.php';
	


	//get target
	if (file_exists($target))
	{

		include_once($target);
	
	
		//modify page to fit naming convention
		$class = ucfirst($page[0]) . '_Controller';
	

		
		//instantiate the appropriate class
		if (class_exists($class))
		{	
			$controller = new $class();
			//once we have the controller instantiated, execute the default function
			//pass any GET varaibles to the main method
	
			 
			if($page[1] == ""){
				$controller->main($getVars);
			}elseif(method_exists($class, $page[1])){
				$controller->$page[1]($getVars);
			}else{
				load_module($page[0], $page[1], $page[2], $getVars);
			}
		}
		else
		{
			load_module($page[0], $page[1], $page[2], $getVars);
			//did we name our class correctly?
		}
	}
	else
	{
		//check if such module exists
		load_module($page[0], $page[1], $page[2], $getVars);
		//can't find the file in 'controllers'!
	}
	
