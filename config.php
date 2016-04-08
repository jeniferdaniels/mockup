<?php
	$path = explode('/', $_SERVER['REQUEST_URI']);
	define("WEB_ROOT", "/" . $path[1] . "/");

	

?>