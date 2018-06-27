<?php
	class todoDao extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}

    function buscarTodos($todo)
    {

        $sql = "SELECT * FROM todos
                WHERE todos.id_user = ? ORDER BY todos.done, todos.id_todo DESC";

        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $todo->getUser()->getIduser());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro listar todos.");
            } else {
                return $retorno = $stmt->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (PDOException $e)
        {
            die ($e->getMessage());
        }
    }

    function inserir($todo)
    {

        $sql = "INSERT INTO todos (description, done, class, id_user)
                VALUES (?, ?, ?, ?)";

        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $todo->getDescription());
            $stmt->bindValue(2, $todo->getDone());
            $stmt->bindValue(3, $todo->getClass());
            $stmt->bindValue(4, $todo->getUser()->getIduser());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro inserir todos.");
            } else {
                return 'ok';
            }
        }
        catch (PDOException $e)
        {
            die ($e->getMessage());
        }
    }

    function concluir($todo)
    {
      $sql = "UPDATE todos SET done = 1, class = 'task done' WHERE id_todo = ? and id_user = ?";

      try {
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $todo->getIdtodo());
        $stmt->bindValue(2, $todo->getUser()->getIduser());
        $ret = $stmt->execute();
        $this->db = null;
        if(!$ret)
        {
          die("Erro ao concluir todos.");
        } else {
          return 'ok';
        }
      }
      catch (PDOException $e)
      {
        die ($e->getMessage());
      }
    }

    function remover($todo)
    {
      $sql = "DELETE FROM todos WHERE id_todo = ? and id_user = ?";

      try {
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $todo->getIdtodo());
        $stmt->bindValue(2, $todo->getUser()->getIduser());
        $ret = $stmt->execute();
        $this->db = null;
        if(!$ret)
        {
          die("Erro ao excluir todos.");
        } else {
          return 'ok';
        }
      }
      catch (PDOException $e)
      {
        die ($e->getMessage());
      }
    }
  }
?>
