<?php
class Test_Controller extends Base
{
	public function __construct()
	{
		parent::__construct();
		$this->load_model('test');
	}

	
    public function main(array $getVars)
    {
        //this is a test , and we will be removing it later
        print "We are in news!";
        print '<br/>';
        $vars = print_r($getVars, TRUE);
        print 
        (
            "The following GET vars were passed to this controller:" .
            "<pre>".$vars."</pre>"
        );
    }
    
    public function test2(){

		Test_model::testing();
		
		$this->load_library('lib_test');

		//lib_test::testing();
		$lib = new lib_test(array('a'));
		
		$this->load_view('test/testing', array('test'=>1));
     
    }
    
    public function aa()
    {
    	/*
    	 * this is hypothetical.
    	 */
    	
    	$this->load_module('hypothetical_module'); //maybe do this in.. core/base constructor?

    	/*
    	 * router should first check local files when redirecting.
    	 * no file exist?
    	 * look for included file in module.
    	 * if the module exist, redirect to the module.
    	 * module's db config is overwritten by the parent module.
    	 * css files always point to the parent module's style
    	 * module's db structure is always important
    	 * modules may contain config vars.. that need to be configured
    	 * 
    	 */
    	
    }
}