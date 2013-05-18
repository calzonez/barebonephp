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
}