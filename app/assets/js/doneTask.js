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

  var $done = document.querySelectorAll('[data-js="done"]');

 Array.prototype.map.call($done, function (done) {
  done.addEventListener('click', doneTask ,false);
 });

 function doneTask() {
  var id = this.id;

  axios.get('index.php?controller=todo_controller&method=concluir&idTodo=' + id)
  .then(function (response) {
    if(response.data === 'ok')
      location.reload();
  })
  .catch(function (error) {
    console.log(error);
  })
 }

})();
