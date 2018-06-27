<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>Home</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="//ajax.googleapis.com" rel="dns-prefetch">
    <link href="./assets/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/on-server/css/fontawesome-all.css">

  </head>
  <body>
    <main class="main" role="main">
      <div class="home_top">
        <h1 class="title home_title">todo<strong>list</strong></h1>
        <h2 class="subtitle home_sub">Aqui você pode inserir todas as suas tarefas</h2>
      </div>
      <div class="home_content">
        <div class="input_content home_input-content">
          <input class="input" data-js="task" type="text" placeholder="Insira sua tarefa aqui">
          <i class="fal fa-plus" data-js="send"></i>
        </div>
        <div class="all_tasks">
          <?php foreach ($response as $dado) { ?>
            <div class="<?= $dado->class ?>">
              <p><?= $dado->description ?></p>
              <div class="task_actions">
                <i id="<?= $dado->id_todo ?>" data-js="done" class="fal fa-check check"></i>
                <i id="<?= $dado->id_todo ?>" data-js="remove" class="fal fa-trash delete"></i>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="login_info">
        <a href="index.php?controller=user_controller&method=sair">Sair</a>
      </div>
    </main>


  <script src="./assets/js/axios.js"></script>
  <script src="./assets/js/sendTask.js"></script>
  <script src="./assets/js/doneTask.js"></script>
  <script src="./assets/js/removeTask.js"></script>

  </body>
</html>
