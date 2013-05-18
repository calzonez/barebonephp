<?php
/**
 * This file handles the retrieval and serving of news articles
 */


class Test_Controller extends Base
{
    /**
     * This template variable will hold the 'view' portion of our MVC for this 
     * controller
     */
    public $template = 'news';

    /**
     * This is the default function that will be called by router.php
     * 
     * @param array $getVars the GET variables posted to index.php
     */
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
    //	echo "test22";
    //	$this->load_model('fq');

    	$this->load_model('test');
		$a = new test_model();
		$a->testing();
		
		
		$this->load_view('testing', array('test'=>1));
     	//$this->get_article('test');
     //	$this->test_model->testing();
     
    }
}