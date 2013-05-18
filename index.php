<?php

function load_module ($module, $class, $method, $getVars)
{

	global  $path;
	$load_md = TRUE;

	$target = $path . '/modules/' . $module . '/_core/router.php';



	if (file_exists($target))
	{
		include_once($target);

	}else{
		exit("module doesn't exist.");
	}
}


require_once('./_core/rb.php');
require_once('./_core/config.php');
require_once('./_core/base.php');
require_once('./_core/router.php');


/*
 * after loading everything, run router class
 */