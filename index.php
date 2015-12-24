<?php

require 'vendor/autoload.php';

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__FILE__) . DS);

ActiveRecord\Config::initialize(function($cfg) {
 	$cfg->set_model_directory(ROOT_PATH . 'models');
	$cfg->set_connections([
		'development' => 'mysql://root:123@localhost/mini_tw'
	]);
});

function dd($in)
{
	echo '<pre>';
	print_r($in);
	die('</pre>');
}

$app = new \Slim\App;

$app->post('/cadastro', function ($req) {
	
	$data = $req->getParsedBody();

	$create = User::create([
		'name' => $data['name'],
		'email' => $data['email'],
		'password' => $data['password'],
	]);

	if ( ! $create->is_valid()) {
		dd($create->errors);		
	}
});

$app->run();