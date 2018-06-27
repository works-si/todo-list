/*!
 * ManagerStudent
 * Application for the course Sistema para Internet
 * https://gitlab.com/si-devs/student-manager-front
 * @author Jaqueline Paschoal and Robson Formigão
 * @version 1.1.1
 * Copyright 2018. MIT licensed.
 */
(function () {

  'use strict';

  var $send = document.querySelector('[data-js="send"]');

  $send.addEventListener('click', function() {
    var $inputTask = document.querySelector('[data-js="task"]').value;

    axios.get('index.php?controller=todo_controller&method=inserir&input=' + $inputTask)
    .then(function (response) {
      if(response.data === 'ok')
        location.reload();
    })
    .catch(function (error) {
      console.log(error);
    })

  }, false)

})();
