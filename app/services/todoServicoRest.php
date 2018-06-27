<?php
  require_once "../model/conexao.php";
  require_once "../model/userDao.php";
  require_once "../model/user.php";
  require_once "../model/todo.php";
  require_once "../model/todoDao.php";

  class todoServico {

    function concluirTodo($id, $idTodo) {
      $user = new User($id);
      $todo = new Todo($idTodo, null, 1, 'task done', $user);

      $todoDAO = new todoDao();
      $ret = $todoDAO -> concluir($todo);
      return json_encode($ret);
    }

    function removerTodo($id, $idTodo) {
      $user = new User($id);
      $todo = new Todo($idTodo, null, null, null, $user);

      $todoDAO = new todoDao();
      $ret = $todoDAO -> remover($todo);
      return json_encode($ret);
    }
  }

  if(isset($_GET["acao"])) {
    if($_GET["acao"] === "concluirTodo") {
      $class = new todoServico();
      $ret = $class->concluirTodo($_GET["id"], $_GET["idTodo"]);
    }

    if($_GET["acao"] === "removerTodo") {
      $class = new todoServico();
      $ret = $class->removerTodo($_GET["id"], $_GET["idTodo"]);
    }

    exit($ret);
  }
