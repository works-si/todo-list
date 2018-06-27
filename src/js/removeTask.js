(function () {

  'use strict';

  var $remove = document.querySelectorAll('[data-js="remove"]');

 Array.prototype.map.call($remove, function (remove) {
  remove.addEventListener('click', removeTask ,false);
 });

 function removeTask() {
  var id = this.id;

  axios.get('index.php?controller=todo_controller&method=remover&idTodo=' + id)
  .then(function (response) {
    if(response.data === 'ok')
      location.reload();
  })
  .catch(function (error) {
    console.log(error);
  })
 }

})();
