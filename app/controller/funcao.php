<?php
	function __autoload($classe)
	{
    echo $classe;
	  require_once "model/{$classe}.php";
	}

?>
