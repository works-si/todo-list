<?php
	include_once "funcao.php";
	class todo_controller
	{
		function inserir() {

      session_start();
      $id = $_SESSION["id"];

      if(!$id) {
        header("Location:index.php?controller=user_controller&method=login");
      }

      $task = $_GET['input'];

      $opcao = array("location"=>"http://localhost/todo-list/app/services/todoServicoSoap.php","uri"=>"http://localhost/");
			$cli = new soapClient(null,$opcao);
      $response = $cli->inserirTodo($id, $task);
      echo $response;
    }

    function concluir() {
      session_start();
      $id = $_SESSION["id"];

      if(!$id) {
        header("Location:index.php?controller=user_controller&method=login");
      }

      $idTodo = $_GET["idTodo"];

      $url = "http://localhost/todo-list/app/services/todoServicoRest.php?acao=concluirTodo&id=$id&idTodo=$idTodo";
      $response = file_get_contents($url);
      $response = json_decode($response);
      echo $response;
    }

    function remover() {
      session_start();
      $id = $_SESSION["id"];

      if(!$id) {
        header("Location:index.php?controller=user_controller&method=login");
      }

      $idTodo = $_GET["idTodo"];

      $url = "http://localhost/todo-list/app/services/todoServicoRest.php?acao=removerTodo&id=$id&idTodo=$idTodo";
      $response = file_get_contents($url);
      $response = json_decode($response);
      echo $response;
    }
  }
