<?php 

/*
 * base class that allows loading viewer, model
 * 
 */


class Base
{
	
	public function __construct()
	{
	}
	
	public function load_model($className){
		
		//parse out filename where class should be located
		list($filename , $suffix) = split('_' , $className);
		
		//compose file name
		$file = './models/' . strtolower($filename) . '.php';
		
		//fetch file
		if (file_exists($file))
		{
			//get file
			include_once($file);
		}
		else
		{
			//file does not exist!
			die("File '$filename' containing class '$className' not found.");
		}

	}
	
	public function load_view($template, $data){

		//compose file name
		$file = './views/' . strtolower($template) . '.php';
		if (file_exists($file))
			{
				include($file);
				
			}else{
				die("File '$filename' not found.");
			}
	}
	
}