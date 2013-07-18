<?php 
/**
 * Base contains functions that load models, views, libraries, and DB ORM from a controller.
 */

class Base
{
	public function __construct()
	{
		$this->path = dirname(realpath(__DIR__));
		
		//load ORM by default
		$this->load_rb();
	}

	
	/**
	 * Loads RedBean ORM for interacting with DB
	 */
	public function load_rb()
	{
		R::setup('mysql:host='.DBHOST.';
        dbname='.DBNAME, DBUSER, DBPASSWORD);
	}
	
	
	/**
	 * Loads a model
	 * 
	 * @param string $className Name of the model to be loaded.
	 * 
	 */
	public function load_model($className)
	{

		//parse out filename where class should be located
		list($filename , $suffix) = split('_' , $className);
		
		//compose file name
		$file = $this->path . '/models/' . strtolower($filename) . '.php';

		//loaid the file
		$this->load_file($file);

	}
	
	
	/**
	 * Loads view
	 * 
	 * @param string $template This variable is the name of the template to be loaded.
	 * @param array $data This is an array of variables that are to be used in templates.
	 */
	public function load_view($template, $data)
	{

		//compose file name
		$file = $this->path . '/views/' . strtolower($template) . '.php';
		
		//loaid the file
		$this->load_file($file);
	}
	
	
	/**
	 * Loads library
	 * @param string $fileName This is the name of the library file to be loaded.
	 */
	public function load_library($fileName)
	{

		//compose file name
		$file = $this->path . '/libraries/' . strtolower($fileName) . '.php';
	
		//loaid the file
		$this->load_file($file);
	
	}

	
	/**
	 * Checks if a file exists and loads it if it does
	 * 
	 * @param string $file
	 */
	private function load_file($file)
	{
		if (file_exists($file)){
			//get file
			include_once($file);
		}else{
			//file does not exist!
			if(DEBUG){
				die("File '$fileName' not found.");
			}else{
				die();
			}
		}
	}

}