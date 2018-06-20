<?php
  class Todo
  {
    private $idtodo;
    private $description;
    private $done;

    function __construct($idtodo=null,$description=null,$done=null) {
      $this->idtodo = $idtodo;
      $this->description = $description;
      $this->done = $done;
    }
  }
?>
