<?php 
/**
 * Config contains CONSTANTs that need to be set correctly to work.
 */

//default page to load if controller is not specified
define("LANDING", "landing");

//development environment
if($_SERVER['HTTP_HOST'] == "localhost"){

	define("WEB_PATH",     "//localhost");
	
	//if this is true, show error messages
	define("DEBUG",    TRUE); 
	
	/*
	 *
	 * MYSQL SETUP
	 *
	 */
	define("DBHOST",     "");
	define("DBNAME",     "");
	define("DBUSER", 	 "");
	define("DBPASSWORD", "");
	
//production environment
}else{

	define("WEB_PATH",     "//mypage.com");
	define("DEBUG",    FALSE);
	/*
	 *
     * MYSQL SETUP 
	 *
	 */
	define("DBHOST",     "");
	define("DBNAME",     "");
	define("DBUSER", 	 "");
	define("DBPASSWORD", "");
	
}