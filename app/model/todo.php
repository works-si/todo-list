<?php
  class Todo
  {
    private $idtodo;
    private $description;
    private $done;
    private $class;
    private $user;

    function __construct($idtodo=null,$description=null,$done=null, $class=null, $user=null) {
      $this->idtodo = $idtodo;
      $this->description = $description;
      $this->done = $done;
      $this->class = $class;
      $this->user = $user;
    }

    function getUser() {
      return $this->user;
    }

    function getIdtodo() {
      return $this->idtodo;
    }

    function getClass() {
      return $this->class;
    }

    function getDescription() {
      return $this->description;
    }

    function getDone() {
      return $this->done;
    }



  }
?>
