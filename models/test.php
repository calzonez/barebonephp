<?php
/**
 * The News Model does the back-end heavy lifting for the News Controller
 */
class Test_Model extends Base{

    public function __construct()
    {
		
    }

    public function testing()
    {

    	
    	$post = R::dispense('post');
    	$post->text = 'Hello World';
    	
    	$id = R::store($post);       //Create or Update
    	
    }
}
