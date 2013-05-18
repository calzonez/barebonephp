<?php 

/*
 * base class that allows loading viewer, model
 * 
 */
/*
 * 
 * make router a class
 * in router make a global variable that contains absolute path of the module being loaded
 * in base, if the path var is false, load local, otherwise, load module
 * this global var always get reset when router is called
 * 
 */

class Base
{
	private $path;

	public function __construct()
	{
		
		$this->path = $GLOBALS['path'];
		$this->load_rb();
	}
	
	public function load_model($className){

		//parse out filename where class should be located
		list($filename , $suffix) = split('_' , $className);
		
		//compose file name
		$file = $this->path . '/models/' . strtolower($filename) . '.php';
		
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
		$file = $this->path . '/views/' . strtolower($template) . '.php';
		if (file_exists($file))
			{
				include($file);
				
			}else{
				die("File '$filename' not found.");
			}
	}
	
	
	public function load_library($fileName){
	
		//parse out filename where class should be located
		//list($filename , $suffix) = split('_' , $className);
	
		//compose file name
		$file = $this->path . '/libraries/' . strtolower($fileName) . '.php';
	
		//fetch file
		if (file_exists($file))
		{
			//get file
			include_once($file);
		}
		else
		{	
			//file does not exist!
			die("File '$fileName' not found.");
		}
	
	}
	

	public function load_rb()
	{
		R::setup('mysql:host='.DBHOST.';
        dbname='.DBNAME, DBUSER, DBPASSWORD);
	}
	
}