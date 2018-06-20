<?php
	class userDao extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}

		function inserir($user) {
			$sql="INSERT INTO users (name,email,cep,address,phone,password)
            VALUES(?,?,?,?,?,?)";
			try
			{
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $user->getName());
				$stmt->bindValue(2, $user->getEmail());
				$stmt->bindValue(3, $user->getCep());
				$stmt->bindValue(4, $user->getAddress());
				$stmt->bindValue(5, $user->getPhone());
				$stmt->bindValue(6, $user->getPassword());
				$ret=$stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					echo "Erro inserir usuário.";
				}
				else
				{
					return true;
				}
			}
			catch ( Exception $e )
			{
				die ($e->getMessage());
			}
		}
  }
?>
