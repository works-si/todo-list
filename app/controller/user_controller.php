<?php
	include_once "funcao.php";
	class user_controller
	{
		function login() {

      if($_POST) {

        require_once "lib/nusoap.php";

        $email = $_POST["email"];
        $password = $_POST["password"];

        $cli = new nusoap_client("http://localhost/todo-list/app/services/userServicoNusoap.php?wsdl");
        $retorno = $cli->call("userServico.login", array('email'=> $email, 'password'=> $password));

        if ($retorno) {
          session_start();
          $_SESSION["id"] = $retorno;
          header("Location:index.php?controller=user_controller&method=home");
        }
      }
			require_once 'view/login.html';
    }

    function create_account()
    {
      if($_POST) {
        require_once "lib/nusoap.php";

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cep = $_POST["cep"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];
        $senha = $_POST["senha"];
        $c_senha = $_POST["c_senha"];

        $url = "http://apilayer.net/api/validate?access_key=6be28579cdafa44877b07e4b608a2d16&number=$telefone&country_code=BR&format=1";
        $response = file_get_contents($url);
        $response = json_decode($response);

        if (!$response->valid) {
          echo "<script>alert('Telefone inválido! Exemplo: 14999999999 ')</script>";
          require_once 'view/register.html';
          return;
        }

        if( $senha !== $c_senha ) {
          echo "<script>alert('As senhas não conferem!')</script>";
          require_once 'view/register.html';
          return;
        }

        if($nome && $email && $cep && $endereco && $telefone && $senha) {
          $cli = new nusoap_client("http://localhost/todo-list/app/services/userServicoNusoap.php?wsdl");
          $response = $cli->call("userServico.inserirUser", array('nome'=> $nome, 'email'=> $email, 'cep'=> $cep,'endereco'=> $endereco,'telefone'=> $telefone,'senha'=> $senha ));
          if($response) {
            header("Location:index.php?controller=user_controller&method=login");
          }
        }

        echo "<script>alert('Preencha todos os campos!')</script>";
      }
      require_once 'view/register.html';
    }

    function home(){
      session_start();
      $id = $_SESSION["id"];

      if(!$id) {
        header("Location:index.php?controller=user_controller&method=login");
      }

      $opcao = array("location"=>"http://localhost/todo-list/app/services/todoServicoSoap.php","uri"=>"http://localhost/");
			$cli = new soapClient(null,$opcao);
      $response = $cli->buscarTodos($id);

      require_once 'view/home.php';
    }

    function sair() {
      session_start();
      session_destroy();
      header("Location:index.php?controller=user_controller&method=login");
    }
  }
