<?php
	abstract class conexao {
		protected $db;

		protected function __construct()
		{
			$dsn="mysql:host=localhost;dbname=todo_list";
			try
			{
				$this->db = new PDO($dsn, "root", "");
			}
			catch ( Exception $e )
			{
				die ($e->getMessage());
			}
		}
	}
?>
