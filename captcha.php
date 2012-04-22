<?php

	require_once 'includes/master.inc.php';
	
	//create new response
	$resp = new HttpResponse();
	
	//generate 7 chars random string		
	$n = rand(10e8, 10e9);
	$str = strtoupper(base_convert($n, 10, 36));
	
	//put string in session
	Cms::putInSession('BONNIECMS_CAPTCHA',$str);
	
	$obj = new GD();			
	$obj->creteCaptcha($str,150,30,'vendor/fonts/didact-gothic/DidactGothic.ttf');
	
	//send image
	$resp->setBody($obj->tostring());
	$resp->setMimeType('image/jpeg');
	
	$resp->send();