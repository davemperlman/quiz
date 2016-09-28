<?php 

session_start();

require 'class.php';

$config = array(
	'host'     => '127.0.0.1',
	'dbname'   => 'quiz',
	'user'     => 'root',
	'password' => 'Baltimore.7'
	);

$data = new quizdb($config['host'], $config['dbname'], $config['user'], $config['password']);

function shuffle_assoc($list) {
	if ( !is_array($list) ) return $list;

	$keys = array_keys($list);
	shuffle($keys);
	$random = array();
	foreach ($keys as $key) {
		$random[$key] = $list[$key];
	}
	return $random;
}

function populate_answers($arr) {
	$parsed = array_splice($arr, 2);
	$result = shuffle_assoc($parsed);
	return $result;
}

