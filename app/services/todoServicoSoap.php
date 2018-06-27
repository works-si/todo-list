<?php
  require_once "../model/conexao.php";
  require_once "../model/userDao.php";
  require_once "../model/user.php";
  require_once "../model/todo.php";
  require_once "../model/todoDao.php";

  $opcao = array("uri" => "http://localhost");
  $server = new soapServer(null,$opcao);

  class todoServico {

    function buscarTodos($iduser) {
      $user = new user($iduser);
      $todo = new todo(null, null, null, null, $user);
      $todoDAO = new todoDao();
      $ret = $todoDAO-> buscarTodos($todo);
      return $ret;
    }

    function inserirTodo($iduser, $description) {
      $user = new user($iduser);
      $todo = new todo(null, $description, 0, 'task', $user);
      $todoDAO = new todoDao();
      $ret = $todoDAO-> inserir($todo);
      return $ret;
    }
  }

  $server->setObject(new todoServico());
  $server->handle();
?>
